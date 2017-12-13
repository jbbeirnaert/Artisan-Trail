<?php

//it return the username/email from your id
function GetUserNameFromId($myId)
{
	$tempInfo = json_decode(getPrivateMemberInfo($myId));

    if($tempInfo->memberid==42)
    {
        return "admin";
    }
    elseif ($tempInfo->memberid==43)
    {
        return "newUser";
    }
    else
    {
        return "Guest";
    }
}

//Database cannot currentyl do this
function userLoginById($userName, $password)
{
	if($userName=="admin" && $password=="admin")
	{
		return 42;
	}
	else
	{
		return -1;
	}
}

//Database cannot currentyl do this
function CheckIfUsernameNotExist($userName)
{
	if($userName=="admin")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function CreateNewUser($userName, $passwordAlreadyHashed, $name, $description)
{
	$tempInfo = json_decode(createNewMember($userName, $passwordAlreadyHashed, $name, $description));

	if(true)
	{
		return 43;
	}
	else
	{
		return -1;
	}
}

?>