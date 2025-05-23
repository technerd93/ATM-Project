<?php

session_start();

$user_id = $_SESSION['user_id'];

$requestedAmount = 0;
//print_r($_POST);

//putting amount user entered into variable to remove from balance.
foreach($_POST as $key => $requestedAmount) {
   // echo $requestedAmount;
}

//connect to database
$conn = mysqli_connect('localhost', 'testuser' , 'abc/123', 'atm machine');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//updates account wuth user entered amount
function balance_update($conn, $user_id, $requestedAmount) {

    //query to withdarw user entered amount dollars
    $sql = "SELECT balance FROM accounts WHERE user_id = $user_id AND account_type = 'Checking'";
    
    $result = mysqli_query($conn, $sql);
    
    // Check if user/account exists
    if (mysqli_num_rows($result) === 0) {
        //echo "Invalid user ID or account not found.";
    
        //redirects user after a short delay to show there user id is not valid. 
        header("Location: invalid_deposit_account_savings.html");
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
        foreach($balance[$i] as $key => $oldBalance) {
            //echo $key. " : " . $value . "<br>";
        }
       // echo "<br>";
        //echo $oldBalance;
    }
    
    //subtracing account from balance
    $updatedBalance = (int)$oldBalance + (int)$requestedAmount;
    //echo "<br>";
    //echo $updatedBalance;
    
    //updatding database wiht new balance
    $sql = "UPDATE accounts SET balance = '$updatedBalance' WHERE user_ID = $user_id AND account_type = 'Checking'";
    
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

balance_update($conn, $user_id,$requestedAmount);
$transaction_id = getID();
//echo getID();
$atm = getATM();
//echo getATM();
$account_id = get_account_id($conn, $user_id);

//inserting transaction into transaction database table
$sql = "INSERT INTO transactions (transaction_id, account_id, atm_id, transaction_type, amount, transaction_date, status, user_id) 
VALUES ('$transaction_id', '$account_id', '$atm', 'Deposit', '$requestedAmount', NOW(), 'completed', '$user_id')";

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
    // Redirecting user after 10 Seconds to start page.
    setTimeout(function() {
        window.location.href = "ATM_System.html";
    }, 10000);
    </script>
    <body>
        <div id="Container">
            <div id = "intro_text">
            <h1>Your Check for $<?php echo $requestedAmount?> has been deposited.</h1>
            <br>
            <h2>Funds may not be available right away.</h2>
            </div>
        </div>
    </body>
</html>