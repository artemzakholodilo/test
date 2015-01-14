<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bigproduct".
 *
 * @property integer $id
 * @property integer $supplier_id
 * @property string $name
 * @property integer $instock
 *
 * @property Suppliers $supplier
 */
class Bigproduct extends \app\models\GeneralProduct
{
    protected $name;
    protected $instock;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bigproduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'instock'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_id' => 'Supplier ID',
            'name' => 'Name',
            'instock' => 'Instock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    public function isInStock($id) {
        $product = Bigproduct::find()->where('id = ' . $id)->one();
        
        return isset($product) && $product->instock > 0 ? true : false;
    }

}
