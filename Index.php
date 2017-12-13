

<!-- This is the main page, it redirects to every page in function of the $_GET['action'] variable ! With this way, the user has to go to this page to get the database connection, if he directly goes to /Events/Event.php, it can not interact with the server because he doesn't have the database connection. -->

<?php

//we start our session
session_start();

?>
<!doctype html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Artisan Trail</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

    
    
<body>

    <?php
    include("DataBase/DataBaseConnection.php");
    include("DataBase/DataBaseFunction.php");
    include("dummyData.php");

    //because of the session and to have a better understand of the project/code it is easier to create a website with a index, we use the GET variables to know which page include !
    //if the user is already connected we include the second index (listMachines/index.php), if he wanna logout, we destroy the session.
    

//Here, it is when the user is logged in !
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

                case "Events":
                    include("Headers/HeaderEvents.php");
                    include("Events/Events.php");
                    break;

                case "Event":
                    include("Headers/HeaderEvents.php");
                    include('Events/Event.php');
                    break;
                    
                case "Person":
                    include("Headers/HeaderEvents.php");
                    include('People/Person.php');
                    break;

                case "AboutUs":
                    include("Headers/HeaderAboutUs.php");
                    include("AboutUs.php");
                    break;
                    
                case "ContactUs":
                    include("Headers/HeaderContactUs.php");
                    include("ContactUs.php");
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
        //Here, it is when the user is NOT logged in !
        if(isset($_GET['action'])) //depending of the $_GET['action'] we include a different file.
        {
            switch ($_GET['action'])
            {
                case "LogIn_SignIn":
                    include("Headers/HeaderLogIn_SignIn.php");
                    include("Login/LogIn_SignIn.php");
                    break;

                case "Logging":
                    include("Login/Logging.php");
                    break;

                case "Signing":                    
                    include("Login/Signing.php");
                    break;

                case "Events":
                    include("Headers/HeaderEvents.php");
                    include("Events/Events.php");
                    break;

                case "Event":
                    include("Headers/HeaderEvents.php");
                    include('Events/Event.php');
                    break;
                    
                case "Person":
                    include("Headers/HeaderEvents.php");
                    include('People/Person.php');
                    break;

                case "AboutUs":
                    include("Headers/HeaderAboutUs.php");
                    include("AboutUs.php");
                    break;
                    
                case "ContactUs":
                    include("Headers/HeaderContactUs.php");
                    include("ContactUs.php");
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
    
    

</body>
</html>