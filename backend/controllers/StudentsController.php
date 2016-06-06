<?php

namespace backend\controllers;

use backend\models\CurrencyForm;
use backend\models\StudentsSearch;
use backend\models\Users;
use backend\models\VirtualCurrency;
use Yii;
use backend\models\Students;
use yii\data\ActiveDataProvider;
use jasmine2\dwz\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_HTML;
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());
        $dataProvider->query->andWhere(['is_del' => 0]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * Displays a single Students model.
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
     * Updates an existing Students model.
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
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionMDelete()
    {
        $post = Yii::$app->request->post();
        if(Users::updateAll(['is_del' => 1],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }

    /**
     * 批量锁定学生用户
     * @return array
     */
    public function actionMLock(){
        $post = Yii::$app->request->post();
        if(Users::updateAll(['status' => Users::STATUS_LOCK ],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    /**
     * 批量锁定学生用户
     * @return array
     */
    public function actionMUnLock(){
        $post = Yii::$app->request->post();
        if(Users::updateAll(['status' => Users::STATUS_ACTIVE ],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * 增加或减少虚拟币
     */
    public function actionCurrency($id){
        $model = new CurrencyForm();
        $model->student_id = $id;
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                return array_merge(self::SUCCESS,[
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
            return $this->render('currency', [
                'model' => $model,
                'student'   => Users::findOne($id)
            ]);
        }
    }
}
