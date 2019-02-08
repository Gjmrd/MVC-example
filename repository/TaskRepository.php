<?php


namespace repository;

use Components\DataBase;


class TaskRepository
{
    private $db;

    public function __construct()
    {
        $this->db = DataBase::getConnection();
    }

    public function getById($id)
    {
         $query = $this->db->prepare("select * from tasks where id = :id");
         $query->execute(['id' => $id]);
         return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function selectWithPagination($limit, $page, $sortBy)
    {
        $query = $this->db->prepare("select * from tasks");
        $query->execute();

        $totalResults = $query->rowCount();
        $totalPages = ceil($totalResults/$limit);

        $startingLimit = ($page - 1)*$limit;


        $query = $this->db->prepare("select * from tasks order by :sortBy limit :startingLimit, :pageLimit");

        $query->execute([
            'sortBy' => $sortBy,
            'startingLimit' => (int)$startingLimit,
            'pageLimit' => (int)$limit
        ]);

        $result = [];
        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
            $result []= $row;
        }

        return [
            'result' => $result,
            'page' => $page,
            'totalResults' => $totalResults,
            'totalPages' => $totalPages
        ];
    }

    public function create($username, $email, $description, $status)
    {
        $query = $this->db->prepare("insert into tasks(username, email, description, status) values (:username, :email, :description, :status)");
        $query->execute([
            'username' => $username,
            'email' => $email,
            'description' => $description,
            'status' => (int)$status
        ]);
    }

    public function save($id, $description, $status)
    {
        $query = $this->db->prepare("update tasks set description = :description, status = :status where id = :id");
        $query->execute([
            'id' => (int)$id,
            'description' => $description,
            'status' => (int)$status
        ]);
    }
}