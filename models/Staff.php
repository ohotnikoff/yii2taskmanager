<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $fullname
 * @property string $position
 * @property int $department_id
 * @property int $city_id
 * @property string $phone
 * @property string $email
 *
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'position', 'department_id', 'city_id', 'phone', 'email'], 'required'],
            [['department_id', 'city_id'], 'integer'],
            [['fullname', 'position', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'position' => 'Position',
            'department_id' => 'Department ID',
            'city_id' => 'City ID',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedTasks()
    {
        return $this->hasMany(Tasks::className(), ['assigned_to' => 'id']);
    }

    /**
     * Gets query for [[Tasks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedTasks()
    {
        return $this->hasMany(Tasks::className(), ['created_by' => 'id']);
    }
}
