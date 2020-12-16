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
 * @property Task[] $assignedTasks
 * @property Task[] $createdTasks
 */
class Staff extends \yii\db\ActiveRecord
{
    public static $departments = [
        1 => 'Отдел продаж',
        2 => 'Отдел маркетинга',
        3 => 'Отдел управления',
        4 => 'Отдел финансов',
    ];

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
            'fullname' => 'ФИО',
            'position' => 'Должность',
            'department_id' => 'Отдел',
            'city_id' => 'Город',
            'phone' => 'Телефон',
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
        return $this->hasMany(Task::className(), ['assigned_to' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedTasks()
    {
        return $this->hasMany(Task::className(), ['created_by' => 'id']);
    }

    public function department()
    {
        return self::$departments[$this->department_id];
    }

    public function city()
    {
        return City::$cities[$this->city_id];
    }
}
