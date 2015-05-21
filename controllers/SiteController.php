<?php

namespace app\controllers;

use Yii;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\web\Controller;
use app\models\Channel;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $rss = simplexml_load_file('http://habrahabr.ru/rss/interesting/');
        return $this->render('index', ['rss' => $rss->channel]);
    }

    public function actionChannels()
    {
        $model = new Channel();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            try {
                simplexml_load_file($model->url);
                $model->save();
            } catch (ErrorException $e) {
            }
        }

        return $this->render('channels', [
            'model' => $model,
            'channels' => Channel::find()->all()
        ]);
    }

}
