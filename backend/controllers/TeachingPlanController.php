<?php

namespace backend\controllers;

use Yii;
use backend\models\OnlineClass;
use backend\models\TachingPlanSearch;
use jasmine2\dwz\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeachingPlanController implements the CRUD actions for OnlineClass model.
 */
class TeachingPlanController extends Controller
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
     * Lists all OnlineClass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TachingPlanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        $dataProvider->query->andWhere(['<>','teaching_plan','']);
        Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Deletes an existing OnlineClass model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($model = $this->findModel($id)){
            $model->teaching_plan = null;
            if($model->save())
                return self::SUCCESS;
        }

        return self::ERROR;
    }
    public function actionMDelete()
    {
        $post = Yii::$app->request->post();
        if(OnlineClass::updateAll(['teaching_plan' => null],['in','id',$post['ids']])){
            return self::SUCCESS;
        }
        return self::ERROR;
    }
    /**
     * Finds the OnlineClass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OnlineClass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OnlineClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
