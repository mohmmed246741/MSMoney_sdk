<?php 
namespace MsmoneySdk\PhpSdk\Msmoney\Api;

use MsmoneySdk\PhpSdk\Msmoney\Common\MsMoneyModel;
/**
 * Class Transaction
 * @property \MsmoneySdk\PhpSdk\Msmoney\Api\Amount amount
 *
 */

class Transaction extends MsMoneyModel
{

    /**
     * @param \MsmoneySdk\PhpSdk\Msmoney\Api\Amount $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}