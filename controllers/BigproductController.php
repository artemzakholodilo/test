<?php

namespace app\controllers;

ini_set("display_errors", 1);
error_reporting(E_ALL | E_STRICT);

use Yii;
use app\models\Bigproduct;
use app\models\BigproductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BigproductController implements the CRUD actions for Bigproduct model.
 */
class BigproductController extends Controller
{
    protected $suppliers = [];
    
    public function init() {

        $suppliers = \app\models\Supplier::find()->asArray()->all();
        foreach ($suppliers as $supplier) {
            $this->suppliers[$supplier['id']] = $supplier['name'];
        }
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bigproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BigproductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bigproduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bigproduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bigproduct();
        $suppliers = \app\models\Supplier::find()->count();
        
        if ($suppliers < 1){
            Yii::$app->session->setFlash('supplier', 'You need create at least one supplier');
            return $this->goHome();
        }

        $post = isset(Yii::$app->request->post()['Bigproduct']) ? 
                Yii::$app->request->post()['Bigproduct'] : 
                NULL;
        
        if ($post){
            $model->supplier_id = $post['supplier_id'];
            $model->name = $post['name'];
            $model->instock = $post['instock'];
            
            $model->save(false);
            
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'suppliers' => $this->suppliers
            ]);
        }
    }

    /**
     * Updates an existing Bigproduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = isset(Yii::$app->request->post()['Bigproduct']) ? 
                Yii::$app->request->post()['Bigproduct'] : 
                NULL;
        
        if ($post){
            $model->supplier_id = $post['supplier_id'];
            $model->name = $post['name'];
            $model->instock = $post['instock'];
            
            $model->save(false);
            
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('update', [
                'model' => $model,
                'suppliers' => $this->suppliers
            ]);
        }
    }

    /**
     * Deletes an existing Bigproduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bigproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bigproduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bigproduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
