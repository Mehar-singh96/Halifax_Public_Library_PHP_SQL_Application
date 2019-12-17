<html>
    <head><title></title></head>
    <body>


        <?php
        require("dbguest.php");
        $link = mysqli_connect($host, $user, $pass);
        if (!$link) die("Couldn't connect to MySQL");
        mysqli_select_db($link, $db)
            or die("Couldn't open $db: ".mysqli_error($link));
        $itemid = $_POST['itemid'];
        $quantity = $_POST['quantity'];
        $cid = $_POST['cid'];
        $transactionNumber=$_POST['transId'];
        $itemids = explode(",", $itemid);
        $quantities = explode(",", $quantity);
        $chck = True;
        for ($i =0; $i<count($itemids);$i++)
        {
            $itemidInside = $itemids[$i];
            $checkItems = "SELECT * FROM ITEM WHERE _id = '".$itemidInside."'";
            $run_check = mysqli_query($link, $checkItems);
            if (!mysqli_num_rows($run_check)) {
                $chck = False;

            }
        }
        if (count($itemids)!= count($quantities))
        {
            echo "<br>";
            echo " Number of Items and Prices Do Not Match, Try Again.";
            $chck = False;
        }
        echo "<br> Customer ID: ";
        echo $cid;
        echo "<br>";
        function discountCode($cid, $link){
            $discountCodeQuery = "SELECT SUM(trans_price) AS totalpurchaseprice FROM TRANSACTIONS WHERE cid = '{$cid}' AND trans_date > DATE_SUB(NOW(),INTERVAL 5 YEAR)";
            $discountCodeExecution = mysqli_query($link, $discountCodeQuery);
            $row = mysqli_fetch_assoc($discountCodeExecution);
            $sum = $row['totalpurchaseprice'];
            global $discountcode;
            if($sum){
                if($sum > 500){
                    $discountcode = 5;
                } else if($sum > 400 && $sum <= 500){
                    $discountcode = 4;
                } else if($sum > 300 && $sum <= 400){
                    $discountcode = 3;
                } else if($sum > 200 && $sum <= 300){
                    $discountcode = 2;
                } else if($sum > 100 && $sum <= 200){
                    $discountcode = 1;
                }
            } else{
                $sum = 0;
                $discountcode = 0;

            }
        }

        if ($chck == True){
            discountCode($cid, $link);
            $total = 0;
            for ($i =0; $i<count($itemids);$i++)
            {
                $priceQuery = "SELECT price FROM ITEM where _id = '".$itemids[$i]."'";
                $runpriceQuery = mysqli_query($link, $priceQuery);
                while ($row = mysqli_fetch_row($runpriceQuery)){
                    $priceEachItem = $quantities[$i] * $row[0];
                    $total += $priceEachItem;
                }
            }
            //$transactionNumber = mysqli_insert_id($link);
            $total_price = $total*(1-2.5*$discountcode/100);
            $sqlInsertTransaction = "INSERT into TRANSACTIONS(trans_no,cid,trans_date,trans_price) VALUES('$transactionNumber','$cid',now(),'$total_price')";
            $resultTransactionInsert = mysqli_query($link, $sqlInsertTransaction);
            //Getting Current Transaction Number
            //$transactionNumber = mysqli_insert_id($link);
            echo " <br> Transaction Number : ";
            echo $transactionNumber;
            echo "<br> Discount Code ";
            echo " : ";
            echo $discountcode;
            $sqlUpdateCustomerDC = mysqli_query($link, "UPDATE CUSTOMER SET discountcode = ".$discountcode." WHERE cid = ".$cid);
            for ($i =0; $i<count($itemids);$i++)
            {
                $priceQuery = "SELECT price FROM ITEM where _id = '".$itemids[$i]."'";
                $runpriceQuery = mysqli_query($link, $priceQuery);
                $row = mysqli_fetch_row($runpriceQuery);
                $quantity_price = ($quantities[$i] * $row[0])*(1-2.5*$discountcode/100);
                $insertTransItemStatement = "INSERT INTO ITEM_TRANSACTION (trans_no, item_id, quantity) VALUES (".$transactionNumber.",".$itemids[$i].",".$quantities[$i].")";
                $runInsertTransItemStatement = mysqli_query($link,$insertTransItemStatement);
                $insertItemPriceStatement = "INSERT INTO ITEM (_id, price) VALUES (".$itemids[$i].",".$quantity_price.")";
                $runInsertItemPriceStatement = mysqli_query($link,$insertItemPriceStatement);

            }
            echo "<br> Total Price ";
            echo " : ";
            echo $total_price;
            echo "<br> Transaction Success";
        }
        else {
            echo "<br> Input Error. Try Again.";
        }
        mysqli_close($link);
        ?>

        <br><br><a href="main.php">Home</a>

    </body>
</html>