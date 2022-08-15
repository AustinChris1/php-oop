<?php

class userController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function delete($id){
        $user_id = validateInput($this->conn, $id);
        $userDeleteQuery = "DELETE FROM users WHERE id = '$user_id'";
        $result = $this->conn->query($userDeleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function update($data, $id)
    {
        $user_id = validateInput($this->conn, $id);
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $phone = $data['phone'];
        $userUpdateQuery = "UPDATE users SET name = '$name', username = '$username', email = '$email', phone = '$phone' WHERE id = '$user_id'";
        $result = $this->conn->query($userUpdateQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function edit($id){
        $user_id = validateInput($this->conn, $id);
        $userQuery = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data;
        }
        else{
            return false;
        }
    }

    public function index()
    {
        $userQuery = "SELECT * FROM users";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result;

        }else{
            return false;
        }
    }
    public function create($inputData)
    {
        $data = "'". implode("','", $inputData) ."'";
        $userQuery = "INSERT INTO users (name, username, email, phone, reg_date, password) VALUES($data)";
        $result = $this->conn->query($userQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>