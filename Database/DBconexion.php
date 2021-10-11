<?php
namespace Database;

class DBconexion
{
    public function connect()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'covid19';
        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn) {
            $msg = "<p>Error $error conectando a la base de datos:" . mysqli_connect_errno() . "</p>";
            unset($_SESSION['db']);
            header('Location:index.php');
            die();
            exit;
        } else {
            $conn->query("SET NAMES 'utf8'");
            return $conn;
        }
    }
}
