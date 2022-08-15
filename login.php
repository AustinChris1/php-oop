<?php
require_once "databases/app.php";
require_once "controllers/loginController.php";

    $login = new loginController;
if(isset($_POST['logout'])){
    $checkLogout = $login->logout();
    if($checkLogout){
        redirect("You have logged out successfully", "/oop/");
    }
}
if(isset($_POST['login'])){
    $email = validateInput($db->conn, $_POST['loginEmail']);
    $password = validateInput($db->conn, $_POST['loginPassword']);


    $checkLogin = $login->userLogin($email, $password);
    if($checkLogin){
        if($_SESSION['auth_role'] == '1'){
            redirect("Welcome back Admin!", "/oop/admin/");
        }
        $uname = $_SESSION['auth_user']['username'];
        redirect("Welcome back $uname!", "/oop/");

    }else{
        redirect("Invalid email or password", "/oop/");
    }
}
?>