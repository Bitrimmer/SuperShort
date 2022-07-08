<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%link}}`.
 */
class m220708_141045_create_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%link}}', [
            'id' => $this->primaryKey(),
            'date' => $this->timestamp(),
            'link'=> $this->string('600')->notNull(),
            'short' => $this->string('50')->unique(),
            'count_ref' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%link}}');
    }
}
