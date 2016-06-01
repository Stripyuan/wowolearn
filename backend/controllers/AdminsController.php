<?php

namespace backend\controllers;

use Yii;
use backend\models\Admins;
use backend\models\AdminsSearch;
use jasmine2\dwz\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminsController implements the CRUD actions for Admins model.
 */
class AdminsController extends Controller
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
     * Lists all Admins models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admins model.
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
     * Creates a new Admins model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admins();
        $model->setScenario('create');
        $model->status = Admins::STATUS_ACTIVE;
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
     * Updates an existing Admins model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('update');
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
     * Deletes an existing Admins model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->id == $id){
            return array_merge(self::ERROR,[
                'message' => '不能删除自己'
            ]);
        }
        if($this->findModel($id)->delete()){
            return self::SUCCESS;
        }

        return self::ERROR;
    }
    public function actionMDelete()
    {
        $post = Yii::$app->request->post();
        if(in_array(Yii::$app->user->id,$post['ids'])){
            return array_merge(self::ERROR,[
                'message' => '不能删除自己'
            ]);
        }
        if(Admins::deleteAll(['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    public function actionMLock(){
        $post = Yii::$app->request->post();
        if(in_array(Yii::$app->user->id,$post['ids'])){
            return array_merge(self::ERROR,[
                'message' => '不能锁定自己'
            ]);
        }
        if(Admins::updateAll(['status' => Admins::STATUS_LOCK ],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    /**
     * 批量解锁管理员用户
     * @return array
     */
    public function actionMUnLock(){
        $post = Yii::$app->request->post();
        if(in_array(Yii::$app->user->id,$post['ids'])){
            return array_merge(self::ERROR,[
                'message' => '不能解锁自己'
            ]);
        }
        if(Admins::updateAll(['status' => Admins::STATUS_ACTIVE ],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    /**
     * Finds the Admins model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admins the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admins::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
