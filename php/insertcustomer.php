<html>
    <head><title></title></head>
    <body>

        <?php
        $cid = $_POST["cid"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $telephone = $_POST["telephone"];
        $address = $_POST["address"];

        require("dbguest.php");
        $link = mysqli_connect($host, $user, $pass);
        if (!$link) die("Couldn't connect to MySQL");
        mysqli_select_db($link, $db)
            or die("Couldn't open $db: ".mysqli_error($link));

        if(!(isset($_POST['Yes']) || isset($_POST['No']))){
            $query = mysqli_query($link, "select * from CUSTOMERS where cid ='$cid'");
            if (mysqli_num_rows($query) >0)
            {
                echo "<form action=\"\" method=\"POST\">Customer already exists same customer ID. Still proceed adding?
			<br> <input type=\"submit\" name=\"Yes\" value=\"yes\"> <input type=\"submit\" name=\"No\" value=\"no\"> 
			<input type=\"hidden\" name=\"cid\" value=\"".$cid."\">
			<input type=\"hidden\" name=\"firstname\" value=\"".$firstname."\">
			<input type=\"hidden\" name=\"lastname\" value=\"".$lastname."\">
			<input type=\"hidden\" name=\"telephone\" value=\"".$telephone."\">
			<input type=\"hidden\" name=\"address\" value=\"".$address."\"></form>";
                exit;
            }
            else{
                $result = mysqli_query($link, "insert into CUSTOMERS (cid, fname, lname, tel_no, mailing_Address) values ('{$cid}', '{$firstname}', '{$lastname}', '{$telephone}','{$address}');");
                print "<p><p>New Customer has been added";
            }
        }
        elseif(isset($_POST['Yes']))
        {
            $result = mysqli_query($link, "insert into CUSTOMERS (cid, fname, lname, tel_no, mailing_Address) values ('{$cid}', '{$firstname}', '{$lastname}', '{$telephone}','{$address}');");
            print "<p><p>New Customer Added";
        }
        else
        {
            print "<p><p>Customer Not Added";
        }
        mysqli_close($link);
        ?>

        <br><br><a href="main.php">Home</a>

    </body>
</html>