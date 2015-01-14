<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_145103_add_bigproduct_fk_references_suppliers extends Migration
{
    public function safeUp()
    {
        Migration::addForeignKey(
                'fk_suppliers_id', 
                'bigproduct', 
                'supplier_id',
                'suppliers',
                'id',
                'CASCADE',
                'CASCADE'
        );
    }

    public function safeDown()
    {
        Migration::dropForeignKey('fk_suppliers_id', 'bigproduct');
    }
}
