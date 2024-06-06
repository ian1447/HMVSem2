<?php
    session_start();
    include "../includes/db.php";
    if (isset($_POST['Uname']) && isset($_POST['Pass']))
    {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname =$_POST['Uname'];
        $password = $_POST['Pass'];

        $sql = "SELECT * FROM `users` WHERE username = '$uname' AND `password` = PASSWORD('$password');";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            // $password = md5($password);
                // if($row['privilege'] === $privilege)
                // {
            $_SESSION['user'] = $row['username'];
            $_SESSION['cart'] = [];
            header("Location: ../index.php");
        } 
        else{
            echo "<script>
            alert('NO Account Registered under said credentials.');
            window.location.href='../login.php';
            </script>";
        }
    }
?>