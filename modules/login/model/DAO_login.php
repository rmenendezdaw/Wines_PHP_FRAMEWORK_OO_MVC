<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");
session_start();

class DAOlogin{



    /////////////////////////////////
        //SELECT
    ////////////////////////////////
    function find_user(){
        $username=$_POST['username'];

        $sql="select * from users where username='$username'";
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        Connection::close($connection);
        if (mysqli_num_rows($result) > 0){
            return true;
        }
        return false;

    }
    function insert_user(){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $encrypt_password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $hash_avatar=md5 (strtolower( trim( $email) ) );
        $avatar="https://www.gravatar.com/avatar/$hash_avatar?s=40&d=identicon";
        $sql="insert into users values ('$username','$email','user','$avatar','$encrypt_password')";
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        Connection::close($connection);
        return $result;

    }
    function select_user(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="select * from users where username='$username'";
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql)->fetch_object();
        $useArray=get_object_vars($result);

        Connection::close($connection);

        if (password_verify($_POST['password'],$useArray['password'])) {

            $_SESSION['type']=$useArray['type'];
            $_SESSION['username']=$useArray['username'];
            $_SESSION['avatar']=$useArray['avatar'];
            $_SESSION['time']=time();
            
            return true;
        }
        return false;

    }
}