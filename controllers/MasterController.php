<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 10/15/2015
 * Time: 3:34 PM
 */
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
class MasterController extends Controller{
    public $role ='';
    public $company_id='';
    public $userType='';
    public $professionId='';
    public function behaviors()
    {
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {

                        $module                 = Yii::$app->controller->module->id;
                        $action                 = Yii::$app->controller->action->id;
                        $controller             = Yii::$app->controller->id;
                        $route                  = "$controller/$action";
                        $post = Yii::$app->request->post();
                        if (\Yii::$app->user->can($route)) {
                            return true;
                        }
                    },
                ],
            ]
        ];
        return $behaviors;
    }

    public function init()
    {
        
    }
}