<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bigproduct */

$this->title = 'Create Bigproduct';
$this->params['breadcrumbs'][] = ['label' => 'Bigproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$supplier_list = [];
foreach ($suppliers as $supplier){
    $supplier_list[$supplier['id']] = $supplier['name'];
}
?>
<div class="bigproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'suppliers' => $supplier_list
    ]) ?>

</div>
