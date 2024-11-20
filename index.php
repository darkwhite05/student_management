<?php
    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message']){
        $message=$_SESSION['message'];
            echo "<script type='text/javascript'>
            alert('$message');
            </script>";

    }
    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";

    $data=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * FROM teacher";

    $result=mysqli_query($data,$sql);


    $data1=mysqli_connect($host,$user,$password,$db);
    $sql1="SELECT * FROM courses";
    $result1=mysqli_query($data1,$sql1);    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
</head>
<body>
    <div id="navbar">
        <a href="index.php" class="logo">Canor University</a>
            <div class="navbar-right">    
                <a href="index.php" >Home</a>
                <a href="#teachers">Proferssors</a> 
                <a href="#courses">Courses</a> 
                <a href="#admission">Admission</a>
                <a href="login.php">Login</a>
            </div>
    </div>
    
    <div id="home">    
        <img class="main_img" src="images/black.jpg"> 
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome-img" src="images/sensei.jpeg">
                </div>
                <div class="col-md-8">
                    <h1>Welcome to Canor University</h1>
                    <p>"Please remember that there are times to take someone's hand and lead them along... But also times when you must be stern and let them fend for themselves." - Korosensei
                    "The name doesn't make the person. The name simply remains gently within the footprint left on the path a person walks." - Korosensei
                    "Take advantage of what you have, while you have it." - Korosensei
                    "Exams are an opportunity to teach correctly the meaning of winning and losing, of strong and weak. Students soak up heaping helpings of successes and setbacks. Take in now what it means to win, what it means to lose!" - Korosensei
                    "Honestly, there isn't much meaning to the splendid names given to you by your parents. What does have meaning, is what the person behind that name does during their actual lifetime." - Korosensei</p>
            </div>
        </div>
    </div><br><br><br>

    <center>
        <h1 id="teachers">Our Teachers</h1>
    <div class="container1">
        <div class="row">
            <?php 
                while($info=$result->fetch_assoc()){

            ?>
            <div class="col-md-4">
                <span class="circle-image"><img class="teacher" src="<?php echo"{$info['image']}" ?>"></span>
                    <h3><?php echo"{$info['name']}" ?></h3>  
                    <h5><?php echo"{$info['description']}" ?></h5>  
            </div>
            <?php }

            ?>
        </div>
    </div><br><br>
    <h1 id="courses">Our Courses</h1>
    <div class="container">
        <div class="row">
            <?php 
                while($info=$result1->fetch_assoc()){

            ?>
            <div class="col-md-4">
                <span class="welcome-img"><img class="courses" src="<?php echo"{$info['image']}" ?>"></span>
                    <h3><?php echo"{$info['courses']}" ?></h3>  
                    <h5><?php echo"{$info['details']}" ?></h5>  
            </div>
            <?php }

            ?>
        </div>
    </div><br><br>
   <h1 class="adm" id="admission">Admission Form</h1>
    <div class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="adm_int" >
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="adm_int">
                <label class="label_text" name="phonenumber">Cellphone</label>
                <input class="input_deg" type="text" name="phone">
            </div>

            <div class="adm_int"> 
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div><br>

            <div class="adm_int">
                <input class="btn btn-success" id="submit" type="submit" value="APPLY" name="apply">
            </div>
        </form>
    </div>
    </center>
    <script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "10px 10px";
            document.getElementById("logo").style.fontSize = "10px";
        } else{
            document.getElementById("navbar").style.padding = "10px 10px";
            document.getElementById("logo").style.fontSize = "10px";
            }   
        }
    </script>

    <footer>
        <p>&copy; Canor University 2024<br>
    </footer>
  
</body>
</html>