<?php

namespace Examples\Customer\Api;

interface CustomerManagementInterface
{
    /**
     * Array of property to type mappings.
     *
     * @var array
     */
    const ATTRS_DATA_MAP = [
        [
            'attr' => Data\CustomerDataInterface::FIRSTNAME,
            'dataMethod' => 'Firstname',
            'customerMethod' => 'Firstname',
        ],
        [
            'attr' => Data\CustomerDataInterface::LASTNAME,
            'dataMethod' => 'Lastname',
            'customerMethod' => 'Lastname',
        ],
        [
            'attr' => Data\CustomerDataInterface::MIDDLENAME,
            'dataMethod' => 'Middlename',
            'customerMethod' => 'Middlename',
        ],
        [
            'attr' => Data\CustomerDataInterface::TELEPHONE,
            'dataMethod' => 'Mobilephone',
        ],
    ];

    /**
     * Update customer data
     *
     * @param int $customerId.
     * @param \Examples\Customer\Api\Data\CustomerDataInterface $data
     * @return bool|string
     */
    public function update($customerId, $data = null);
}
