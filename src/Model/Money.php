<?php
namespace WPDMPP\Coinbase\Commerce\Model;

/**
 * Description of Money
 *
 * This Model class represents the input data used identify the money charge information
 * according to the product value
 *
 * @author WPDMPP <support@wpdownloadmanager.com>
 */
class Money {

	/**
     * Amount
     * Charge amount
     *
     * @var string 
     */
    public $amount;

    /**
     * Currency
     * System of money
     *
     * @var string 
     */
    public $currency;

    /**
     * Get amount
     * 
     * @return string
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * Get currency
     * 
     * @return string
     */
    public function getCurrency() {
        return $this->currency;
    }


    /**
     * Set amount
     *
     * @param string $amount
     * @return $this
     */
    public function setAmount($amount){
        $this->amount = $amount;
        return $this;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency){
        $this->currency = $currency;
        return $this;
    }

}

