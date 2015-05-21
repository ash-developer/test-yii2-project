<?php

use yii\db\Schema;
use yii\db\Migration;

class m150521_202847_publication extends Migration
{
    public function up()
    {
        $this->createTable('publications', [
            'id' => Schema::TYPE_PK,
            'channel_id' => Schema::TYPE_INTEGER,
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'UNIQUE KEY `publication` (`channel_id`, `date`)'
        ]);
        $this->addForeignKey('channel', 'publications', 'channel_id', 'channels', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('channel', 'publications');
        $this->dropTable('publications');
    }
}
