<?php
namespace backend\controllers;

use backend\models\MPassword;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','m-password','upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'upload'    => [
                'class' => 'jasmine2\dwz\actions\UploadAction',
                'path'  => '@backend/../upload',
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMPassword(){
        $model = new MPassword();
        if($model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->save()){
                return array_merge(\jasmine2\dwz\Controller::SUCCESS,[
                    "callbackType"=>"closeCurrent",
                ]);
            } else {
                $form_name = strtolower($model->formName());
                $errors = $model->getErrors();
                return array_merge(\jasmine2\dwz\Controller::ERROR,[
                    'form-name'   => $form_name,
                    'errors' => $errors,
                ]);
            }
        }
        return $this->renderPartial('m-password',['model' => $model]);
    }
    public function actionLogin()
    {
        $this->layout = '@jasmine2/dwz/layouts/login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
