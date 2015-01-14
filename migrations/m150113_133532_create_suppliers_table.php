<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_133532_create_suppliers_table extends Migration
{
    public function up()
    {
        Migration::createTable('suppliers', [
            'id' => 'pk',
            'name' => 'string'
        ]);
        
    }

    public function down()
    {
        //echo "m150113_133532_create_suppliers_table cannot be reverted.\n";
        
        Migration::dropTable();
    }
}