<?php
session_start();

require_once "../../database.php";

$db = new Database('ecoms');

if (isset($_POST['submit'])) {

    $username  = $_POST['username'];
    $passwords = $_POST['passwords'];

    $where = "WHERE username='$username' AND passwords='$passwords'";
    $res   = $db->getdata('user', 0, $where);

    if (!empty($res)) {

        $user = $res[0];
        unset($user['passwords']);
        $_SESSION['data'] = $user;

        header("Location:../../home.php");
        exit;

    } else {
        echo "Invalid Username or Password";
    }
}
