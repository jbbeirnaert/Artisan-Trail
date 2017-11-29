<?php

function GetUserNameFromId($myId)
{
	if($myId==42)
	{
		return "admin";
	}
	elseif ($myId==43)
	{
		return "newUser";
	}
	else
	{
		return "Guest";
	}
}

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

function CreateNewUser($userName, $passwordAlreadyHashed)
{
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