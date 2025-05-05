<?php

session_start();

//connecting to batabase
$conn = mysqli_connect('localhost', 'testuser', 'abc/123', 'atm machine');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//putting userid entered into variable then senidng to a session variable.
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    //checking if user does exsist in the database
    $sql = "SELECT *FROM users WHERE user_id = $user_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // if user id is in database, adding to session variable
        $_SESSION['user_id'] = $user_id;
          
    } else {
        //no user found redirect to invalid user page and redirects to atm welcome page
        header('Location: invalid_user_id.html');
        exit();
    }
    //echo $user_id;  
    
} elseif (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}else {
    header('Location: ATM_home_page.php');
    exit();
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
        <link rel="stylesheet" type="text/css" href="withdraw.css" id="style"> 
    </head>
    <script>
    // Wait 5 seconds to redirect to atm home page
    setTimeout(function() {
        window.location.href = "ATM_home_page.php";
    }, 5000);
    </script>
    <body>
        <div id="Container">
            <div id="intro_text">
            <h1>Logging in, Please wait.</h1>
            </div>
            <div class="loader"></div>
        </div>
    </body>
</html>