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

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button2 {background-color: #008CBA;} 
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
    <h1>Delete Transaction : </h1>

    <form action="deletetransaction.php" method="POST">

        <b>Please Enter the Transaction Number to be Deleted : </b>

        <input type="text" name="transactionNum"required>
        <p>

            <input class="button" type="submit" value="Delete">

    </form>

    <p>
        <a href="main.php"> Home</a>

</body>
</html>

