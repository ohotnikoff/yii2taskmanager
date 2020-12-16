<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Faker\Factory;
use app\models\Staff;
use app\models\Task;

class FakerController extends Controller
{
    /**
     * Генерация тестовых данных сотрудников.
     * @return int Exit code
     */
    public function actionGenerateStaff()
    {
        $faker = Factory::create('ru_RU');

        for($i = 0; $i < 100; $i++)
        {
            $staff = new Staff();
            $staff->fullname = $faker->name;
            $staff->position = $faker->jobTitle();
            $staff->department_id = rand(1, 4);
            $staff->city_id = rand(1, 2);
            $staff->phone = $faker->phoneNumber;
            $staff->email = $faker->email;
            $staff->save(false);
        }

        return ExitCode::OK;
    }

    /**
     * Генерация тестовых данных задач.
     * @return int Exit code
     */
    public function actionGenerateTasks()
    {
        $faker = Factory::create('ru_RU');

        for($i = 0; $i < 100; $i++)
        {
            $task = new Task();
            $task->name = $faker->realText(30);
            $task->description = $faker->realText(rand(100, 200));
            $task->status_id = rand(1, 3);
            $task->created_by = rand(1, 100);
            $task->assigned_to = rand(1, 100);
            $task->save(false);
        }

        return ExitCode::OK;
    }
}
