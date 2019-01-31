<?php


namespace controllers;

use Repository\TaskRepository;

class TaskController extends Controller
{

    const TASK_LIST_LIMIT = 3;

    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function list($page = 1)
    {
        $tasks = $this->taskRepository->selectWithPagination(self::TASK_LIST_LIMIT , $page);
        $this->view("list", ["tasks" => $tasks]);
        return true;
    }


    public function new()
    {
        $this->view("add");
        return true;
    }


    public function store()
    {
        $caption = $_POST['caption'];
        $description = $_POST['description'];
        $status = 0;
        $this->taskRepository->create($caption, $description, $status);
        $_SESSION['messages'] = ["task added"];
        $this->redirect("/");
    }

    //can be performed only by admin
    public function edit($id)
    {
        $this->checkForAdmin();
        $task = $this->taskRepository->getById($id);
        $this->view("edit", ['task' => $task]);
        return true;
    }

    //can be performed only by admin
    public function save($id)
    {
        $this->checkForAdmin();
        $description = $_POST['description'];
        $status = isset($_POST['status']) ? 1 : 0;
        $this->taskRepository->save($id, $description, $status);
        $_SESSION['messages'] = ['changes saved'];
        $this->redirect("/");
    }
}