<?php
namespace App\Http\Services\Payout\Bank;

use App\Models\Setting;

class ProcessBankPayoutServices
{
    private $manual;
    private $gtr;

    public function __construct(
        ManualBankPayoutServices $manual,
        GTRBankPayoutServices $gtr
    )
    {
        $this->manual = $manual;
        $this->gtr = $gtr;
    }

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
        string $narration = null
    )
    {
        try {

            // Hold User
            $setting = Setting::first();

            if($setting->auto_transfer) {

                // Verify transfer Type
                if(!in_array($setting->auto_transfer_default, ['gtr'])) throw new \Exception("Payout not available at the moment");
                
                // GTR
                if(in_array($setting->auto_transfer_default, ['gtr'])) {
                    $payment = $this->gtr->transfer($reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);
                }
                
            }else {
                // Manual
                $payment = $this->manual->transfer($reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);
            }

            // Exception
            if($payment instanceof \Exception) throw new \Exception($payment->getMessage());

            // Response
            return $payment;

        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
