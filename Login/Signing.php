<!-- Basic sign up activity, we check if the data are in the $_POST, then we check if the if the datas are good, otherwise we go back to the log in/up page and we set the  $myLoginMessageError variable !-->
<?php
//all the variable exist ?
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordBis']) && isset($_POST['name']) && isset($_POST['description']))
{
    //are they null ?
    if($_POST['name']!="" && $_POST['description']!="")
    {
        //the two password are the same ?
        if($_POST['password']===$_POST['passwordBis'])
        {
            //does the username already exist ?
            if(CheckIfUsernameNotExist($_POST['email']))
            {
                //does the password has got at least 8 characters ?
                if(strlen($_POST['password'])>=8)
                {
                    $myLoginPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $myLoginId = CreateNewUser($_POST['email'], $myLoginPassword, $_POST['name'], $_POST['description']);
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
                $myLoginMessageError="The email already exist.";
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
        $myLoginMessageError="the name field and description are required !";
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