<?php

namespace frontend\controllers;
use Yii;

class MediaController extends \jasmine2\dwz\Controller
{

    public function behaviors()
    {
        return [

        ];
    }

    public function actionIndex($name = null)
    {
        if($name != null){
            $path = Yii::getAlias("@frontend/../upload/").$name;
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
