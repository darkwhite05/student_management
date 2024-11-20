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

    if($_GET['teacher_id']){
        $t_id=$_GET['teacher_id'];
        $sql="SELECT* FROM teacher WHERE id='$t_id' ";
        $result=mysqli_query($data,$sql);
        $info=$result->fetch_assoc();
    }
    if(isset($_POST['update_teacher'])){
        $id=$_POST['id'];
        $t_name=$_POST['name'];
        $t_desc=$_POST['description'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;
        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
          
        if($file){
            $sql2="UPDATE teacher SET NAME='$t_name',description='$t_desc', image='$dst_db' WHERE id='$id' ";

        }else{
            $sql2="UPDATE teacher SET NAME='$t_name',description='$t_desc' WHERE id='$id' ";

        }

        $result2=mysqli_query($data,$sql2);  

        if($result2){
            
            header('Location: admin_view_teacher.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher's Data</title>

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
        <h1>Update Teacher's Data</h1>  
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo "{$info['id']}"?>" hidden>
                <div>
                   
                    <span class="circle-image"><img src="<?php echo "{$info['image']}"?>"></span>
                </div>
                <div>
                    <label>Teacher's Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}"?>">
                </div>

                <div>
                    <label>About Teacher</label>
                    <textarea name="description"><?php echo "{$info['description']}"?></textarea>
                </div>
                <div>
                    <label>Change New Photo</label>
                    <input type="file" name="image">
                </div><br>

                <div>
                    <input type="submit" name="update_teacher" class="btn btn-success" value="SUBMIT">
                </div>
            </form>
        </div>
    </center>
    </div>
</body>
</html>