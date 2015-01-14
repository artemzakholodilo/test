<?php

namespace app\controllers;

use yii\web\Controller;


class AdminController extends Controller 
{
    /*public function actionIndex(){
        $bigproduct = new \app\models\Bigproduct();
        
        $products = $bigproduct->find()->all();
        
        if (empty($products)){
            $bigproduct->supplier_id = 1;
            $bigproduct->name = 'Test product';
            $bigproduct->instock = 12;
            
            $bigproduct->insert(false);
        }
        else{
            var_dump($products);
        }
    }*/
    
    public function actionIndex(){
        return $this->render('index');
    }
}
