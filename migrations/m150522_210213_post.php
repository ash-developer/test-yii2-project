<?php

use yii\db\Schema;
use yii\db\Migration;

class m150522_210213_post extends Migration
{
    public function up()
    {

        $this->createTable('posts', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'link' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'author' => Schema::TYPE_STRING
        ]);

        $this->createIndex('posts', 'posts', 'title');

        $this->createTable('categories', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'UNIQUE KEY `categories` (`title`)'
        ]);

        $this->createTable('post_category_relations', [
            'id' => Schema::TYPE_PK,
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'UNIQUE KEY `post_category_relations` (`post_id`, `category_id`)'
        ]);

        $this->addForeignKey('post_relation', 'post_category_relations', 'post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('category_relation', 'post_category_relations', 'category_id', 'categories', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('post_relation', 'post_category_relations');
        $this->dropForeignKey('category_relation', 'post_category_relations');
        $this->dropTable('post_category_relations');
        $this->dropTable('categories');
        $this->dropTable('posts');
    }
}
