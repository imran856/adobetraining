<?php
namespace Khoaln\Sales\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    
 public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
{
    $setup->startSetup();
    $this->addCallCenterIdToSalesOrder($setup);
    $setup->endSetup();
}
protected function addCallCenterIdToSalesOrder($setup)
{
    $connection = $setup->getConnection();
    $connection->addColumn(
        $setup->getTable('sales_order'),
        'zip_code',
        [
            'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            'nullable' => true,
            'comment' => 'Zip Code',
        ]
    );
}
}
