<?php
namespace Khoaln\Sales\Observer;

use Magento\Framework\Event\ObserverInterface;

class SalesOrderPlaceAfter implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        //die("hi");
        try {
            $orders = $observer->getEvent()->getOrder();
            $shippingAddress = $orders->getShippingAddress();
            $orderDetailData=$shippingAddress->getPostcode();   
            $orders->setZipCode($orderDetailData);

            $orders->save();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
}