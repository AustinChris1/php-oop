<?php

class AuthenticationController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
        $this->CheckIsLoggedIn();
    }

    public function admin(){
        $user_id =  $_SESSION['auth_user']['id'];
        $checkAdmin = "SELECT id,role FROM users WHERE id = '$user_id' AND role = '1'";
        $result = $this->conn->query($checkAdmin);
        if($result->num_rows == 1){
            return true;
        }else{
            redirect("You are not authorized as an Admin", "/oop/");
        }
    }
    private function CheckIsLoggedIn(){
        if(!isset($_SESSION['auth'])){
            redirect("Login to access here", "/oop/");
            return false;
        }else{
            return true;
        }
    }
    public function authUserDetail()
    {
        $checkAuth = $this->CheckIsLoggedIn();
        if($checkAuth){
            $user_id =  $_SESSION['auth_user']['id'];
            $getUserData = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                return $data;
            }else{
                redirect("Something went wrong!", "/oop/");
            }
        }else{
            return false;
        }
    }
}
?>