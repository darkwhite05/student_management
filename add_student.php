<?php
    session_start();
    if(!isset($_SESSION['username'])){
     header("Location:login.php");
    }elseif($_SESSION['usertype']=='student'){
        header("Location:login.php");
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student'])){
        $username=$_POST['name'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_password=$_POST['password'];
        $usertype="student";

        $check="SELECT * FROM user WHERE user='$username' ";
        $check_user=mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);

        if($row_count==1){
            echo "<script type='text/javascript'>;
            alert('Username already exist. Please try another one!')</script>";
        }else{
            $sql="INSERT INTO user(user,email,phone,usertype,password)VALUES('$username','$user_email','$user_phone','$usertype','$user_password')";
            $result=mysqli_query($data,$sql);

            if($result){
                echo "<script type='text/javascript'>;
                alert('Data Uploaded Successfully!')</script>";
            }else{
                echo "Upload Failed!";   
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <style type="text/css">
        label{
            display:inline-block;
            text-align:right;
            padding-top:15px;
            padding-bottom:10px;
            width:100px;
        }
        .div_deg{
            background-color:#333;
            color:white;
            width:400px;
            padding-top:50px;
            padding-bottom:50px;
            border-radius:10px;
        }
    </style>

    <?php
    include 'admin_css.php';
    ?>
</head>
<body>
    <?php
        include 'admin_sidebar.php'
    ?>
     <div id="navbar">
        <a href="adminhome.php" class="logo">Canor University</a>
        <div class="navbar-right">    
                <a href="logout.php">Logout</a>
            </div>
        </div><br><br><br>
    <div class="content">
        <center>
         <h1>Register Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                    
                </div>
                
                
            
                <div>
                    <label>Cellphone</label>
                    <input type="number" name="phone">
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div><br>
                    <input type="submit" class="btn btn-success" name="add_student" value="SUBMIT">
                </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>