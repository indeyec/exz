<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230626_113305_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'first_name'=>$this->string(256),
            'last_name'=>$this->string(256),
            'middle_name'=>$this->string(256),
            'login'=>$this->string(256),
            'password'=>$this->string(256),
            'password_repeat'=>$this->string(256),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
