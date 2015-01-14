<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_144557_create_bigproduct_table extends Migration
{
    public function up()
    {
        Migration::createTable('bigproduct', [
            'id' => 'pk',
            'supplier_id' => 'int',
            'name' => 'string',
            'count' => 'int'
        ]);
    }

    public function down()
    {
        Migration::dropTable('bigproduct');
    }
}
