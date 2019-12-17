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
            gettables.php
        </title>
        <div class="hero-image">
            <div class="hero-text">
                <h1 style="font-size:63px">Halifax Science Library</h1>
                <p>- Rajalakshmi, Mehar and Nikhil</p>
            </div>
        </div>
    </head>

    <body>
        <h1>Tables : </h1>
        <a href="main.php"> Home</a>
        <form action="printtable.php" method="POST">

            <?php
            function tablelist($table) {
                print "<table border=1>\n";
                while ($a_row = mysqli_fetch_row($table)) {
                    print "<tr>";
                    foreach ($a_row as $field) print "<td>$field</td>";
                    print "</tr>";
                }
                print "</table>";
            }
            require("dbguest.php");
            $link = mysqli_connect($host, $user, $pass);
            if (!$link) die("Couldn't connect to MySQL");
            mysqli_select_db($link, $db)
                or die("Couldn't open $db: ".mysqli_error($link));
            $result = mysqli_query($link, "show tables");
            if (!$result) print("ERROR: ".mysqli_error($link));
            else {
                $num_rows = mysqli_num_rows($result);
                print "\n\nThere are $num_rows tables in the Halifax Science Library Database\n<p>";
                tablelist($result);
            }
            mysqli_close($link);
            ?>

            <b>Enter the name of the table you want to print:</b>

            <input type="text" name="table" required>
            <p>

                <input class="button" type="submit" value="Submit">
        </form>



    </body>
</html>