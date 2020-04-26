<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");

class DAO_favorites{

function look_like(){
$username=$_SESSION['username'];
$code=$_POST['id'];
$sql="select * from favorites where username='$username' and code='$code' ";
$connection = Connection::con();
$result = mysqli_query($connection, $sql);
Connection::close($connection);
if(mysqli_num_rows($result)>0){
    return true;
}else{
    return false;
}
}
function select_like(){
    $winesAr= array();
    $username=$_SESSION['username'];
    $sql="select * from favorites where username='$username' ";
    $connection = Connection::con();
    $result = mysqli_query($connection, $sql);
    Connection::close($connection);
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
                $winesAr[] = $row;
        }
    }

    return $winesAr;
    }

function insert_fav(){
    $username=$_SESSION['username'];
    $code=$_POST['id'];
    $sql="insert into favorites values ('$username','$code')";
    $connection = Connection::con();
    
    $result = mysqli_query($connection, $sql);
    Connection::close($connection);
    return $result;
}
function delete_fav(){
    $username=$_SESSION['username'];
    $code=$_POST['id'];
    $sql="delete from favorites where (username='$username')and(code='$code')";
    $connection = Connection::con();
    
    $result = mysqli_query($connection, $sql);
    Connection::close($connection);
    if($result==true){
        return false;
    }
    return true;
}

}