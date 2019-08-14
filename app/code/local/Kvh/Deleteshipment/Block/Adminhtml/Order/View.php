<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml sales orders block
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Kvh_Deleteshipment_Block_Adminhtml_Order_View extends Mage_Adminhtml_Block_Sales_Order_View
{

    public function __construct()
    { 
        
        $order = $this->getOrder(); 
         
    	$shipment = $order->getShipmentsCollection();
		
		if(count($shipment)>0):
        $onclickJs = 'deleteConfirm(\''
                . Mage::helper('sales')->__('Are you sure? This will Delete shipment and cannot be undoable')
                . '\', \'' . $this->getDeleteshipmentUrl() . '\');';
            $this->_addButton('order_delete_shipment', array(
                'label'    => Mage::helper('sales')->__('Delete Shipment'),
                'onclick'  => $onclickJs,
            ));
		endif;	
            
        
        parent::__construct();
       
    }
	
	   public function getDeleteshipmentUrl()
    {
		 $orderId = $this->getRequest()->getParam('order_id');
        return Mage::helper('adminhtml')->getUrl('deleteshipment/adminhtml_deleteshipment/delete/order_id/'.$orderId);
    }

   
}
