<?php

namespace Vendor\Controllers;

use Vendor\Core\Controller;
use Vendor\Models\Task;
use Vendor\Models\TaskRepository;
use Vendor\Models\TaskModel;

class tasksController extends Controller
{
    function index()
    {
        //require(ROOT . 'Models/Task.php');

        $tasks = new TaskRepository;
        $d['tasks'] = $tasks->getAll();
        $this->set($d);

        $this->render("index");
    }

    function create()
    {
        $this->render("create");
    }

    function add(){
        if(isset($_POST["title"])){
            $task = new TaskModel;
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setCreated_at(date('Y-m-d H:i:s'));
            $task->setUpdated_at(date('Y-m-d H:i:s'));
            $taskRepo = new TaskRepository;
            if($taskRepo->add($task)){
                header("Location: " . WEBROOT . "tasks/index");
                //echo '1234';
            };
        }
    }

    function saveEdit(){
        if(isset($_POST["title"])){
            $task = new TaskModel;
            $task->setId($_POST["id"]);
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setUpdated_at(date('Y-m-d H:i:s'));
            $taskRepo = new TaskRepository;
            if($taskRepo->edit($task)){
                header("Location: " . WEBROOT . "tasks/index");
            };
        }
    }

    function edit($id)
    {
        
        $taskRepo = new TaskRepository;
        $d['task'] = $taskRepo->get($id);
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $taskRepo = new TaskRepository;
        $taskDele = $taskRepo->get($id);
        if ($taskRepo->delete($taskDele)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
