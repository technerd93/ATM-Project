<?php

if (isset($_POST['send_user_id()']))
  {
  // Execute this code if the submit button is pressed.
  $formvalue = $_POST['user_id'];
  }

?>

<!DOCTYPE html>
<!--Christopher Markham, Arturo Bramasco, Kaleo C Chase
    System Implentation C451 Project
    Spring Semseter, 2025-->
    <html>
    <head>
        <meta " System Implementation, C451 Porject, HTML, PHP, Javascript, SQL ">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="other_amount.css" id="style"> 
    </head>
    <script type="text/javascript">

    </script>
    <body>
        <div id="Container">
            <div id="intro_text">
            <h1>Please enter your user ID.</h1>
            </div>
            <form action="ATM_home_page.php" method="POST">
                <input type="text" name="user_id">
                <a href="ATM_home.page.php">
                <button onClick="send_user_id()" class="button">Enter</button>
            </form>
        </div>
    </body>