<?php

namespace app\commands;

use app\models\Channel;
use app\models\Publication;
use yii\console\Controller;

class RssController extends Controller
{

    public function actionUpdate()
    {
        $channels = Channel::find()->all();

        /**
         * @var $channels Channel[]
         */
        foreach ($channels as $channel) {
            $rss = simplexml_load_file($channel->url);

            $count = $channel->getPublications()
                ->where(['date', ])
                ->count();

            if ($count === 0) {
                $publication = new Publication();
                $publication->date = date();
                $publication->link('channel', $channel);
            }
        }
    }

}
