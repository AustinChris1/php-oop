<?php

class loginController
{
    public function __construct()
    {
        
    $db = new DatabaseConnection;
    $this->conn = $db->conn;
    }

    public function userLogin($email, $password){
        $checkLogin = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result = $this->conn->query($checkLogin);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $this->userAuthentication($data);
            return true;
        }else{
            return false;
        }
    }
    private function userAuthentication($data){
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = $data['role'];
        $_SESSION['auth_user'] = [
            'id' => $data['id'],
            'username' =>$data['username'],
            'email' => $data['email']
            
        ];

    }
    public function isLoggedIn(){
        if(isset($_SESSION['auth']) ===  true){
            redirect("You are already logged in", "login.php");
        }else{
            return false;
        }
    }

    public function logout(){
        if(isset($_SESSION['auth']) ===  true){

        unset($_SESSION['auth']);
        unset($_SESSION['auth_role']);
        unset($_SESSION['auth_user']);
        return true;
        }else{
            return false;
        }
    }
}
?>