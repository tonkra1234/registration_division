<?php

require './config.php';

class DataBase extends Config {

    public function login($email,$pass){

        $sql= " SELECT * FROM registration WHERE email = :email AND `password` = :pass ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':pass' => $pass
        ]);

        return $stmt;
    }

}

?>