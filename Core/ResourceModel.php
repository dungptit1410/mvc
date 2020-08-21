<?php

namespace Vendor\Core;

use Vendor\Config\Database;
//use Vendor\Core\ResourceModelInterface;

class ResourceModel  implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
    public function save($model)
    {
        //unset($model[$this->getId()]);
        $data = $model->getProperties();
        unset($data[$this->getId()]);

        $attributes = array_keys($data);

        $columns =  implode(", ", $attributes);
        for ($i = 0; $i < count($attributes); $i++) {
            $attributes[$i] = ':' . $attributes[$i];
        }
        $values = implode(", ", $attributes);
        $sql = "INSERT INTO " . $this->table . " (" . $columns . ") " . " VALUES (" . $values . ")";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($data);
    }
    public function delete($model)
    {
        $key = $this->getId();
        $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->id . ' = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$model->$key]);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->getTable();
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function get($id)
    {

        $sql = "SELECT * FROM " . $this->getTable() . " WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function edit($model)
    {
        //var_dump($model->getProperties());
        $data = $model->getProperties();
        unset($data["created_at"]);

        $attributes = array_keys($data);
        $attributes_set = array();
        for ($i = 0; $i < count($attributes); $i++) {
            if ($attributes[$i] != $this->getId()) {
                $attributes_set[] = $attributes[$i] . ' = :' . $attributes[$i];
            }
        }
        $columns_set =  implode(", ", $attributes_set);
        var_dump($columns_set);
        $sql = "UPDATE " . $this->getTable() . " SET " . $columns_set . " WhERE " . $this->getId() . " = :" . $this->getId();
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($data);
    }


    /**
     * Get the value of table
     */
    public function getTable()
    {
        return $this->table;
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of model
     */
    public function getModel()
    {
        return $this->model;
    }
}
