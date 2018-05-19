<?php
namespace WPDMPP\Coinbase\Commerce\Model;

/**
 * Description of Checkout
 *
 * This Model class represents the input data used to identify the checkout information
 * according to cryptocurrency payment
 *
 * @author WPDMPP <support@wpdownloadmanager.com>
 */
class Checkout {

	/**
     * Name
     * Checkout name
     *
     * @var string 
     */
    private $name;

    /**
     * Description
     * More detailed description of the checkout
     *
     * @var string 
     */
    private $description;

    /**
     * Pricing Type
     * Checkout pricing type no_price or fixed_price
     *
     * @var string 
     */
    private $pricing_type;

    /**
     * Get name
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get description
     * 
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get pricing type
     * 
     * @return string
     */
    public function getPricingType() {
        return $this->pricing_type;
    }

    
    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    /**
     * Set pricing type
     *
     * @param string $pricing_type
     * @return $this
     */
    public function setPricingType($pricing_type){
        $this->pricing_type = $pricing_type;
        return $this;
    }


}

