<p>
    Do you have any questions, concerns, or suggestions? We'd love to hear from you!
</p>
<form name="contactform" method="post" action="#">
  <label for="name">Name:</label>
  <input  type="text" name="name" maxlength="50" size="30" required="true">
  <br/>
  <label for="email">Email Address:</label>
  <input  type="email" name="email" maxlength="80" size="30" required="true">
  <br/>
  <label for="telephone">Telephone Number:</label>
  <input  type="number" name="telephone" maxlength="30" size="30">
  <br/>
  <label for="comments">Your message:</label>
  <br/>
  <textarea  name="comments" maxlength="1000" cols="25" rows="6" required="true"></textarea>
  <br/>
  <input type="submit" value="Submit"> 
</form>

<?php

//php courtesy of
//http://www.freecontactform.com/email_form.php

if(isset($_POST['email'])) {
 
    $email_to = "";
    $email_subject = "Artisan Trail Comment";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 <p>Your message has been sent!</p>
 
<?php
 
}
?>