<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_150512_add_bigproduct_column extends Migration
{
    public function up()
    {
        Migration::addColumn('bigproduct', 'instock', 'int');
    }

    public function down()
    {
        Migration::dropColumn('bigproduct', 'instock');
    }
}
