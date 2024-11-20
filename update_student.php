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

    $id=$_GET['student_id'];

    $sql="SELECT * FROM user WHERE id='$id' ";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['update'])){
        $name=$_POST['user'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $query="UPDATE user SET user='$name',email='$email',phone='$phone',password='$password' WHERE id='$id' ";

        $result2=mysqli_query($data,$query);

        if($result2){
           header("Location: view_student.php");

        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Update</title>

    <style type="text/css">
       label{
            display:inline-block;
            text-align:right;
            padding-top:15px;
            padding-bottom:15px;
            width:100px;
        }
        .div_deg{
            background-color:#333;
            width:400px;
            padding-top:50px;
            padding-bottom:50px;
            border-radius:10px;
            color:white;
            font-weight:bold;
            
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
    <div class="content">
        <center>
        <h1>Update Student</h1> 
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="user" value="<?php echo "{$info['user']}"; ?>">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email"value="<?php echo "{$info['email']}"; ?>">
                </div>

                <div>
                   <label>Cellphone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
                </div><br>

                <div>
                    <input class="btn btn-success" type="submit" name="update" value="SUBMIT">
                </div>
            </form>
        </div>
        <center>
    </div>
</body>
</html>