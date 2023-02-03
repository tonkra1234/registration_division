<?php

require_once './include/config.php';

class DataBase extends Config {

    public function read() {
        
        $sql ="SELECT * FROM `manufacturer_list` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function insert($Name_Manufacturer, $Proprietor,$Key_person, $Category, $Email, $Dzongkhag, $Location, $image_link) {
        $sql = "INSERT INTO pre_approval (Name_Manufacturer,Proprietor,Key_person,Category,Location,Email,Dzongkhag,image_link) 
        VALUES(:Name_Manufacturer,:Proprietor,:Key_person,:Category,:Location,:Email,:Dzongkhag,:image_link)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Name_Manufacturer' => $Name_Manufacturer,
            'Proprietor' => $Proprietor,
            'Key_person' => $Key_person,
            'Category' => $Category,
            'Location' => $Location,
            'Email' => $Email,
            'Dzongkhag' => $Dzongkhag,
            'image_link' => $image_link
        ]);
        return true;
    }

    public function edit($id,$Name_Manufacturer, $Proprietor,$Key_person, $Category, $Email, $Dzongkhag, $Location, $image_link) {
        $sql = "UPDATE manufacturer_list SET Name_Manufacturer=:Name_Manufacturer, Proprietor=:Proprietor, Key_person=:Key_person, Category=:Category, Location=:Location, Email=:Email, Dzongkhag=:Dzongkhag, image_link=:image_link WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Name_Manufacturer' => $Name_Manufacturer,
            'Proprietor' => $Proprietor,
            'Key_person' => $Key_person,
            'Category' => $Category,
            'Location' => $Location,
            'Email' => $Email,
            'Dzongkhag' => $Dzongkhag,
            'image_link' => $image_link
        ]);
        return true;
    }

    public function delete_manufacturer($id) {
        $sql = "DELETE FROM manufacturer_list WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function move_manufacturer($id) {
        $sql = "INSERT INTO trash SELECT * FROM manufacturer_list WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    
}

?>