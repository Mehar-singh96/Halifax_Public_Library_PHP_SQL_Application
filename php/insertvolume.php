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
            insertvolume.php
        </title>
    </head>
    <body>
        <div class="hero-image">
            <div class="hero-text">
                <h1 style="font-size:33px">Halifax Public Library</h1>
                <p>- Rajalakshmi, Mehar and Nikhil</p>
            </div>
        </div>
        <div class="content">



            <?php
            $mag_id = $_POST['mag_id'];
            $mag_vol =$_POST['mag_vol'];
            $pub_year =$_POST['pub_year'];

            require("dbguest.php");
            $link = mysqli_connect($host, $user, $pass);
            if (!$link) die("Couldn't connect to MySQL");
            mysqli_select_db($link, $db)
                or die("Couldn't open $db: ".mysqli_error($link));

            $flagm = false;
            $sqlMagId = "SELECT _id FROM MAGAZINE WHERE _id = '$mag_id'";
            $resultMagId = mysqli_query($link,$sqlMagId);
            while ($rowm = mysqli_fetch_assoc($resultMagId)) {
                $flagm = true;
                $sqlInsertVol = "INSERT into VOLUMES(vol_no,publication_yr,mag_id) VALUES('{$mag_vol}','{$pub_year}','{$mag_id}')";
                $resultVolInsert = mysqli_query($link,$sqlInsertVol);
                if(!$resultVolInsert){
                    echo "insertion into Volume  table not done";
                }
                else  echo "insertion into Volume table  done";
            }
            if ($flagm == false){
                echo "Insertion of Volume cannot be done since Magazine does'nt exist. Click the link to enter Magzine details";

            }

            mysqli_close($link);
            ?>

            <br><br><a href="main.php">Home</a>

        </div>
    </body>
</html>