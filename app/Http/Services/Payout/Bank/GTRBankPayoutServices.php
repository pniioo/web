<?php
namespace App\Http\Services\Payout\Bank;

use App\Http\Services\Payout\Bank\Util\ResponseBankUtilPayoutServices;
use App\Models\BankList;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;

class GTRBankPayoutServices
{
    
    /**
     * Transfer Payment
     * 
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string bank code
     * @param string bank name
     * @param string account number
     * @param string account name
     * @param string narration
     */
    public function transfer(
        string $reference,
        string $currency,
        string $amount,
        string $method,
        string $bank_code,
        string $bank_name = null,
        string $account_number,
        string $account_name,
        string $narration = 'Goods'
    )
    {
        try {

            // Get Support Code
            $bank_list = BankList::where(['bank_code' => $bank_code, 'status' => 1])->first();

            // Exception
            if(!$bank_list) redirect()->route('mybank')->with("error", "Bank Name not available. Please update your bank info again");

            // Request Body
            $requestBody = array(
                "mchId" => '****',
                "passageId" => 31111,
                "orderAmount" => $amount,
                "orderNo" => $reference,
                "account" => $account_number,
                "userName" => $account_name,
                "remark" => $bank_list->gtr_bank_code,
                "notifyUrl" => '' . URL::route('ipn.gtr') . ''
            );

            // Send Curl Request
            $sendRequest = $this->curlRequest('POST', 'pay/create', $requestBody);

            // Exception
            if($sendRequest instanceof \Exception) throw new \Exception($sendRequest->getMessage());

            // Format Response
            $response = ResponseBankUtilPayoutServices::response(200, 2, true, $reference, $sendRequest['data']['tradeNo'], $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

            // Response
            return $response;

        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Cur Request
     * send request
     * 
     * @param string method
     * @param string endpoint
     * @param string body
     */
    public function curlRequest(
        string $method,
        string $endpoint,
        array $body = []
    ) {

        try {

            // Find Setting
            $setting = Setting::first();

            // Exception
            if (!$setting) throw new \Exception("Service not enabled at the moment");

            $body['mchId'] = $setting->gtr_mchtId;

            // Build Sign
            $sign = self::buildSignDigest($body, $setting->gtr_secret_key);
            $body['sign'] = $sign;

            // Convert request data to JSON
            $jsonData = json_encode($body);

            // Curl Request
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://wg.gtrpay001.com/' . $endpoint,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => $jsonData,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            // there was an error contacting
            if ($err) throw new \Exception('Curl returned error: ' . $err);

            // Convert Json to Json Array
            $response_array = json_decode($response, true);

            // Check status
            if (!in_array($httpcode, ['200'])) throw new \Exception($response_array['msg']);

            // Check if successful
            if ($response_array['code'] != '200') throw new \Exception($response_array['msg']);


            return $response_array;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    public static function buildSignDigest($data, $secret_key)
    {
        // Remove the 'sign' field from the data
        unset($data['sign']);

        // Sort the array by key in ascending order according to ASCII values
        ksort($data);

        // Concatenate the string in the format key=value&key=value
        $signString = '';
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $signString .= $key . '=' . $value . '&';
            }
        }

        // Append the private key to the string
        $signString .= 'key=' . $secret_key;

        // Perform MD5 signature on the generated string
        $sign = md5($signString);

        return $sign;
    }
}
