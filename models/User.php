<?php

/**
 *  Using load api for user
 */
class User
{
    private $user_id;
    private $real_name;
    private $permission;

    function __construct($user_id = null)
    {
        $this->user_id = $user_id;
        $this->getUserInfo($user_id);
    }

    public function setUserId($value='')
    {
       $this->user_id = $value;
       $this->getUserInfo($value);
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getName()
    {
        return $this->real_name;
    }

    public function getPermission()
    {
        return $this->permission;
    }
    
    public function loginUser($username = '', $password = '')
    {
        $row     = array();
        $query   = "SELECT * FROM `Security` WHERE username = '$username'";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row[] = $data;
            }
            if (count($row) > 0) {
                if ($password == $row[0]['password']) {
                    $this->user_id = $row[0]['id'];
                    $this->getUserInfo($row[0]['id']);
                    return $row[0]['id'] ;
                }
            }
            return false;
        }
    }
    
    private function getUserInfo($id = '')
    {
        $user    = array();
        $query   = "SELECT * FROM `User` WHERE id = '$id'";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $user[] = $data;
            }
            if (count($user) > 0) {
                $this->real_name = $user[0]['name'];
                $this->permission = $user[0]['permission'];
            }
        }
    }
    
    
    // public function getUserName($id = '')
    // {
    //     $user    = array();
    //     $query   = "SELECT * FROM `User` WHERE id = '$id'";
    //     $results = mysqli_query(Database::$dbc, $query);
    //     if ($results) {
    //         while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    //             $user[] = $data;
    //         }
    //         if (count($user) > 0) {
    //             return $user[0]['name'];
    //         }
    //     }
    //     return 'Empty';
    // }
    
    public function updateInfo($name = '')
    {
        $update = "UPDATE `User` SET `name` = '$name' WHERE `User`.`id` = '$this->user_id';";
        $this->real_name = $name;
        return mysqli_query(Database::$dbc, $update);
    }
    
    public function registerUserIntoDatabse($username = '', $password = '', $name = '')
    {
        $register = "SET FOREIGN_KEY_CHECKS=0;";
        $register .= "INSERT INTO `Security`(`username`, `password`) VALUES ('$username','$password');";
        $register .= "INSERT INTO `User` (`id`, `name`, `permission`) VALUES ('', '$name', '0');";
        $register .= "SET FOREIGN_KEY_CHECKS=1;";
        $results = mysqli_multi_query(Database::$dbc, $register);
        
        return $results;
    }
    
    public function changePassword($old_pdw = '', $new_pdw = '')
    {
        $get_old_pwd     = "SELECT `id`, `username`, `password` FROM `Security` WHERE id = $this->user_id";
        $results_old_pwd = mysqli_query(Database::$dbc, $get_old_pwd);
        if ($results_old_pwd) {
            while ($data = mysqli_fetch_array($results_old_pwd, MYSQLI_ASSOC)) {
                $row[] = $data;
            }
            if (count($row) > 0) {
                if ($row[0]['password'] == $old_pdw) {
                    $change_pwd         = "UPDATE `Security` SET `password` = '$new_pdw' WHERE `Security`.`id` = $this->user_id;";
                    $results_change_pwd = mysqli_query(Database::$dbc, $change_pwd);
                    return $results_change_pwd;
                }
            }
        }
        return false;
    }
}
?>