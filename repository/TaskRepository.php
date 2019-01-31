<?php
/**
 * Created by PhpStorm.
 * User: Gm
 * Date: 31.01.2019
 * Time: 11:02
 */

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

    public function selectWithPagination($limit, $page)
    {
        $query = $this->db->prepare("select * from tasks");
        $query->execute();

        $totalResults = $query->rowCount();
        $totalPages = ceil($totalResults/$limit);

        $startingLimit = ($page - 1)*$limit;
        $query = $this->db->prepare("select * from tasks  LIMIT $startingLimit, $limit");
        $query->execute();


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

    public function create($caption, $description, $status)
    {
        $query = $this->db->prepare("insert into tasks(caption, description, status) values (:caption, :description, :status)");
        $query->execute([
            'caption' => $caption,
            'description' => $description,
            'status' => (int)$status
        ]);
    }

    public function save($id, $description, $status)
    {
        $query = $this->db->prepare("update tasks set description = :description, status = :status where id = :id");
        $query->execute([
            'id' => $id,
            'description' => $description,
            'status' => (int)$status
        ]);
    }
}