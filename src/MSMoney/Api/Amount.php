<?php
namespace MsmoneySdk\PhpSdk\Msmoney\Api;

use MsmoneySdk\PhpSdk\Msmoney\Common\MsMoneyModel;

/**
 * Class Amount
 * @property double totalAmount
 * @property string currency
 *
 */
class Amount extends MsMoneyModel
{

    /**
     * @param  double  $amount
     * @return $this
     */
    public function setTotal($amount)
    {
        $this->totalAmount = $amount;
        return $this;
    }

    public function getTotal()
    {
        return $this->totalAmount;
    }

    /**
     * @param  string  $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

}
