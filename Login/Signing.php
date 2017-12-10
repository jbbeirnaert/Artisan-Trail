<?php
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordBis']))
{

    if($_POST['password']===$_POST['passwordBis'])
    {
        if(CheckIfUsernameNotExist($_POST['username']))
        {
            if(strlen($_POST['password'])>=8)
            {
                $myLoginPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $myLoginId = CreateNewUser($_POST['username'], $myLoginPassword);
                if($myLoginId!=-1)
                {
                    $_SESSION['id']=$myLoginId;
                    include("Headers/HeaderHome.php");
                    include("Home/HomePage.php");
                }
                else
                {
                    $myLoginMessageError="Failed to insert the new user in our dataBase !";
                    include("Headers/HeaderLogIn_SignIn.php");
                    include("Login/LogIn_SignIn.php");
                }
            }
            else
            {
                $myLoginMessageError="The password have to be at leat 8 characters !";
                include("Headers/HeaderLogIn_SignIn.php");
                include("Login/LogIn_SignIn.php");
            }
        }else
        {
            $myLoginMessageError="The username already exist.";
            include("Headers/HeaderLogIn_SignIn.php");
            include("Login/LogIn_SignIn.php");
        }
    }
    else
    {
        $myLoginMessageError="The passwords are differents !";
        include("Headers/HeaderLogIn_SignIn.php");
        include("Login/LogIn_SignIn.php");
    }
    
}
else
{
    $myLoginMessageError="Error ...";
    include("Headers/HeaderLogIn_SignIn.php");
    include("Login/LogIn_SignIn.php");
}


?>