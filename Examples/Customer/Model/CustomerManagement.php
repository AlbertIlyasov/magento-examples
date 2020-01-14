<?php

namespace Examples\Customer\Model;

class CustomerManagement extends \Magento\Framework\Model\AbstractModel
    implements \Examples\Customer\Api\CustomerManagementInterface
{
    /** @var \Magento\Customer\Api\CustomerRepositoryInterface */
    protected $customerRepository;

    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->customerRepository = $customerRepository;
    }

    public function update($customerId, $data = null)
    {
        try {
            $customer = $this->customerRepository->getById($customerId);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if (!$data) {
            return false;
        }

        foreach (\Examples\Customer\Api\CustomerManagementInterface::ATTRS_DATA_MAP as $attrData) {
            $attr = $attrData['attr'];
            $dataMethod = $attrData['dataMethod'];
            $customerMethod = $attrData['customerMethod'] ?? null;

            if (null === $data->{'get' . $dataMethod}()) {
                continue;
            }

            $newVal = $data->{'get' . $dataMethod}();
            $curVal = $customerMethod
                ? $customer->{'get' . $customerMethod}()
                : ($customer->getCustomAttribute($attr)
                    ? $customer->getCustomAttribute($attr)->getValue()
                    : null);

            if ($curVal == $newVal) {
                continue;
            }

            $customerMethod
                ? $customer->{'set' . $customerMethod}($newVal)
                : $customer->setCustomAttribute($attr, $newVal);
        }

        try {
            $this->customerRepository->save($customer);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }
}
