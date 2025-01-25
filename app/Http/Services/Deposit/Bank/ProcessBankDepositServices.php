<?php
namespace App\Http\Services\Deposit\Bank;

use App\Http\Services\Deposit\Bank\ManualBankDepositServices;
use App\Models\Setting;

class ProcessBankDepositServices
{
    private $manual;
    private $gtr;

    public function __construct(
        ManualBankDepositServices $manual,
        GTRBankDepositServices $gtr
    )
    {
        $this->manual = $manual;
        $this->gtr = $gtr;
    }

    /**
     * Deposit Payment
     * 
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     */
    public function deposit(
        string $reference,
        string $currency,
        string $amount,
        string $method
    )
    {
        try {

            // Hold User
            $setting = Setting::first();

            if($setting->auto_deposit) {

                // Verify transfer Type
                if(!in_array($method, ['gtr'])) throw new \Exception("Deposit not available at the moment");
                
                // GTR
                if(in_array($method, ['gtr'])) {
                    $payment = $this->gtr->deposit($reference, $currency, $amount, $method);
                }
                
            }else {
                // Manual
                $payment = $this->manual->deposit($reference, $currency, $amount, $method);
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
