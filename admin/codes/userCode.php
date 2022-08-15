<?php
require_once "../../databases/app.php";
require_once "../controllers/userController.php";

if(isset($_POST['delete_user'])){
    $id = validateInput($db->conn, $_POST['delete_user']);
    $user = new userController;
    $result = $user->delete($id);
    if($result){
        redirect("User deleted successfully", "/oop/admin/users.php");
    }else{
        redirect("Something went wrong!", "/oop/admin/users.php");

    }
 
}

if(isset($_POST['update_user'])){
   $id = validateInput($db->conn, $_POST['id']);
    $data = [
        'name' => validateInput($db->conn, $_POST['name']),
        'username' => validateInput($db->conn, $_POST['username']),
        'email' => validateInput($db->conn, $_POST['email']),
        'phone' => validateInput($db->conn, $_POST['phone'])
        ];
    
    $user = new userController;
    $result = $user->update($data, $id);
    if($result){
        redirect("User details updated successfully", "/oop/admin/user_edit.php?id=$id");
    }else{
        redirect("Something went wrong!", "/oop/admin/user_edit.php?id=$id");

    }
}

if(isset($_POST['add_user'])){
    $data = [
    'name' => validateInput($db->conn, $_POST['name']),
    'username' => validateInput($db->conn, $_POST['username']),
    'email' => validateInput($db->conn, $_POST['email']),
    'phone' => validateInput($db->conn, $_POST['phone']),
    'date' => date('Y-m-d H:i:s'),
    'password' => 'SpectraWebxUser123'
    ];

    $user = new userController;
    $result = $user->create($data);
    if($result){
        redirect("User added successfully", "/oop/admin/user-add.php");
    }else{
        redirect("Something went wrong!", "/oop/admin/user-add.php");

    }
}

?>