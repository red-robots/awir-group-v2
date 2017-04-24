<?php
            if (isset($_POST['submit']))
              {
              // Execute this code if the submit button is pressed.
              $formvalue = $_POST['email_name'];
              }
            ?>
<form action="<?php bloginfo('url'); ?>?email=<?php echo $_GET['Email']; ?>" method="_GET">
    <div id="websignupform">
        <input type="text" id="newsletters" name="Email"></input>
        <input type="submit" id="go" name="submit" value="Subscribe">
        
    </div>
</form>