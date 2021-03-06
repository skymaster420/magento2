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
 * @copyright Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_Index_Model_EventRepository
{
    /**
     * Event collection factory
     *
     * @var Mage_Index_Model_Resource_Event_CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Mage_Index_Model_Resource_Event_CollectionFactory $collectionFactory
     */
    public function __construct(Mage_Index_Model_Resource_Event_CollectionFactory $collectionFactory)
    {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * Check whether unprocessed events exist for provided process
     *
     * @param int|array|Mage_Index_Model_Process $process
     * @return bool
     */
    public function hasUnprocessed($process)
    {
        return (bool) $this->getUnprocessed($process)->getSize();
    }

    /**
     * Retrieve list of unprocessed events
     *
     * @param int|array|Mage_Index_Model_Process $process
     * @return Mage_Index_Model_Resource_Event_Collection
     */
    public function getUnprocessed($process)
    {
        $collection = $this->_collectionFactory->create();
        $collection->addProcessFilter($process, Mage_Index_Model_Process::EVENT_STATUS_NEW);
        return $collection;
    }
}
