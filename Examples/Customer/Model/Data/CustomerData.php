<?php

namespace Examples\Customer\Model\Data;

use Magento\Framework\Model\AbstractModel;
use Examples\Customer\Api\Data\CustomerDataInterface;

class CustomerData extends AbstractModel implements CustomerDataInterface
{
    public function getFirstname()
    {
        return $this->getData(self::FIRSTNAME);
    }

    public function setFirstname($firstname)
    {
        $this->setData(self::FIRSTNAME, $firstname);
        return $this;
    }

    public function getLastname()
    {
        return $this->getData(self::LASTNAME);
    }

    public function setLastname($lastname)
    {
        $this->setData(self::LASTNAME, $lastname);
        return $this;
    }

    public function getMiddlename()
    {
        return $this->getData(self::MIDDLENAME);
    }

    public function setMiddlename($middlename)
    {
        $this->setData(self::MIDDLENAME, $middlename);
        return $this;
    }

    public function getMobilephone()
    {
        return $this->getData(self::TELEPHONE);
    }

    public function setMobilephone($phone)
    {
        $this->setData(self::TELEPHONE, $phone);
        return $this;
    }
}
