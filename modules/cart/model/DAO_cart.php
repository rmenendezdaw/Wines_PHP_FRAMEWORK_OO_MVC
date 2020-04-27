<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");
session_start();

class DAOcart{

    function listCart(){
        $cartAr=array();
        $id=$_POST['cart'];
        $id_split=implode(" ','",$id);

        $sql="select * from wines where code in ('$id_split')";
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        Connection::close($connection);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $cartAr[] = $row;
            }
        }
        return $cartAr;
    }
    function saveCart(){
        $username=$_SESSION['username'];
        $cart=$_POST['cart'];
        $Qty=$_POST['Qty'];
        $connection = Connection::con();
        for ($i=0;$i<count($cart);$i++){
            $sql="insert into carts values ('$username','$cart[$i]', $Qty[$i])";
            $result = mysqli_query($connection, $sql);
        }
        Connection::close($connection);

        return $result;
    }
    function getCart(){
        $cartAr=array();
        $username=$_SESSION['username'];
        $connection = Connection::con();
        $sql="select * from carts where username='$username'";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $cartAr[] = $row;
            }
            $sql="delete from carts where username='$username'";
            $result = mysqli_query($connection, $sql);
        }
        Connection::close($connection);

        return $cartAr;
    }
    function getMoney(){
        $cartAr=array();
        $Qty=$_POST['Qty'];
        $code=$_POST['cart'];
        $id_split=implode(" ','",$code);
        $username=$_SESSION['username'];
        $connection = Connection::con();
        $sql="select price from wines where code in ('$id_split')";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $cartAr[] = $row;
            }
        }
        for ($i=0;$i<count($Qty);$i++){
            $total=$total+$cartAr[$i]['price']*$Qty[$i];
        }
        $sql="select money from users where username='$username'";
        $res = mysqli_query($connection, $sql);
        if(mysqli_num_rows($res)>0){
            $moneyUser=mysqli_fetch_assoc($res);
            // print_r($moneyUser);
            if($total>$moneyUser['money']){
                return;
            }else{
                $userTotal=$moneyUser['money']-$total;
                // echo($userTotal);
                $sql="insert into orders values ('$username','$total')";
                $resOrder = mysqli_query($connection, $sql);
                $sql="update users set money='$userTotal' where username='$username'";
                $resUser = mysqli_query($connection, $sql);
                Connection::close($connection);

                return $resUser;
            }
        }

        Connection::close($connection);

        return $cartAr;
    }
}