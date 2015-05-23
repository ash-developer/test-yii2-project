<?php

namespace app\commands;

use app\models\Category;
use app\models\Channel;
use app\models\Post;
use app\models\Publication;
use yii\console\Controller;
use yii\db\Exception;

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
            $date = date('Y-m-d H:i:s', strtotime($rss->channel->pubDate->__toString()));

            $count = $channel->getPublications()
                ->where(['date' => $date])
                ->count();

            if ($count == 0) {
                $publication = new Publication();
                $publication->date = $date;
                $publication->link('channel', $channel);
                $publication->save();

                foreach ($rss->channel->item as $item) {
                    $post = Post::find()->where(['link' => $item->link->__toString()])->one();

                    if (!$post) {
                        $post = new Post();
                        $post->title = $item->title->__toString();
                        $post->author = $item->author->__toString();
                        $post->link = $item->link->__toString();
                        $post->description = $item->description->__toString();
                        $post->date = date('Y-m-d H:i:s', strtotime($item->pubDate->__toString()));
                        $post->save();

                        foreach ($item->category as $category) {
                            $model = Category::find()->where(['title' => $category->__toString()])->one();

                            if (!$model) {
                                $model = new Category();
                                $model->title = $category->__toString();
                                $model->save();
                            }

                            try {
                                $post->link('categories', $model);
                            } catch (Exception $e) {

                            }
                        }
                    }
                }
            }
        }
    }

}
