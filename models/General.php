<?php

namespace app\models;

use Yii;
use yii\base\Object;

class General extends Object 
{
    private $db;
    
    public function __construct(){
        $this->db = Yii::$app->db;
    }
    
    public function getProducts(){
        $products = array(
            'smallproducts' => Smallproduct::find()->asArray()->all(),
            'bigproducts' => Bigproduct::find()->asArray()->all()
        );
        
        $data = array();
        foreach ($products as $key) {
            for ($i = 0; $i < count($key); $i++) {
                $data[] = [$key[$i]['name'], $key[$i]['instock']];
            }
        }
        
        return $data;
    }
}
