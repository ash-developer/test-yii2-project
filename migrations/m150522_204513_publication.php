<?php

use yii\db\Schema;
use yii\db\Migration;

class m150522_204513_publication extends Migration
{
    public function up()
    {
        $this->alterColumn('publications', 'date', Schema::TYPE_DATETIME . ' NOT NULL');
    }

    public function down()
    {
        $this->alterColumn('publications', 'date', Schema::TYPE_DATE . ' NOT NULL');
    }
}
