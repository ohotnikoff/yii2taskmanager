<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int|null $status_id
 * @property int $created_by
 * @property int $assigned_to
 *
 * @property Staff $assignedTo
 * @property Staff $createdBy
 */
class Task extends \yii\db\ActiveRecord
{
    public static $statuses = [
        1 => 'Новая',
        2 => 'В работе',
        3 => 'Завершена',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'created_by', 'assigned_to'], 'required'],
            [['description'], 'string'],
            [['status_id', 'created_by', 'assigned_to'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['assigned_to'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['assigned_to' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тема',
            'description' => 'Описание',
            'status_id' => 'Статус',
            'created_by' => 'Постановщик',
            'assigned_to' => 'Исполнитель',
            'created_at' => 'Дата',
        ];
    }

    /**
     * Gets query for [[AssignedTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedTo()
    {
        return $this->hasOne(Staff::className(), ['id' => 'assigned_to']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Staff::className(), ['id' => 'created_by']);
    }

    /**
     * Returns post create time.
     * @return string
     */
    public function displayDate($format = 'dd.MM.yyyy')
    {
        return Yii::$app->formatter->asDate($this->created_at, $format);
    }

    public function status()
    {
        return self::$statuses[$this->status_id];
    }
}
