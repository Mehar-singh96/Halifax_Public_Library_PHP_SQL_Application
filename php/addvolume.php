<html>
    <head>
        <title>Add Magazine Volumes</title>
    </head>
    <body>


        <form action="insertVolume.php" method="POST">
            <br> <b>Enter Magazine Volume Details</b>
            <p>
                Magazine ID<input type="text" name="mag_id"required>
            <p>
            <p>
                Volume <input type="text" name="mag_vol"required>
            <p>
            <p>
                Publication Year<input type="text" name="pub_year"required>
            <p>

                <input name="submit" type="submit" value="Add Volume Details">
        </form>
        <br><br><a href="main.php">Home</a>
    </body>
</html>
