<?php

session_start();

//print_r($_POST);

$sent_user_id;
//putting userid entered into variable then senidng to a session variable.
foreach($_POST as $key => $sent_user_id) {
    //echo $sent_user_id;
}

//echo $sent_user_id;

$_SESSION['user_id'] = $sent_user_id;
//print_r($_SESSION);
?>


<!DOCTYPE html>
<!--Christopher Markham, Arturo Bramasco, & Kaleo C Chase
    System Implentation C451 Project
    Spring Semester, 2025-->
<html>
    <head>
        <meta " System Implentation C451 Project, HTML, PHP, JavaScript, SQL ">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="clicktostart.css" id="style">
    </head>
    <script type="text/javascript">
        
    </script>
    <body>
        <div id="Container">
            <div id = "intro_text">
            <h1>Please make a selection.</h1>
            </div>
            <div id="select_checking">
                    <a href="checking.html">
                        <button onClick="checking()" class="button">Withdraw Checking</button>
                    </a>
            </div>
            <div>
                <div id="select_savings">
                    <a href="savings.html">
                        <button onClick="savings()" class="button"> Withdraw Savings</button>
                    </a>
                </div>
            </div>
            <div id="select_view_account">
                    <a href="viewbalance.php">
                    <button onClick="vewbalance()" class="button">View Balance</button>
                </a>
            </div>
        </div>
    </body>
</html>

