<?php include 'db_conn.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="username" id="" placeholder="username"><br><br>
        <input type="password" name="password" id="" placeholder="password"><br><br>
        <button type="submit" name="login">Login</button>
        <p>Sign up <a href="register.php">here</a></p>
    </form>
<?php
  session_start();

    if(isset($_POST['login'])){

        $username = $conn->real_escape_string($_POST['username']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result =  $conn->query($sql);

         if($result->num_rows > 0){

            $user = $result->fetch_assoc();
             if(password_verify($password,$user['password'])){
                $_SESSION['username'] = $user['username'];
                header('Location: dashboard.php');
             }
               else{
                  echo "invalid password";
               }
         }
            else{
                echo "Usernsame doesn't exist";
            }
    }
?>
</body>
</html>



