<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CmsPosts;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use frontend\models\CmsCategory;

/**
 * PostsController implements the CRUD actions for CmsPosts model.
 */
class PostsController extends Controller
{
    public $layout = 'posts';

    /**
     * Lists all CmsPosts models.
     * @return mixed
     */
    public function actionIndex($cate = -1)
    {
        $cate = $cate ? $cate:-1;
        $current_category = CmsCategory::findOne($cate);
        $category = CmsCategory::find()->where(['parent_id' => $cate])->all();
        if($cate == -1)
            $model = CmsPosts::find()->all();
        else
            $model = CmsPosts::find()->where(['category_id' => $cate])->all();

        return $this->render('index', [
            'model' => $model,
            'category'  => $category,
            'cate'      => $cate,
            'current_category'  => $current_category,
        ]);
    }

    /**
     * Displays a single CmsPosts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);
        $model->view_times += 1;
        $model->save();
        $category = CmsCategory::find()->where(['parent_id' => $model->category->parent_id])->all();
        return $this->render('view', [
            'model' => $model,
            'category'  => $category,
        ]);
    }

    /**
     * Finds the CmsPosts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsPosts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsPosts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
