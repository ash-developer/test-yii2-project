<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_200644_channels extends Migration
{
    public function up()
    {
        $this->createTable('channels', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . ' NOT NULL',
            'UNIQUE KEY `url` (`url`)'
        ]);
    }

    public function down()
    {
        $this->dropTable('channels');
    }
}
