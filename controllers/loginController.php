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


if(isset($_POST['username']) && isset($_POST['password'])){
    $q2="SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'";
    $result2=$db->query($q2);
    if($row=mysqli_fetch_assoc($result2)){
            $_SESSION['user']=new User($row['id'], $row['username'], $row['email'], $row['password']);
            header('location:index.php');
        }
    }

// SI PULSA EL BOTÓN REGISTRAR
if (isset($_POST['Registrar'])) {
    require_once('views/registro.phtml');

    // COMPROBAR QUE LOS CAMPOS NO ESTÉN VACÍOS
    if (isset($_POST['newUsername']) && isset($_POST['newPassword']) && isset($_POST['newEmail']) && isset($_POST['confirmPassword'])) {
        if (!empty($_POST['newUsername']) && !empty($_POST['newPassword']) && !empty($_POST['newEmail']) && !empty($_POST['confirmPassword'])) {

            // COMPROBAR QUE LAS CONTRASEÑAS COINCIDEN
            if ($_POST['newPassword'] != $_POST['confirmPassword']) {
                echo "<script>alert('Las contraseñas no coinciden.');</script>";
                exit();
            }

            // COMPROBAR QUE EL USUARIO NO EXISTE
            $checkUser = "SELECT * FROM users WHERE username='" . $_POST['newUsername'] . "'";
            $result2 = $db->query($checkUser);
            if (mysqli_num_rows($result2) > 0) {
                echo "<script>alert('El usuario ya existe.');</script>";
                exit();
            }

            // COMPROBAR QUE EL EMAIL NO EXISTE
            $checkEmail = "SELECT * FROM users WHERE email='" . $_POST['newEmail'] . "'";
            $result2 = $db->query($checkEmail);
            if (mysqli_num_rows($result2) > 0) {
                echo "<script>alert('El email ya está en uso.');</script>";
                exit();
            }

            // INSERTAR USUARIO EN LA BASE DE DATOS
            $q3 = "INSERT INTO users (username, email, password) VALUES ('" . $_POST['newUsername'] . "','" . $_POST['newEmail'] . "','" . md5($_POST['newPassword']) . "')";
            $result3 = $db->query($q3);
            if ($result3) {
                echo "<script>alert('Usuario registrado con éxito.');</script>";
            } else {
                echo "<script>alert('Error al registrar el usuario.');</script>";
            }
        } else {
            echo "<script>alert('Rellena todos los campos.');</script>";
        }
    }
    exit();
}


// SI NO PULSA NADA Y NO HAY NADA SETEADO MUESTRA ESTO
if(!($_SESSION['user'] || isset($_GET['logout']))){
    require_once('views/login.phtml');
    exit();
}



