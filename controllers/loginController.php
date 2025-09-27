<?php
$q2="SELECT * FROM users";
$result2=$db->query($q2);

if(isset($_GET['logout'])){
    $_SESSION['user']=false;
    header('Location:index.php');
    exit();
 }

if(!isset($_SESSION['user'])){
    $_SESSION['user']=false;
}



if(isset($_POST['Registrar'])){
    require_once('views/registro.phtml');
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $q2="SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'";
    $result2=$db->query($q2);
    if($row=mysqli_fetch_assoc($result2)){
            $_SESSION['user']=new User($row['id'], $row['username'], $row['email'], $row['password']);
            header('location:index.php');
        }
    }

if(!($_SESSION['user'] || isset($_GET['logout']))){
    require_once('views/login.phtml');
    exit();
}