<?php

session_start();

$user_id = $_SESSION['user_id'];

//print_r($_SESSION);

//connect to database
$conn = mysqli_connect('localhost', 'testuser', 'abc/123', 'atm machine');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//query users name to be shown on home page
$sql = "SELECT first_name FROM users WHERE user_id = $user_id";

$result = mysqli_query($conn, $sql);

//checking if query worked properly
if (!$result) {
    die("Query Error: " .mysqli_error($conn));
}

$first_names = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_R($first_names);

//pulling first name out of array
$first_name = $first_names[0]['first_name'];
//echo $first_name;

$sql = "SELECT last_name FROM users WHERE user_id = $user_id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Error: " .mysqli_error($conn));
}

$last_names = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_R($last_names);

//pulling last name out of array.
$last_name = $last_names[0]['last_name'];
//echo $last_name;
?>

<!DOCTYPE html>
<!--Christopher Markham, Arturo Bramasco, & Kaleo C Chase
    System Implentation C451 Project
    Spring Semester, 2025-->
<html>
    <head>
        <meta name="description" content="System Implementation C451 Project, HTML, PHP, Javascript, SQL">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="clicktostart.css" id="style">
    </head>
    <script type="text/javascript">
        
    </script>
    <body>
        <div id="Container">
            <div id = "intro_text">
            <h1>Welcome, <?php echo $first_name . ' ' . $last_name; ?>.</h1>
            <h2>Please make a selection.</h2>
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
            <div id="select_deposit">
                <a href="select_deposit_account.html">
                <button onClick="deposit()" class="button">Deposit Check</button>
            </div>
            <div id="select_view_account">
                    <a href="viewbalance.php">
                    <button onClick="vewbalance()" class="button">View Balance</button>
                </a>
            </div>
        </div>
    </body>
</html>

