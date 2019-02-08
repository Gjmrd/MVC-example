<?php


namespace controllers;

use Repository\TaskRepository;

class TaskController extends Controller
{

    /**
     * max item count on task list page
    */
    const TASK_LIST_LIMIT = 3;

    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }


    /**
     * validates @fields using rules
     * returns list of errors
    */
    private function validate($fields)
    {
        $rules = [
            'username' => '(^[a-zA-Z0-9_]{1,255}$)',
            'email' => "/[-a-z0-9!#$%&'*_`{|}~]+[-a-z0-9!#$%&'*_`{|}~\.=?]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+/i",
            //'description' => '(^[a-zA-Z0-9_]{1,65535}$)',
        ];

        $errorMessages = [
            'username' => 'username is not valid',
            'email' => 'email is not valid',
            //'description' => 'description is not valid'
        ];

        $errors = [];

        foreach ($fields as $field => $value) {
            if ((isset($rules[$field])) && (preg_match("$rules[$field]", $value) == 0)) {
                $errors[$field] = $errorMessages[$field];
            }
        }

        return $errors;
    }

    public function list($page = 1)
    {
        $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : "username";
        $tasks = $this->taskRepository->selectWithPagination(self::TASK_LIST_LIMIT , $page, $sortBy);
        $this->view("list", ["tasks" => $tasks, 'sortBy' => $sortBy]);
        return true;
    }


    public function new()
    {
        $this->view("add");
        return true;
    }


    public function store()
    {
        $errors = $this->validate($_POST);
        if ($errors != []) {
            $_SESSION['errors'] = $errors;
            $this->redirect("/task/new");
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $description = $_POST['description'];
        $status = 0;

        $this->taskRepository->create($username, $email ,$description, $status);
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

        $errors = $this->validate($_POST);
        if ($errors != []) {
            $_SESSION['errors'] = $errors;
            $this->redirect("/task/edit/$id");
        }

        $description = $_POST['description'];
        $status = isset($_POST['status']) ? 1 : 0;

        $this->taskRepository->save($id, $description, $status);
        $_SESSION['messages'] = ['changes saved'];
        $this->redirect("/");
    }
}