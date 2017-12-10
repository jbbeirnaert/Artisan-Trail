<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
    $myLoginId=userLoginById($_POST['username'], $_POST['password']);
    if($myLoginId!=-1)
    {
        $_SESSION['id']=$myLoginId;
        include("Headers/HeaderHome.php");
        include("Home/HomePage.php");
    }else
    {
        $myLoginMessageError="Failed to Log in. Try again !";
        include("Headers/HeaderLogIn_SignIn.php");
        include("Login/LogIn_SignIn.php");
    }
    
}else{
    $myLoginMessageError="Error ...";
    include("Headers/HeaderLogIn_SignIn.php");
    include("Login/LogIn_SignIn.php");
}

?>

