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

    $sql="SELECT * FROM admission";

    $result=mysqli_query($data,$sql);

    if($_GET['admin_id']){
        $t_id=$_GET['admin_id'];

        $sql2="DELETE FROM admission WHERE id='$t_id' ";
        $result2=mysqli_query($data,$sql2);

        if($result2){
           header('Location: admission.php'); 
        }
    }
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <?php
    include 'admin_css.php' 
    ?>
    
    <style type="text/css">
        .table_th{
            padding:20px;
            background-color:#333;
            color:white;
        }
        .table_td{
            padding:20px;
        }

    </style>

</head>
<body>
    <?php
     include 'admin_sidebar.php';
    ?>
   <div id="navbar">
        <a href="adminhome.php" class="logo">Canor University</a>
        <div class="navbar-right">    
                <a href="logout.php">Logout</a>
            </div>
        </div><br><br><br>
    <div style="overflow-x:auto" class="content">
        <center>
            <h1>Applied for Admission</h1>
    
            <table border="3px">
                <tr>
                    <th class="table_th">Name</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Cellphone</th>
                    <th class="table_th">Message</th>
                    <th class="table_th">Action</th>
                </tr>

                <?php
                    while($info=$result->fetch_assoc()){
                ?>
            
                <tr>
                    <td class="table_td"><?php echo"{$info['name']}";?></td> 
                    <td class="table_td"><?php echo"{$info['email']}";?></td></td> 
                    <td class="table_td"><?php echo"{$info['phone']}";?></td></td> 
                    <td class="table_td"><?php echo"{$info['message']}";?></td></td>  
                    <td class="table_td"><?php echo "<a onClick=\"javascript:return confirm('You are about to delete this data. Are you sure you want to do this?')\"class='btn btn-danger' href='admission.php?admin_id={$info['id']}'>Delete</a>";?></td>        
          
                </tr>
                <?php } ?>
            </table>
        </center>
   </div>
</body>
</html>