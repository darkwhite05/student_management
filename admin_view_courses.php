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

    $sql="SELECT * FROM courses";

    $result=mysqli_query($data,$sql);

    if($_GET['courses_id']){
        $t_id=$_GET['courses_id'];

        $sql2="DELETE FROM courses WHERE id='$t_id' ";
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
    <title>Course</title>

    <?php
    include 'admin_css.php';
    ?>
    <style type="text/css">
        .table_th{
            padding:20px;
            font-size:20px;
            background-color:#333;
            color:white;
        }
        .table_td{
            padding:10px;
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
    <div style="overflow-x:auto" class="content">
        <center>
            <h1>Course Information</h1>
            <table border="2px">
                <tr>
                    <th class="table_th">Image</th>
                    <th class="table_th">Course</th>
                    <th class="table_th">Details</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>

                </tr>
                <?php
                    while($info=$result->fetch_assoc()){
                ?>
                <tr>
                    <td class="table_td"><span class="circle-image"><img src="<?php echo "{$info['image']}"?>"></td></span>
                    <td class="table_td"><?php echo "{$info['courses']}"?></td>
                    <td class="table_td"><?php echo "{$info['details']}"?></td>
                    <td class="table_td"><?php echo "<a onClick=\"javascript:return confirm('You are about to delete this data. Are you sure you want to do this?')\"class='btn btn-danger' href='admin_view_courses.php?courses_id={$info['id']}'>Delete</a>";?></td>        
                    <td class="table_td"><?php echo "<a class='btn btn-success' href='admin_update_courses.php?courses_id={$info['id']}'>Update </a>";?></td>
                </tr>
                <?php }
                ?>   
        </center>
        </table>
    </div>
</body>
</html>