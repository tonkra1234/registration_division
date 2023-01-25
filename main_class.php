<?php

class Session {

    public function user(){
        session_start();
        $user_name = $_SESSION['user_name'];
        $_SESSION['user_name'] = $user_name;

        return $user_name;
    }

}

?>