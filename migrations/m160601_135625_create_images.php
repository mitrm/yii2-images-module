<?php

use yii\db\Migration;

class m160601_135625_create_images extends Migration
{
    public function up()
    {
        $this->createTable('images_common', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250),
            'path' => $this->string(100),
            'hash' => $this->string(30),
            'name' => $this->string(50),
            'exp' => $this->string(10),
            'is_active' => $this->boolean()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex('hash','images_common','hash');
        $this->createIndex('name','images_common','name');
        $this->createIndex('is_active','images_common','is_active');
    }

    public function down()
    {
        $this->dropTable('images_common');
    }
}
