<?php

session_start();

$user_id = $_SESSION['user_id'];

//connect to database
$conn = mysqli_connect('localhost', 'testuser' , 'abc/123', 'atm machine');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//query to check checking account balance
$sql = "SELECT balance FROM accounts WHERE user_id = $user_id AND account_type = 'Checking'";

$result = mysqli_query($conn, $sql);

// Check if user/account exists

$balance = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($balance);

//removing balance from nested array
$checkingBalance;
for($i=0; $i<count($balance); $i++) {
    foreach($balance[$i] as $key => $checkingBalance) {
        //echo $key. " : " . $value . "<br>";
    }
   // echo "<br>";
    //echo $checkingBalance;
}

if (!isset($checkingBalance)) {
    $checkingBalance = 0;
}

//checking to make sure checking balance is zero if user does not have a checking account
//echo $checkingBalance;

//query to check savings account balance
$sql = "SELECT balance FROM accounts WHERE user_id = $user_id AND account_type = 'Savings'";

$result = mysqli_query($conn, $sql);

$balance = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($balance);

//removing balance from nested array
$savigsBalance;
for($i=0; $i<count($balance); $i++) {
    foreach($balance[$i] as $key => $savingsBalance) {
        //echo $key. " : " . $value . "<br>";
    }
   // echo "<br>";
    //echo $savingsBalance;
}

if (!isset($savingsBalance)) {
    $savingsBalance = 0;
}

//checking to make sure savings balance is zero if user does not have a savings account
//echo $savingsBalance;

// freeing up used memory
mysqli_free_result($result);
// closing connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<!--Christopher Markham, Arturo Bramasco, Kaleo C Chase
    System Implentation C451 Project
    Spring Semseter, 2025-->
<html>
    <head>
        <meta " System Implementation, C451 Porject, HTML, PHP, Javascript, SQL ">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="withdraw.css" id="style"> 
    </head>
    <script>
    // Redirecting user after 10 Seconds to start page if they do not click New Transcation button.
    setTimeout(function() {
        window.location.href = "ATM_home_page.php";
    }, 10000);
    </script>
    <body>
        <div id="Container">
            <div id = "intro_text">
            <h1>Account Balances</h1>
            <h1>Checking: $<?php echo $checkingBalance;?></h1>
            <h1>Savings: $<?php echo $savingsBalance;?></h1>
            </div>
        </div>
    </body>