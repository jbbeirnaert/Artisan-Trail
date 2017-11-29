<?php

//we start our session
session_start();
/*include("functionSql.php");
$myDbConnection = myGetConnectionDB();
//check our data connection !
if($myDbConnection==null)
    {
        die("Connection failed: " . $conn->connect_error);
    }*/
?>
<!doctype html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Artisan Trail</title>
</head>

    
    
<body>

    <?php
    include("DataBase/DataBaseConnection.php");
    include("DataBase/DataBaseFunction.php");
    //because of the session and to have a better understand of the project/code it is easier to create a website with a index, we use the GET variables to know which page include !
    //if the user is already connected we include the second index (listMachines/index.php), if he wanna logout, we destroy the session.
    if(isset($_SESSION['id']))
    {
        if(isset($_GET['action'])) //depending of the $_GET['action'] we include a different file.
        {
            switch ($_GET['action'])
            {
                case "LogOut":
                    session_unset();
                    session_destroy();
                    include("Headers/HeaderHome.php");
                    include("Home/HomePage.php");
                    break;

                default:
                    include("Headers/HeaderHome.php");
                    include("Home/HomePage.php");
                    break;
            }
        }
        else
        {
            include("Headers/HeaderHome.php");
            include("Home/HomePage.php");
        }
    }else
    {
        if(isset($_GET['action'])) //depending of the $_GET['action'] we include a different file.
        {
            switch ($_GET['action'])
            {
                case "LogIn_SignIn":
                    include("Headers/HeaderHome.php");
                    include("Login/LogIn_SignIn.php");
                    break;

                case "Logging":
                    include("Headers/HeaderHome.php");
                    include("Login/Logging.php");
                    break;

                case "Signing":
                    include("Headers/HeaderHome.php");
                    include("Login/Signing.php");
                    break;

                default:
                    include("Headers/HeaderHome.php");
                    include("Home/HomePage.php");
                    break;
            }
        }
        else
        {
            include("Headers/HeaderHome.php");
            include("Home/HomePage.php");
        }
    }
    
    
    ?>
    
    
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>