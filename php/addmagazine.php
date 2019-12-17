<html>
    <head>
        <title>Add Magazine</title>
    </head>
    <body>


        <form action="insertMagazine.php" method="POST">
            <br> <b>Enter Magazine Details</b>
            <p>
                Magazine ID<input type="text" name="mag_id" required>
            <p>
            <p>
                Magazine Price<input type="text" name="mag_price" required>
            <p>
            <p>
                Magazine Name<input type="text" name="mag_name" required>
            <p>
                <input name="submit" type="submit" value="Add Magazine Details">
        </form>
        <br><br><a href="main.php">Home</a>
    </body>
</html>
