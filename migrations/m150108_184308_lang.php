<?php

use yii\db\Schema;
use yii\db\Migration;

class m150108_184308_lang extends Migration
{
    public function up()
    {
        $tableOptons = null;
        
        if ($this->db->driverName == 'mysql'){
            $tableOptons = "CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB";
        }
        
        $this->createTable('{{%lang}}', array(
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . '(255) NOT NULL',
            'local' => Schema::TYPE_STRING . '(255) NOT NULL',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'default' => Schema::TYPE_SMALLINT. ' NOT NULL DEFAULT 0',
            'date_update' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date_create' => Schema::TYPE_INTEGER . ' NOT NULL'
        ), $tableOptons);
        
        $this->batchInsert('lang', ['url', 'local', 'name', 'default', 'date_update', 'date_create'],
                [
                    ['en', 'en-En', 'English', 0, time(), time()],
                    ['ru', 'ru-Ru', 'Русский', 1, time(), time()]
                ]);
    }

    public function down()
    {
        $this->dropTable('{{%lang}}');
    }
}
