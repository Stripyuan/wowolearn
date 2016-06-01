<?php

namespace backend\controllers;

use Yii;
use backend\models\FocusMap;
use yii\data\ActiveDataProvider;
use jasmine2\dwz\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FocusMapController implements the CRUD actions for FocusMap model.
 */
class FocusMapController extends Controller
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
     * Lists all FocusMap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FocusMap::find(),
        ]);

        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new FocusMap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FocusMap();

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
    public function actionView($id)
    {
        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Updates an existing FocusMap model.
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
     * Deletes an existing FocusMap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()){
            return self::SUCCESS;
        }

        return self::ERROR;
    }
    public function actionMDelete()
    {
        $ids = Yii::$app->request->post('ids');
        if(FocusMap::deleteAll(['in' ,'id',$ids])){
            return self::SUCCESS;
        }

        return self::ERROR;
    }
    /**
     * Finds the FocusMap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FocusMap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FocusMap::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetImg($name = null){
        if($name != null){
            $path = Yii::getAlias("@backend/../upload/").$name;
            if(file_exists($path)){
                $filename = basename($path);
                $file_extension = strtolower(substr(strrchr($filename,"."),1));

                switch( $file_extension ) {
                    case "gif": $ctype="image/gif"; break;
                    case "png": $ctype="image/png"; break;
                    case "jpeg":
                    case "jpg": $ctype="image/jpeg"; break;
                    default:
                }
                header('Content-type: ' . $ctype);
                echo file_get_contents($path);
            } else {
                return array_merge(self::ERROR,[
                    'message'   => '文件名不存在'
                ]);
            }
        } else {
            return array_merge(self::ERROR,[
                'message'   => '文件名不能为空'
            ]);
        }
    }
}
