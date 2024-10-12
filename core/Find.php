<?php

namespace Core;

class Find {
    public $model;
    protected $filters = [];
    protected $selects = [];
    protected $implode = '';
    protected $orderBy = '';
    protected $limit = '';

    public function __construct($model) {
        $this->model = $model;
    }

    public function only(array $fields) {
        $this->selects = $fields;
        return $this;
    }

    public function where(array $fields, $implode = ' AND ') {
        $this->filters = $fields;
        $this->implode = $implode;
        return $this;
    }

    public function filter(array $filters, array $fields) {
        return array_diff(array_keys($filters[0]), $fields);

    }

    public function id($id) {
        $this->filters['id'] = $id;
        return $this;
    }

    public function execute() {
        $query = "SELECT " . (empty($this->selects) ? '*' : implode(', ', $this->selects)) . " FROM " . $this->model->table;
        if (!empty($this->filters)) {
            $query .= " WHERE " . implode($this->implode, array_map(function($key) {
                return "$key = :$key";
            }, array_keys($this->filters)));
        }
        $stmt = $this->model->pdo->prepare($query);
        foreach ($this->filters as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }
}
