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

    public function register($name,$email,$pass,$user_type,$gender){

        $sql= " INSERT INTO registration(name, email, password, user_type, gender) VALUES(:name,:email,:pass,:user_type,:gender)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':pass' => $pass,
            ':user_type' => $user_type,
            ':name' => $name,
            ':gender' => $gender
        ]);

        return true;
    }

    public function check_users($email,$pass){

        $sql= " SELECT * FROM registration WHERE email = :email AND `password` = :pass  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':pass' => $pass
        ]);
        $result= $stmt->rowCount();

        return $result;
    }

}

?>