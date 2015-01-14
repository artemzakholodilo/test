<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Smallproduct */

$this->title = 'Create Smallproduct';
$this->params['breadcrumbs'][] = ['label' => 'Smallproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smallproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
