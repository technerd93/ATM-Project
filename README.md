Christopher Markham
Arturo Bramasco
Kaleo C Chase

AtmHomepage: Explanation
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
            <h1>Please make a selection.</h1> //You will need to make a selection of what is shown: Withdraw checking, Withdraw Savings, and View Balance
            </div>
            <div id="select_checking">
                    <a href="checking.html">
                        <button onClick="checking()" class="button">Withdraw Checking</button> //One of the choices
                    </a>
            </div>
            <div>
                <div id="select_savings">
                    <a href="savings.html">
                        <button onClick="savings()" class="button"> Withdraw Savings</button> //One of the Choices
                    </a>
                </div>
            </div>
            <div id="select_view_account">
                <a href="viewbalance.html">
                    <button onClick="vewbalance.html()" class="button">View Balance</button> //One of the choices
                </a>
            </div> // the buttons have 'onClick' so it can activate the button to be clicked on
        </div>
    </body>
</html>

ATM System: 
<html>
<head>
    <meta " Christopher Markham, System Implentation C451 Project, HTML, PHP, JavaScript, SQL ">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="clicktostart.css" id="style">
</head>
<script type="text/javascript">
    
</script>
<body>
    <div id="Container">
        <div id="click_to_start"> // This is the area where the user will click on the button to get started with the atm system
            <h2>Welcome to the ATM.  Please click below to start.</h2>
            <a href="ATM_home_page.html">
                <button onclick="Start()" class="button">Click to Start</button> //This is what makes the button
            </a>
        </div>
    </div>
</body>
</html>

Checking: 
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
            <div id="Container">
                <div id = "intro_text">
                <h1>Please make a selection.</h1>
                </div>
                <div id="select_20">              // the area of selecting 20 dollars or 50 dollars will activate the sql code to change what the final amount is.
                    <a href="quick_cash_20.php">  // This is different from select 'other amount'
                            <button onClick="quick_cash_20()" class="button">Quick Cash $20</button>
                        </a>
                </div>
                <div>
                    <div id="select_50">
                        <a href="quick_cash_50.php">
                            <button onClick="quick_cash_50()" class="button"> Quick Cash $50</button>
                        </a>
                    </div>
                </div>
                <div id="select_other">         // once selecting other has been clicked, it will navigate to a different page once we have finished all the coding.
                    <a href="other_amount.php">
                        <button onClick="other_amount()" class="button">Other Amount</button> 
                    </a>
                </div>
            </div>
        </div>
    </body>

Click to start:
#Container // this area edits the page of where you would see "Click to Start". The green and white background is activated here.
{
height: 900px;
width: 900px;
background-color: #2e2d2d17;
}

#click_to_start
{
position: absolute;
top: 35%;
left: 9%;
text-align: center;
}

.button
{
background-color: #4ba853;
color: white;
border: none;
padding: 20px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 75px;
margin: 0 auto;
cursor: pointer;
}

#intro_text
{
height: 75px;
width: 900px;
text-align: center;
padding: 30px 0;
}

#select_checking
{
position: absolute;
top: 50px;
top: 20%;
left: 5%;
}

#select_savings
{
position: absolute;
top: 50px;
top: 40%;
left: 6%;
}

#select_view_account
{
position: absolute;
top: 50px;
top: 60%;
left: 10%;
}

.h1
{
text-align: center;
}

Sql code:
  Users:
CREATE TABLE Users (                         // This first part to create the tables creates the coloumns of what will be collected and eliminated. This will allow for the user name and info to show here.
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone_number VARCHAR(15),
    pin_number CHAR(4) NOT NULL,
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
 
INSERT INTO Users (user_id, first_name, last_name, email, phone_number, pin_number, created_date)    // This part is the user information of everything that will be collected.
VALUES 
    (1234, 'LeBron', 'James', 'lebronjames@gmail.com', '3171112222', '1111', '2025-03-12 21:31:10'),
    (5678, 'Stephen', 'Curry', 'stephencurry@gmail.com', '3174445555', '2222', '2025-03-12 21:31:10'),
    (9101, 'Michael', 'Jordan', 'michaeljordan@gmail.com', '3178886666', '3333', '2025-03-12 21:31:10');

  Transactions:
CREATE TABLE Transactions (                         //This area is the queries to collect the user information of what amount they have, amount withdrawn and other important information that connects to the user.
    transaction_id INT PRIMARY KEY AUTO_INCREMENT,
    account_id INT,
    atm_id VARCHAR(10),
    transaction_type VARCHAR(20) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    transaction_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'completed',
    FOREIGN KEY (account_id) REFERENCES Accounts(account_id)
);
 
INSERT INTO Transactions (transaction_id, account_id, atm_id, transaction_type, amount, transaction_date, status)  // This area is the inserted user information.
VALUES 
    (11, 1, 'ATM1', 'Withdrawal', 200.00, '2025-03-12 14:30:00', 'completed')
    (22, 2, 'ATM2', 'Withdrawal', 200.00, '2025-03-12 14:30:00', 'completed'),
    (33, 3, 'ATM3', 'Withdrawal', 200.00, '2025-03-12 14:30:00', 'completed');

  Accounts: 
CREATE TABLE Accounts (                              // This area is the account information that the user is connected to.
    account_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    account_number VARCHAR(20) UNIQUE NOT NULL,
    account_type VARCHAR(20) NOT NULL,
    balance DECIMAL(10,2) DEFAULT 0.00,
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
 
INSERT INTO Accounts (account_id, user_id, account_number, account_type, balance, created_date)    // This is the information what the amount the user has and the account type that they have.
VALUES 
    (1, 1234, 'HTML123', 'Checking', 1000.00, '2025-03-12 14:30:00'),
    (2, 5678, 'HTML456', 'Savings', 1000.00, '2025-03-12 14:30:00'),
    (3, 9101, 'HTML789', 'Savings', 1000.00, '2025-03-12 14:30:00');   
