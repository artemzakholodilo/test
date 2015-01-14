<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smallproduct".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $instock
 */
class Smallproduct extends \app\models\GeneralProduct
{
    protected $name;
    protected $instock;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smallproduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instock'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'instock' => 'Instock',
        ];
    }

    public function isInStock($id) {
        $product = Smallproduct::find()->where('id = '. $id)->one();
        
        return isset($product) && $product->instock > 0 ? true : false;
    }

}
