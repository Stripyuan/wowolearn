<?php

namespace backend\controllers;

use Yii;
use backend\models\Institutions;
use backend\models\InstitutionsSearch;
use jasmine2\dwz\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstitutionsController implements the CRUD actions for Institutions model.
 */
class InstitutionsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Institutions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstitutionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());
        $dataProvider->query->andWhere(['is_del' => 0]);
        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Institutions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Institutions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Institutions();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                return array_merge(self::SUCCESS,[
                    'navTabId' => Yii::$app->request->post()['navTabId'],
                    "callbackType"=>"closeCurrent",
                ]);
            } else {
                $form_name = strtolower($model->formName());
                $errors = $model->getErrors();
                return array_merge(self::ERROR,[
                    'form-name'   => $form_name,
                    'errors' => $errors,
                ]);
            }
        } else {
            Yii::$app->response->format = Response::FORMAT_HTML;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Institutions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                return array_merge(self::SUCCESS,[
                    'navTabId' => Yii::$app->request->post()['navTabId'],
                    "callbackType"=>"closeCurrent",
                ]);
            } else {
                $form_name = strtolower($model->formName());
                $errors = $model->getErrors();
                return array_merge(self::ERROR,[
                    'form-name'   => $form_name,
                    'errors' => $errors,
                ]);
            }
        } else {
            Yii::$app->response->format = Response::FORMAT_HTML;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Institutions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionMDelete()
    {
        $post = Yii::$app->request->post();
        if(Institutions::updateAll(['is_del' => 1],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    public function actionMLock(){
        $post = Yii::$app->request->post();
        if(Institutions::updateAll(['status' => Institutions::STATUS_LOCK ],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    /**
     * 批量锁定机构用户
     * @return array
     */
    public function actionMUnLock(){
        $post = Yii::$app->request->post();
        if(Institutions::updateAll(['status' => Institutions::STATUS_ACTIVE ],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    /**
     * Finds the Institutions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Institutions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Institutions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
