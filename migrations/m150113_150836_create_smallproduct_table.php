<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_150836_create_smallproduct_table extends Migration
{
    public function up()
    {
        Migration::createTable('smallproduct', [
            'id' => 'pk',
            'name' => 'string',
            'code' => 'string',
            'instock' => 'int'
        ]);
    }

    public function down()
    {
        Migration::dropTable('smallproduct');
    }
}
