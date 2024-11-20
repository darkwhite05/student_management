<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }elseif($_SESSION['usertype']=='admin'){
        header("Location: login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";

    $data=mysqli_connect($host,$user,$password,$db);

    $name=$_SESSION['username'];

    $sql="SELECT * FROM user WHERE user='$name' ";

    $result=mysqli_query($data,$sql);

    $info=mysqli_fetch_assoc($result);

    if(isset($_POST['update_profile'])){    
        $s_email=$_POST['email'];
        $s_phone=$_POST['phone'];
        $s_password=$_POST['password'];

        $sql2="UPDATE user SET email='$s_email',phone='$s_phone',password='$s_password' WHERE user='$name' ";
        
        $result2=mysqli_query($data,$sql2);

        if($result2){
           header('Location: student_profile.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <?php
    include 'student_css.php'
    ?>
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
            color:white;
            width:400px;
            padding-top:20px;
            padding-bottom:20px;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <?php
        include 'student_sidebar.php'
    ?>
    <div class="content">
        <center>
        <h1>Update Profile</h1>
        <form  action="#" method="POST"> 
            <div class="div_deg">
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}" ?>">
                </div>

                <div>
                    <label>Cellphone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}" ?>">
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
                </div><br>

                <div>
                    <input type="submit" class="btn btn-success" name="update_profile" value="SUBMIT">

                </div>
        </form>
        </center>
    </div>
</body>
</html>