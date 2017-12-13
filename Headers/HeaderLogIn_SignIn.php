<header style="margin-bottom: 5em;"> <!--The header is a template from bootstrap !-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?action=none">Artisan Trail</a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="?action=none">Home</a></li>
                    <li><a href="?action=Events">Events</a></li>
                    <li><a href="?action=AboutUs">About Us</a></li>
                    <li><a href="?action=ContactUs">Contact</a></li>
                    <li class="active dropdown">
                        <?php
                        if(isset($_SESSION['id']))
                        {
                            $HeaderName=GetUserNameFromId($_SESSION['id']);
                            $HeaderAction='"?action=LogOut"';
                            $HeaderActionString="LogOut";

                        }
                        else
                        {
                           $HeaderName="Guest";
                           $HeaderAction='"?action=LogIn_SignIn"';
                           $HeaderActionString="LogIn-SignIn";
                        }
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo($HeaderName) ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">                            
                        <li><a href=<?php echo($HeaderAction) ?>><?php echo($HeaderActionString) ?></a></li>
                        </ul>
                    </li>                      
                </ul>
            </div>
        </div>
    </div>
</header>