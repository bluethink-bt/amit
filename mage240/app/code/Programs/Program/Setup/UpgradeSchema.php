<?php 
namespace Programs\Program\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface{
 
	public function upgrade(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            $this->addStatus($setup);
        }
        if (version_compare($context->getVersion(), '1.0.5', '<')) {
            $this->addNewStatus($setup);
        }
        $setup->endSetup();
	}
	


    /**
     * @param SchemaSetupInterface $setup
     * @return void
     */
    private function addStatus(SchemaSetupInterface $setup)
    {
        $setup->getConnection()->addColumn(
            $setup->getTable('employee'),
            'firstname',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => true,
                'comment' => 'First Name'
            ]
        );
        $setup->getConnection()->addColumn(
            $setup->getTable('employee'),
            'lastname',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => true,
                'comment' => 'Last Name'
            ]
        );
    }
     /**
     * @param SchemaSetupInterface $setup
     * @return void
     */
    private function addNewStatus(SchemaSetupInterface $setup)
    {
        $setup->getConnection()->addColumn(
            $setup->getTable('employee'),
            'order_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BIGINT,
                'nullable' => true,
                'comment' => 'Order Id'
            ]
        );
    }
}
?>