<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\BaseUrl;
use yii\widgets\ActiveForm;
use yii\db\Query;

class SiteController extends MasterController
{
   public $role ='';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'page' => [
                'class' => 'yii\web\ViewAction',
            ],
        ];
    }

    /**
     * rendering admin's view (carts) and non-admin's view (published job)
     * @return string
     */
    public function actionIndex()
    {
         $query = (new Query())
            -> select([
                'task.*'
            ])
            -> from('task');

        $countQuery = clone $query;

        $models = $query->orderBy('task.id ASC')
                    ->all();

        $data = Json::encode($models); 
        if(isset($_GET['debug']))
        {
                header("Content-type:application/json");echo ($data);exit();
        }
            
        return $this->render('index', array(
                'data'=>$data
            ));
    }
    public function actionAdd()
    {
        $data = $_GET['q'];
        $Qe = "INSERT INTO task (name, status) VALUES ('".$data."', '0')";
        $rProj  =  Yii::$app->db->createCommand($Qe)->execute(); 
        $last_id = Yii::$app->db->getLastInsertID($rProj);
        return $last_id;
    }
    public function actionDelete()
    {
        $data = $_GET['q'];
        $Qe = "delete from task where id='".$data."'";
        $rProj  = Yii::$app->db->createCommand($Qe)->execute(); 
        return $data;
    }
    public function actionUpdate()
    {
        $data = $_GET['q'];
        $Q1 = "select * from task where id=$data";
        $rCreat  = Yii::$app->db->createCommand($Q1)->queryAll(); 
        $Res1 = $rCreat[0]['status']; 
        if($Res1==1){
            $Qe = "update task SET status = '0' where id='".$data."'";
        }else
        {
            $Qe = "update task SET status = '1' where id='".$data."'";
        }
        
        $rProj  = Yii::$app->db->createCommand($Qe)->execute(); 
        return $data;
    }

}