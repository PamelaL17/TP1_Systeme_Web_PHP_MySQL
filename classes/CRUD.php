<?php

class CRUD extends PDO {
    // Connexion a la base de donnees
    public function __construct() {
        parent::__construct('mysql:host=localhost; dbname=e2495515; port=3306; charset=utf8', 'e2495515', 'r1vxQ31LwS2vHesgiCJb');
    }

    // Selectionne tous les enregistrements d'une table
    public function select($table, $field = 'id', $order = 'ASC') {
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Selectionne un enregistrement par ID ou un autre champ
    public function selectById($table, $value, $field = 'id') {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    // Insere des donnees dans une table
    public function insert($table, $data) {
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES($fieldValue)";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->lastInsertId(); // Retourne l'ID du dernier enregistrement
    }

    // Met a jour les donnees dans une table
    public function update($table, $data, $id, $field = 'id') {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', '); // Enlever la derniere virgule
        $sql = "UPDATE $table SET $set WHERE $field = :id";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount(); // Retourne le nombre de lignes
    }

    // Supprime un enregistrement dans une table
    public function delete($table, $id, $field = 'id') {
        $sql = "DELETE FROM $table WHERE $field = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimer
    }
}

