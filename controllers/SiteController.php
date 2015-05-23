<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\base\ErrorException;
use yii\web\Controller;
use app\models\Channel;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $posts = Post::find()
            ->orderBy('date')
            ->all();

        return $this->render('index', ['posts' => $posts]);
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
