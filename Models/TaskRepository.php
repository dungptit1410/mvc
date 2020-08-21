<?php

namespace Vendor\Models;

use Vendor\Models\TaskResourceModel;
use Vendor\Models\TaskModel;

class TaskRepository
{
    public function add($model)
    {
        $taskResource = new TaskResourceModel;
        if ($taskResource->save($model)) {
            return 1;
        } else {
            return 0;
        };
    }
    public function get($id)
    {
        $taskResource = new TaskResourceModel;
        $task =  $taskResource->get($id);
        $taskObject = new TaskModel;
        $taskObject->setId($task['id']);
        $taskObject->setTitle($task['title']);
        $taskObject->setDescription($task['description']);
        $taskObject->setCreated_at($task['created_at']);
        $taskObject->setUpdated_at($task['updated_at']);
        return $taskObject;
    }
    public function delete($model)
    {
        $taskResource = new TaskResourceModel;
        if ($taskResource->delete($model)) {
            return 1;
        } else {
            return 0;
        };
    }
    public function edit($model){
        $taskResource = new TaskResourceModel;
        if ($taskResource->edit($model)) {
            return 1;
        } else {
            return 0;
        };
    }
    public function getAll()
    {
        $taskResource = new TaskResourceModel;
        $tasks = $taskResource->getAll();
        $tasksObject = [];
        foreach ($tasks as $task) {
            $taskObject = new TaskModel;
            $taskObject->setId($task['id']);
            $taskObject->setTitle($task['title']);
            $taskObject->setDescription($task['description']);
            $taskObject->setCreated_at($task['created_at']);
            $taskObject->setUpdated_at($task['updated_at']);
            $tasksObject[] = $taskObject;
        }
        // echo '<pre>';
        // print_r($tasksObject);
        // echo '<pre/>';
        // die();
        return $tasksObject;
    }
}
