<?php

if (isset($_POST['depoist_amount()']))
  {
  // Execute this code if the submit button is pressed.
  $formvalue = $_POST['requestedAmount'];
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
            <h1>Please enter the amount you wish to Deposit.</h1>
            </div>
            <form action="deposit_savings.php" method="POST">
                <input type="text" name="requestedAmount">
                <a href="deposit.php">
                <button onClick="depoist_amount()" class="button">Enter</button>
            </form>
        </div>
    </body>
</html>