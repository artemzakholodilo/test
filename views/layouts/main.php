<?php
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <div id="navbar-wrapper">
                <?php
                NavBar::begin();
                ///if (!isset($this->params['breadcrumbs'])){
                echo \yii\bootstrap\Tabs::widget([
                    'items' => [
                        ['label' => 'Suppliers', 
                            'items' => [
                                Html::a('view all', ['/supplier/index']),
                                '<br/>',
                                Html::a('create', ['/supplier/create'])
                            ]
                        ],
                        ['label' => 'Big products', 
                            'items' => [
                                Html::a('view all', ['/bigproduct/index']),
                                '<br/>',
                                Html::a('create', ['/bigproduct/create'])
                            ]
                        ],
                        ['label' => 'Small products', 
                            'items' => [
                                Html::a('view all', ['/smallproduct/index']),
                                '<br/>',
                                Html::a('create', ['/smallproduct/create'])
                            ]
                        ]
                    ],
                ]);
                //}
                //else{
                    echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? 
                                             $this->params['breadcrumbs'] : 
                                             []
                        ]);
                //}
                NavBar::end();
                ?>
            </div>
        <div class="container">
            <div class="col-lg-12">
                <?php if (Yii::$app->session->hasFlash('supplier')): ?>
                <div class="alert alert-warning" role="alert">
                    <?= Yii::$app->session->getFlash('supplier') ?>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <?= $content ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>