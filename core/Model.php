<?php

namespace Core;
use Config\Connector;

class Model {
    public $pdo;
    public $table;

    public function __construct() {
        $this->pdo = Connector::connectToDatabase(); // Obtém a instância PDO
    }

    /**
     * Inicializa uma nova instância da classe Find.
     *
     * @return \Core\Find
     */
    public function find() {
        return new Find($this);
    }

    /**
     * Cria um novo registro na tabela.
     *
     * @param array $data Dados a serem inseridos
     * @return bool Retorna verdadeiro em caso de sucesso, falso caso contrário
     */
    public function create(array $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), '?'));
        
        $query = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($query);
        
        return $stmt->execute(array_values($data));
    }

    /**
     * Atualiza um registro na tabela.
     *
     * @param array $data Dados a serem atualizados
     * @param array $conditions Condições para a atualização
     * @return bool Retorna verdadeiro em caso de sucesso, falso caso contrário
     */
    public function update(array $data, array $conditions) {
        $setClause = implode(", ", array_map(function($key) {
            return "$key = ?";
        }, array_keys($data)));
        
        $whereClause = implode(" AND ", array_map(function($key) {
            return "$key = ?";
        }, array_keys($conditions)));
        
        $query = "UPDATE " . $this->table . " SET $setClause WHERE $whereClause";
        $stmt = $this->pdo->prepare($query);
        
        return $stmt->execute(array_merge(array_values($data), array_values($conditions)));
    }

    /**
     * Exclui um ou mais registros da tabela.
     *
     * @param array $conditions Condições para a exclusão
     * @return bool Retorna verdadeiro em caso de sucesso, falso caso contrário
     */
    public function delete(array $conditions) {
        $whereClause = implode(" AND ", array_map(function($key) {
            return "$key = ?";
        }, array_keys($conditions)));
        
        $query = "DELETE FROM " . $this->table . " WHERE $whereClause";
        $stmt = $this->pdo->prepare($query);
        
        return $stmt->execute(array_values($conditions));
    }
}
