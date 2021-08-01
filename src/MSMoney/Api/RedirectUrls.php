<?php

namespace MsmoneySdk\PhpSdk\Msmoney\Api;

use MsmoneySdk\PhpSdk\Msmoney\Common\MsMoneyModel;

/**
 * Class RedirectUrls
 * @property string returnUrl
 * @property string cancelUrl
 *git commit -m "Initial commit"
 */

class RedirectUrls extends MsMoneyModel
{
    public function setSuccessUrl($url)
    {
        $this->successUrl = $url;
        return $this;
    }

    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    public function setCancelUrl($url)
    {
        $this->cancelUrl = $url;
        return $this;
    }

    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }
}