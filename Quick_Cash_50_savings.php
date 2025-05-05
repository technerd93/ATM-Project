<?php

session_start();

$user_id = $_SESSION['user_id'];

//connect to database
$conn = mysqli_connect('localhost', 'testuser', 'abc/123', 'atm machine');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//function withdraws $50 from account and updates account
function balance_update($conn, $user_id) {

//query to withdarw 20 dollars
$sql = "SELECT balance FROM accounts WHERE user_id = $user_id AND account_type = 'Savings'";

$result = mysqli_query($conn, $sql);

// Check if user/account exists
if (mysqli_num_rows($result) === 0) {
    //echo "Invalid user ID. Please enter a valid ID.";

    //redirects user after a short delay to show there user id is not valid. 
    header("Location: invalid_withdrawal_account_savings.html");
    mysqli_close($conn);
    exit;
}

if (!$result) {
    echo "Query error: " . mysqli_error($conn);
    exit;
}

$balance = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($balance);

//removing balance from nested array
for($i=0; $i<count($balance); $i++) {
    foreach($balance[$i] as $key => $newBalance) {
        //echo $key. " : " . $value . "<br>";
    }
   // echo "<br>";
    //echo $newBalance;
}

//subtracing $50 from balance
$updatedBalance = $newBalance - 50;
//echo "<br>";
//echo $updatedBalance;

//updatding database wiht new balance
$sql = "UPDATE accounts SET balance = '$updatedBalance' WHERE user_ID = $user_id AND account_type = 'Savings'";

if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
  } else {
    //echo "Error updating record: " . $conn->error;
  }

// freeing up used memory
mysqli_free_result($result);

}

//gets account ID from accounts table to use in transaction table
function get_account_id($conn, $user_id) {

    //getting account id from accounts table
    $sql = "SELECT account_id FROM accounts WHERE user_id = $user_id";
    
    $result = mysqli_query($conn, $sql);
    
    $account_id = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    //pulling user id out of array to add to transaction history
        for($i=0; $i<count($account_id); $i++) {
            foreach($account_id[$i] as $key => $user_account_id) {
                //echo $user_account_id;
            }           
        }
        return $user_account_id;
    }

// rand functions to randomly select atm and transation id
function getATM() {
    $atm = ['ATM1', 'ATM2', 'ATM3'];
    return $atm[array_rand($atm)];
}

//generates id for transaction history
function getID() {
    $id = rand(10000, 99999);
    return $id;
}

balance_update($conn, $user_id);
$transaction_id = getID();
//echo getID();
$atm = getATM();
//echo getATM();
$account_id = get_account_id($conn, $user_id); 

//inserting transaction into transaction database table
$sql = "INSERT INTO transactions (transaction_id, account_id, atm_id, transaction_type, amount, transaction_date, status, user_id) 
VALUES ('$transaction_id', '$account_id', '$atm', 'Withdrawal', '50', NOW(), 'completed', '$user_id')";

//checking if data went in properly
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

// closing connection
mysqli_close($conn);

//print_r($balance);

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
    // Redirecting user after 10 Seconds to start page if they do not click New Transcation button.
    setTimeout(function() {
        window.location.href = "ATM_System.html";
    }, 10000);
    </script>
    <body>
        <div id="Container">
            <div id = "intro_text">
            <h1>Please take your cash.</h1>
            </div>
        </div>
    </body>
</html>