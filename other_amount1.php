<?php

$requestedAmount;
//print_r($_POST);

//putting amount user entered into variable to remote from balance.
foreach($_POST as $key => $requestedAmount) {
   // echo $requestedAmount;
}

//connect to database
$conn = mysqli_connect('localhost', 'testuser' , 'abc/123', 'atm machine');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//query to withdarw 20 dollars
$sql = 'SELECT balance FROM accounts WHERE user_id = 1234';

$result = mysqli_query($conn, $sql);

$balance = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($balance);

//removing balance from nested array
$newBalance;
for($i=0; $i<count($balance); $i++) {
    foreach($balance[$i] as $key => $newBalance) {
        //echo $key. " : " . $value . "<br>";
    }
   // echo "<br>";
    //echo $newBalance;
}

//subtracing $20 from balance
$updatedBalance = $newBalance - $requestedAmount;
//echo "<br>";
//echo $updatedBalance;

//updatding database wiht new balance
$sql = "UPDATE accounts SET balance = '$updatedBalance' WHERE user_ID = 1234";

if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
  } else {
    //echo "Error updating record: " . $conn->error;
  }

// freeing up used memory
mysqli_free_result($result);
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
        <meta " System Implementation, C451 Porject, HTML, PHP, Javascript, SQL ">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="withdraw.css" id="style"> 
    </head>
    <script type="text/javascript">

    </script>
    <body>
        <div id="Container">
            <div id = "intro_text">
            <h1>Please take your cash.</h1>
            </div>
        </div>
    </body>