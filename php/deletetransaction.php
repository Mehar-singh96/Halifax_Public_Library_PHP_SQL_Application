<html>
    <head>
        <title>deletetransaction.php</title>
    </head>
    <body>
        <p>
            <a href="getdeltransaction.php"> Back </a><br>
            <a href="main.php"> Home</a>

            <?php
            //It will get value of table which is passed in the textbox 
            $transactionNum= $_POST["transactionNum"];
            require("dbguest.php");
            $link = mysqli_connect($host, $user, $pass);
            if (!$link) 
                die("Couldn't connect to MySQL");
            mysqli_select_db($link, $db)
                or die("Couldn't open $db: ".mysqli_error($link));
            $check = mysqli_query($link, "select DATE_FORMAT(trans_date, '%Y%m%d'), DATE_FORMAT(NOW(), '%Y%m%d') from TRANSACTIONS where trans_no = '$transactionNum'");
            if (mysqli_num_rows($check) > 0)
            {
                $current = mysqli_fetch_row($check);
                $days = (int)$current[1] - (int)$current[0];
                if ($days <= 30)
                {

                    $deletefromTransItems = mysqli_query($link,"delete from ITEM_TRANSACTION where trans_no = '$transactionNum'"); // to be verified
                    if ($deletefromTransItems)
                        echo 'Record deleted from Transaction Item';
                    $deletefromTransaction = mysqli_query($link,"delete from TRANSACTIONS where trans_no = $transactionNum");
                    if($deletefromTransaction)
                        echo 'Deleted from Transaction';
                }
            }
            else
            {
                echo 'The transaction does not exist or must be more than 30 days old';
            }
            mysqli_close($link);
            ?>



    </body>
</html>

