<form action="index.php?action=Logging" method="post" style="margin-bottom: 5em;">
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" required="required"/>
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

<form action="index.php?action=Signing" method="post" style="margin-top: 5em" id="SignupForm">
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" required="required"/>
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
            <label for="name">Name: </label>
            <input type="text" name="name" required="required"  />
        </div>

        <div>
            <label for="description">Description: </label><br />
            <textarea form="SignupForm" name="description" required="required" placeholder="Enter description here..."></textarea>
        </div>
        
        <div>
            <input type="submit" value="Sign Up" />
        </div>
</form>