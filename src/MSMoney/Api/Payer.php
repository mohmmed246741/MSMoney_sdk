<?php
namespace MsmoneySdk\PhpSdk\Msmoney\Api;

use MsmoneySdk\PhpSdk\Msmoney\Common\MsMoneyModel;

/**
 * Class Payer
 * @property string paymentMethod
 *
 */
class Payer extends MsMoneyModel
{

    /**
     * Valid Values: ["Msmoney"]
     * method will be like Msmoney, paypal, stripe etc
     * @param  string  $method
     * @return $this
     */
    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;
        return $this;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

}
