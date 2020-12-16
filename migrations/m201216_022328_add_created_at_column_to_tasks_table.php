<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tasks}}`.
 */
class m201216_022328_add_created_at_column_to_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tasks}}', 'created_at', $this->timestamp()->defaultValue('0000-00-00 00:00:00'));
        $this->addColumn('{{%tasks}}', 'updated_at', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tasks}}', 'created_at');
        $this->dropColumn('{{%tasks}}', 'updated_at');
    }
}
