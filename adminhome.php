<?php
    session_start();
    
    if(!isset($_SESSION['username'])){
     header("Location:login.php");
    }elseif($_SESSION['usertype']=='student'){
        header("Location:login.php");
    }

   







    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
    <div id="home">    
        
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome-img" src="images/classroom.jpe">
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
    </div>
</script>

</body>
</html>