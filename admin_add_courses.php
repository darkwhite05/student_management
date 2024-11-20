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

    if(isset($_POST['add_courses'])){
        $t_name=$_POST['name'];
        $t_details=$_POST['details'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;
        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'], $dst );
        
        $sql="INSERT INTO courses (courses, details, image) VALUES('$t_name','$t_details','$dst_db')";
        
        $result=mysqli_query($data,$sql);

        if($result){
            echo "<script type='text/javascript'>;
                alert('Data Uploaded Successfully!')</script>";
            }else{
                echo "Upload Failed!";   
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>

    <?php
    include 'admin_css.php';
    ?>

    <style type="text/css">
       
        .div_deg{
            background-color:#333;
            color:white;
            width:500px;
            padding-top:50px;
            padding-bottom:50px;
            border-radius:10px;
            font-weight:bold;
           
        }
    </style>

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
            <h1>Add Teacher</h1>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Course</label>
                        <input type="text" name="name">
                    </div><br>

                    <div>
                        <label>Description</label>
                        <textarea name="details"></textarea>
                    </div><br>

                    <div>
                        <label>Image</label>
                        <input type="file" name="image">
                    </div><br>

                    <div>
                        <input type="submit" name="add_courses" value="SUBMIT" class="btn btn-success">
                    </div>

                </form>
            </div> 
        </center>
    </div>

</body>
</html>