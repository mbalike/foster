<?php include 'db_conn.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">

<input type="text" name="username" id="" placeholder="create username"><br><br>
<input type="email" name="email" id="" placeholder="enter your email"><br><br>
<input type="password" name="password" id="" placeholder="create password"><br><br>
<button type="submit" name="register">Register</button>

    </form>

<?php
    if(isset($_POST['register'])){

        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

        $sql  = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
        
        if($conn->query($sql) === TRUE){
     
             echo "Registration Successful";
             header('Location:login.php');
        }
          else{
             echo "Error:" . $sql ."<br>" . $conn->error;
          }   
    }


?>

</body>
</html>