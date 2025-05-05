<?php

// checks if post is set
if (isset($_POST['send_user_id()']))
  {
  //adds user entered number to user_id
  $formvalue = $_POST['user_id'];
  }

?>

<!DOCTYPE html>
<!--Christopher Markham, Arturo Bramasco, Kaleo C Chase
    System Implentation C451 Project
    Spring Semseter, 2025-->
<html>
    <head>
        <meta name="description" content="System Implementation C451 Project, HTML, PHP, Javascript, SQL">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="other_amount.css" id="style"> 
    </head>
    <body>
        <div id="Container">
            <div id="intro_text">
            <h1>Please enter your user ID.</h1>
            </div>
            <form action="login.php" method="POST">
                <input type="text" name="user_id" minlength="4" maxlength="4" required>
                <a href="login.php">
                <button onClick="send_user_id()" class="button">Enter</button>
            </form>
        </div>
    </body>
</html>