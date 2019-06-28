<?php
namespace Magenest\YoutubeIntegration\Setup;

use Magento\Framework\DB\Ddl\Table as Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Magenest\YoutubeIntegration\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        /**
         * insert new table
         */
        $installer = $setup;
        /**
         * Create table 'magenest_youtubeintegration_gallery'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_youtubeintegration_gallery')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true
        ],
            'Id'
        )->addColumn('created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null, [
                'nullable' => false,
                'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Created at'
        )->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null, [],
            'Updated at'
        )->addColumn(
            'gallery_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 200,
            ['nullable' => false],
            'Gallery name'
        )->addColumn(
            'gallery_channel_url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 200,
            ['nullable' => false],
            'Channel url'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 10,
            ['nullable' => false,
             'default' => '1'
            ],
            'Is Active')
        ;
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'magenest_youtubeintegration_gallery_group'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_youtubeintegration_gallery_group')
        )->addColumn(
            'group_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true
        ],
            'Group Id'
        )->addColumn(
            'group_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 200,
            ['nullable' => false],
            'Group Name'
        )
            ->addColumn(
            'gallery_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
            'unsigned' => true,
            'nullable' => false,
             ],
            'Gallery Id'
        )
        ;
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'magenest_youtubeintegration_gallery_group_list'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_youtubeintegration_gallery_group_list')
        )->addColumn(
            'list_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true
        ],
            'List Id'
        )->addColumn(
            'list_url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 200,
            ['nullable' => false],
            'List Url'
        )
            ->addColumn(
            'group_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
            'unsigned' => true,
            'nullable' => false,
            ],
            'Group Id'
        )
            ;
        $installer->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
