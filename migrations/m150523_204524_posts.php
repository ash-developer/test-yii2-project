<?php

use yii\db\Migration;

class m150523_204524_posts extends Migration
{
    public function up()
    {
        $this->delete('posts');

        $this->addColumn('posts', 'date', \yii\db\Schema::TYPE_DATETIME);
        $this->createIndex('UNIQUE_LINK', 'posts', 'link', true);
    }

    public function down()
    {
        $this->dropIndex('UNIQUE_LINK', 'posts');
        //$this->dropColumn('posts', 'date');
    }
}
