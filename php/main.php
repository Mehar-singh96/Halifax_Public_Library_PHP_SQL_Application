
<html>
    <style>
        body {
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg-UMVjD-BznsrxIkBxCApE0FVbD0t1lrr--4lSMsZFTcF1BaO&s");
            background-size:100% 100%;
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://www.ellisdon.com/wp-content/uploads/2016/03/homepage_header@2x-11.jpg");
            height: 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .hero-text button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 10px 25px;
            color: black;
            background-color: #ddd;
            text-align: center;
            cursor: pointer;
        }

        .hero-text button:hover {
            background-color: #555;
            color: white;
        }
    </style>
    <head>
        <title>
            main.php
        </title>
        <div class="hero-image">
            <div class="hero-text">
                <h1 style="font-size:63px">Halifax Science Library</h1>
                <p>- Rajalakshmi, Mehar and Nikhil</p>
            </div>
        </div>
    </head>


    <body>
        <div class="content">
            <h1>
                Please choose the action to be performed
                <p>
                    1. <a href="gettablename.php"> Show Table</a> <p>
                2. <a href="addcustomer.php"> Add New Customer</a><p>
                3. <a href="addarticle.php"> Add New Article</a> <p>
                4. <a href="addtransaction.php"> Add New Transaction</a><p>	
                5. <a href="getdeltransaction.php"> Cancel Transaction</a><p>
                </div>
            </body>
        </html>