# Artisan-Trail
Web Programming class

Jean-Bryce Beirnaet && Simon Rosner
12/13/2017

Database Access:
    Due to difficulties in accessing the database we have opted to simulate all
    Up/Down activity through the use of php functions.

    These functions can be found in the dummyData.php file.
    We recommend that the next group to work on this project make functions
    which actually access their database using the same names and naming conventions
    as the dummy functions under the //STANDINS// section of dummyData.php

    The remaining functions in dummyData.php are meant to form the JSON objects which
    the documentation suggests the server has been designed to send and recieve.

    To reiterate: Our site uses fake JSON objects to simulate server interaction.
    The functions that make use of these objects must be replaced for actual functionality

    We also recommend that server access functions be kept in a single file which
    should be included in place of our inclusion of the dummyData.php file in Index.php

Contact form:
    The email form on the ContactUs.php page currently does not send emails
    In order to make the form work, a recieveing email address must be entered here:
        $email_to = "";
        in ContactUs.php
    Fill in the variable assignment with the desired recieveing email address
    
    The form action on the same page must also be directed towards a php function
    Which will send the email