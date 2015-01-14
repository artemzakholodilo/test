<?php

namespace app\models;

abstract class GeneralProduct extends \yii\db\ActiveRecord
{
    protected $name;
    protected $instock;
    
    abstract function isInStock($id);
}