<?php

namespace Examples\Customer\Api\Data;

use Magento\Customer\Api\Data\CustomerInterface;

interface CustomerDataInterface
{
    const FIRSTNAME             = CustomerInterface::FIRSTNAME;
    const LASTNAME              = CustomerInterface::LASTNAME;
    const MIDDLENAME            = CustomerInterface::MIDDLENAME;
    const TELEPHONE             = 'telephone';

    /**
     * @return string|null
     */
    public function getFirstname();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * @return string|null
     */
    public function getLastname();

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * @return string|null
     */
    public function getMiddlename();

    /**
     * @param string $middlename
     * @return $this
     */
    public function setMiddlename($middlename);

    /**
     * @return string|null
     */
    public function getMobilephone();

    /**
     * @param string $phone
     * @return $this
     */
    public function setMobilephone($phone);
}
