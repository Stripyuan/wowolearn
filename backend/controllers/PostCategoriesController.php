<?php

namespace backend\controllers;

use Yii;
use backend\models\CmsCategory;
use yii\data\ActiveDataProvider;
use jasmine2\dwz\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostCategoriesController implements the CRUD actions for CmsCategory model.
 */
class PostCategoriesController extends Controller
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
     * Lists all CmsCategory models.
     * @return mixed
     */
    public function actionIndex($cat = -1)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CmsCategory::find(),
        ]);
        $dataProvider->query->andFilterWhere(['parent_id' => $cat]);
        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmsCategory model.
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
     * Creates a new CmsCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsCategory();

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
     * Updates an existing CmsCategory model.
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
     * Deletes an existing CmsCategory model.
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

    /**
     * Finds the CmsCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
