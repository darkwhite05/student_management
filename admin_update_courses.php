<?php
    session_start();
    error_reporting(0);
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

    if($_GET['courses_id']){
        $t_id=$_GET['courses_id'];
        $sql="SELECT * FROM courses WHERE id='$t_id' ";
        $result=mysqli_query($data,$sql);
        $info=$result->fetch_assoc();
    }
    if(isset($_POST['update_courses'])){
        $id=$_POST['id'];
        $t_name=$_POST['courses'];
        $t_desc=$_POST['details'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;
        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
          
        if($file){
            $sql2="UPDATE courses SET courses='$t_name',details='$t_desc', image='$dst_db' WHERE id='$id' ";

        }else{
            $sql2="UPDATE courses SET courses='$t_name',details='$t_desc' WHERE id='$id' ";

        }

        $result2=mysqli_query($data,$sql2);  

        if($result2){
            
            header('Location: admin_view_courses.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course Data</title>

    <?php
    include 'admin_css.php';
    ?>

    <style type="text/css">
        label{
            display:inline-block;
            width:150px;
            text-align:right;
            padding-top:20px;
            padding-bottom:20px;
        }
        .teach{
            text-align:center;
            padding:10px;
        }
        .div_deg{
            background-color:#333;
            color:white;
            width:400px;
            padding-top:30px;
            padding-bottom:30px;
            border-radius:10px;
        }
        .circle-image{
            display: inline-block;
            border-radius: 50%;
            overflow: hidden;
            width: 100px;
            height: 100px;
        
        }
        .circle-image img{
            width:100%;
            height:100%;
            object-fit: cover;
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
        <h1>Update Course Data</h1>  
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}"?>" hidden>
                <div>
                   
                    <span class="circle-image"><img src="<?php echo "{$info['image']}"?>"></span>
                </div>
                <div>
                    <label>Course</label>
                    <input type="text" name="courses" value="<?php echo "{$info['courses']}"?>">
                </div>

                <div>
                    <label>Details</label>
                    <textarea name="details"><?php echo "{$info['details']}"?></textarea>
                </div>

                <div>
                    <label>Upload New Photo</label>
                    <input type="file" name="image">
                </div><br>

                <div>
                    <input type="submit" name="update_courses" class="btn btn-success" value="SUBMIT">
                </div>
            </form>
        </div>
    </center>
    </div>
</body>
</html>