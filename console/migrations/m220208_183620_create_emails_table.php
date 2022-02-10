<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%emails}}`.
 */
class m220208_183620_create_emails_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%emails}}', [
            'id' => $this->primaryKey(),
            'receiver_name' => $this->string()->notnull(),
            'receiver_email' => $this->string()->notnull(),
            'subject' => $this->string()->notnull(),
            'content' => $this->string()->notnull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%emails}}');
    }
}
