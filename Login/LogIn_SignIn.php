<form action="index.php?action=Logging" method="post" style="margin-bottom: 5em;">
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username" required="required"/>
        </div>

        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" required="required" />
        </div>
        
        <div>
            <input type="submit" value="Log In" />
        </div>
</form>

<?php 
if(isset($myLoginMessageError))
{
    echo "<p>$myLoginMessageError</p>";
}
?>

<form action="index.php?action=Signing" method="post" style="margin-top: 5em">
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username" required="required"/>
        </div>

        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" required="required" />
        </div>
    
        <div>
            <label for="passwordBis">Repeat Password: </label>
            <input type="password" name="passwordBis" required="required" />
        </div>
        
        <div>
            <input type="submit" value="Sign In" />
        </div>
</form>