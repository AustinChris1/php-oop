<?php
require_once "databases/app.php";
require_once "controllers/registerController.php";

if(isset($_POST['register'])){
    $name = validateInput($db->conn, $_POST['regName']);
    $email = validateInput($db->conn, $_POST['regEmail']);
    $username = validateInput($db->conn, $_POST['regUsername']);
    $password = validateInput($db->conn, $_POST['regPassword']);
    $confirmPassword = validateInput($db->conn, $_POST['confirmPassword']);
    $phone = validateInput($db->conn, $_POST['regPhone']);

    $register = new RegisterController;
    $result_password = $register->confirmPassword($password, $confirmPassword);
    if($result_password){
        $result_user = $register->ifUserExists($email);
        if($result_user){
            redirect("Email exists", "index.php");
        }
        else{
            $result_register = $register->registration($name, $email, $username, $password, $phone);
            if($result_register){
            redirect("Registration Successful", "login.php");
            }else{
                redirect("Something went wrong!", "index.php");
            }
        }
    }else{
        redirect("Password and Confirm password does not match", "index.php#registerModal");
    }
}
?>