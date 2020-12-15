<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%staff}}`
 * - `{{%staff}}`
 */
class m201215_222249_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'status_id' => $this->integer()->defaultValue(1),
            'created_by' => $this->integer()->notNull(),
            'assigned_to' => $this->integer()->notNull(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-tasks-created_by}}',
            '{{%tasks}}',
            'created_by'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-tasks-created_by}}',
            '{{%tasks}}',
            'created_by',
            '{{%staff}}',
            'id',
            'CASCADE'
        );

        // creates index for column `assigned_to`
        $this->createIndex(
            '{{%idx-tasks-assigned_to}}',
            '{{%tasks}}',
            'assigned_to'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-tasks-assigned_to}}',
            '{{%tasks}}',
            'assigned_to',
            '{{%staff}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-tasks-created_by}}',
            '{{%tasks}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-tasks-created_by}}',
            '{{%tasks}}'
        );

        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-tasks-assigned_to}}',
            '{{%tasks}}'
        );

        // drops index for column `assigned_to`
        $this->dropIndex(
            '{{%idx-tasks-assigned_to}}',
            '{{%tasks}}'
        );

        $this->dropTable('{{%tasks}}');
    }
}
