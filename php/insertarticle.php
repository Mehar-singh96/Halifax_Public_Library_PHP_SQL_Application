<html>
    <head><title></title></head>
    <body>


        <?php
        $article_title = $_POST['article_title'];
        $page_num = $_POST['page_num'];
        $vol_id = $_POST['vol_id'];
        $mag_id = $_POST['maga_id'];

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $fname1 = $_POST['fname1'];
        $lname1 = $_POST['lname1'];
        $email1 = $_POST['email1'];
        $fname2 = $_POST['fname2'];
        $lname2 = $_POST['lname2'];
        $email2 = $_POST['email2'];
        $fname3 = $_POST['fname3'];
        $lname3 = $_POST['lname3'];
        $email3 = $_POST['email3'];
        $fname4 = $_POST['fname4'];
        $lname4 = $_POST['lname4'];
        $email4 = $_POST['email4'];
        $fname5 = $_POST['fname5'];
        $lname5 = $_POST['lname5'];
        $email5 = $_POST['email5'];


        require("dbguest.php");
        $link = mysqli_connect($host, $user, $pass);
        if (!$link) die("Couldn't connect to MySQL");
        mysqli_select_db($link, $db)
            or die("Couldn't open $db: ".mysqli_error($link));

        //  $flagm = false;
        $sqlMag = "SELECT * FROM MAGAZINE WHERE  _id = $mag_id ";
        $result = mysqli_query($link,$sqlMag);
        if (mysqli_num_rows($result) == 0){
            echo " Magazine details doesnt exist - insert magazine first";
            echo "<a href= 'addMagazine.php'> Add magazine </a> <br>";
            echo "<a href= 'main.php'> Main Page </a> <br>";
            exit;
        }

        $sqlvol = "SELECT * FROM VOLUMES WHERE  mag_id = $mag_id and vol_no =$vol_id";
        $result1 = mysqli_query($link,$sqlvol);
        if (mysqli_num_rows($result1) == 0){
            echo " Volume does'nt exist for the corresponding Magazine - insert volume in volume table";
            echo "<a href= 'addVolume.php'> Add magazine Volume </a> <br>";
            echo "<a href= 'main.php'> Main Page </a> <br>";
            exit;
        }





        $sqlInsertArticle = "INSERT into ARTICLES(mag_id,vol_no,title,page_num) VALUES('$mag_id','{$vol_id}','{$article_title}','{$page_num}')"; 
        $resultArticleInsert = mysqli_query( $link, $sqlInsertArticle);
        $articleid = mysqli_insert_id($link);

        if(!$resultArticleInsert){
            printf("error message is ".mysqli_error($link)."<br>");

            echo  "<strong> insertion into article table failed :  Please check the error message above <br>";
            echo "<a href= 'addVolume.php'> Add Volume</a> <br>";
            echo "<a href= 'main.php'> Main Page </a> <br>";
            exit;
        }
        

        $flag = false;
        $sqlAuthorName = "SELECT _id FROM AUTHOR  WHERE fname = '$fname' and lname = '$lname'";
        $resultAuthorName = mysqli_query($link,$sqlAuthorName);
        while ($row = mysqli_fetch_assoc($resultAuthorName)) {
            $flag = true;
            echo "<strong >author name already  exists in table , hence author is not inserted </strong><br>"; 
            $authorid  = $row['_id'];
        }
        if ($flag == false){
            $sqlInsertAuthor = "INSERT into AUTHOR(fname,lname,email) VALUES('{$fname}','{$lname}','{$email}')";
            $resultAuthorInsert = mysqli_query($link,$sqlInsertAuthor);
            $authorid = mysqli_insert_id($link);

            if(!$resultAuthorInsert){
                echo "<strong>insertion into author table failed </strong><br>"; 
                exit;
            }
            
        }

        $sqlInsertArticleAuthor = "INSERT into PUBLISHED(author_id,article_id) VALUES('{$authorid}','{$articleid}')";
        $resultArticleAuthorInsert = mysqli_query( $link,$sqlInsertArticleAuthor);
        if(!$resultArticleAuthorInsert){
            echo "<strong>insertion into articleauthor table failed </strong><br>"; 
            exit;
        }
        
        
        if($fname1 == NULL  or $lname1 == NULL or $email1 == NULL)
            /*
            echo " <strong>author 2 details is null hence not inserted into database</strong><br>"; 
            */
            echo "" ;
            

        else {
            $flag1 = false;
            $sqlAuthorName1 = "SELECT _id FROM AUTHOR  WHERE fname = '$fname1' and lname = '$lname1'";
            $resultAuthorName1 = mysqli_query($link,$sqlAuthorName1);
            while ($row1 = mysqli_fetch_assoc($resultAuthorName1)) {
                $flag1= true;
                echo "<strong>author2 name already  exists in table , hence author2 is not inserted</strong><br> "; 
                $authorid1  = $row1['_id'];
            }
            if ($flag1 == false){
                $sqlInsertAuthor1= "INSERT into AUTHOR(fname,lname,email) VALUES('{$fname1}','{$lname1}','{$email1}')";
                $resultAuthorInsert1 = mysqli_query($link,$sqlInsertAuthor1);
                $authorid1 = mysqli_insert_id($link);


                if(!$resultAuthorInsert1){
                    echo "insertion into author table failed for author 2 ";
                    exit; 
                }
                
            } 
            $sqlInsertArticleAuthor1 = "INSERT into PUBLISHED(author_id,article_id) VALUES('{$authorid1}','{$articleid}')";
            $resultArticleAuthorInsert1 = mysqli_query( $link,$sqlInsertArticleAuthor1);
            if(!$resultArticleAuthorInsert1){
                echo "insertion into published table failed for author 2<br>";  
                exit;
            }
              

        }
        ////////////////////////////
        if($fname2 == NULL  or $lname2 == NULL or $email2 == NULL)
            echo "";
            //echo " <strong> author 3 details is null hence not inserted into database </strong><br>";  
        else{
            $flag2 = false;
            $sqlAuthorName2 = "SELECT _id FROM AUTHOR  WHERE fname = '$fname2' and lname = '$lname2'";
            $resultAuthorName2 = mysqli_query($link,$sqlAuthorName2);
            while ($row2 = mysqli_fetch_assoc($resultAuthorName2)) {
                $flag2= true;
                echo "<strong>author3 name already  exists in table , hence author3 is not inserted </strong><br>";
                $authorid2  = $row2['_id'];
            }
            if ($flag2 == false){
                $sqlInsertAuthor2= "INSERT into AUTHOR(fname,lname,email) VALUES('{$fname2}','{$lname2}','{$email2}')";
                $resultAuthorInsert2 = mysqli_query($link,$sqlInsertAuthor2);
                $authorid2 = mysqli_insert_id($link);


                if(!$resultAuthorInsert2){
                    echo "<strong>insertion into author table failed for author 3</strong><br>";
                    exit;
                }
                else  
                    echo "<strong>insertion into author done for author 3</strong><br>"; 
            }
            $sqlInsertArticleAuthor2 = "INSERT into PUBLISHED(author_id,article_id) VALUES('{$authorid2}','{$articleid}')";
            $resultArticleAuthorInsert2 = mysqli_query( $link,$sqlInsertArticleAuthor2);
            if(!$resultArticleAuthorInsert2){
                echo "<strong>insertion into published table failed for author 3</strong><br>";
                exit;
            }
            else 

                echo "<strong>insertion into published done for author 3 </strong><br>"; 

        }
        /////////////////////////////////////////////

        if($fname3 == NULL  or $lname3 == NULL or $email3 == NULL)
            //echo " <strong> author 4 details is null hence not inserted into database </strong><br>"; 
            echo "";
        else{
            $flag3 = false;
            $sqlAuthorName3 = "SELECT _id FROM AUTHOR  WHERE fname = '$fname3' and lname = '$lname3'";
            $resultAuthorName3 = mysqli_query($link,$sqlAuthorName3);
            while ($row3 = mysqli_fetch_assoc($resultAuthorName3)) {
                $flag3= true;
                echo "<strong>author4 name already  exists in table , hence author4 is not inserted </strong><br>";
                $authorid3  = $row3['_id'];
            }
            if ($flag3 == false){
                $sqlInsertAuthor3= "INSERT into AUTHOR(fname,lname,email) VALUES('{$fname3}','{$lname3}','{$email3}')";
                $resultAuthorInsert3 = mysqli_query($link,$sqlInsertAuthor3);
                $authorid3 = mysqli_insert_id($link);


                if(!$resultAuthorInsert3){
                    echo "<strong>insertion into author table failed for author 3</strong><br>";
                    exit;
                }
                else  
                    echo "<strong>insertion into author done for author 3</strong><br>"; 
            }
            $sqlInsertArticleAuthor3 = "INSERT into PUBLISHED(author_id,article_id) VALUES('{$authorid3}','{$articleid}')";
            $resultArticleAuthorInsert3 = mysqli_query( $link,$sqlInsertArticleAuthor3);
            if(!$resultArticleAuthorInsert3){
                echo "<strong>insertion into published table failed for author 4</strong><br>";
                exit;
            }
            else 

                echo "<strong>insertion into published done for author 4 </strong><br>"; 

        }
        ///////////////////////////////

        if($fname4 == NULL  or $lname4 == NULL or $email4 == NULL)
           // echo " <strong> author 5 details is null hence not inserted into database </strong><br>";  
            echo "";
        else{
            $flag4 = false;
            $sqlAuthorName4 = "SELECT _id FROM AUTHOR  WHERE fname = '$fname4' and lname = '$lname4'";
            $resultAuthorName4 = mysqli_query($link,$sqlAuthorName4);
            while ($row4 = mysqli_fetch_assoc($resultAuthorName4)) {
                $flag4= true;
                echo "<strong>author5 name already  exists in table , hence author5 is not inserted </strong><br>";
                $authorid4  = $row4['_id'];
            }
            if ($flag4 == false){
                $sqlInsertAuthor4= "INSERT into AUTHOR(fname,lname,email) VALUES('{$fname4}','{$lname4}','{$email4}')";
                $resultAuthorInsert4 = mysqli_query($link,$sqlInsertAuthor4);
                $authorid4 = mysqli_insert_id($link);


                if(!$resultAuthorInsert4){
                    echo "<strong>insertion into author table failed for author 5</strong><br>";
                    exit;
                }
                else  
                    echo "<strong>insertion into author done for author 5</strong><br>"; 
            }
            $sqlInsertArticleAuthor4 = "INSERT into PUBLISHED(author_id,article_id) VALUES('{$authorid4}','{$articleid}')";
            $resultArticleAuthorInsert4 = mysqli_query( $link,$sqlInsertArticleAuthor4);
            if(!$resultArticleAuthorInsert4){
                echo "<strong>insertion into published table failed for author 5</strong><br>";
                exit;
            }
            else 

                echo "<strong>insertion into published done for author 5 </strong><br>"; 

        }
        /////////////////////////
        if($fname5 == NULL  or $lname5 == NULL or $email5 == NULL)
           // echo " <strong> author 6 details is null hence not inserted into database </strong><br>";
            echo "";
        else{
            $flag5 = false;
            $sqlAuthorName5 = "SELECT _id FROM AUTHOR  WHERE fname = '$fname5' and lname = '$lname5'";
            $resultAuthorName5 = mysqli_query($link,$sqlAuthorName5);
            while ($row5 = mysqli_fetch_assoc($resultAuthorName5)) {
                $flag5= true;
                echo "<strong>author4 name already  exists in table , hence author4 is not inserted </strong><br>";
                $authorid5  = $row5['_id'];
            }
            if ($flag5 == false){
                $sqlInsertAuthor5= "INSERT into AUTHOR(fname,lname,email) VALUES('{$fname5}','{$lname5}','{$email5}')";
                $resultAuthorInsert5 = mysqli_query($link,$sqlInsertAuthor5);
                $authorid5 = mysqli_insert_id($link);


                if(!$resultAuthorInsert5){
                    echo "<strong>insertion into author table failed for author 6</strong><br>";
                    exit;
                }
                else  
                    echo "<strong>insertion into author done for author 6</strong><br>"; 
            }
            $sqlInsertArticleAuthor5 = "INSERT into PUBLISHED(author_id,article_id) VALUES('{$authorid5}','{$articleid}')";
            $resultArticleAuthorInsert5 = mysqli_query( $link,$sqlInsertArticleAuthor4);
            if(!$resultArticleAuthorInsert5){
                echo "<strong>insertion into published table failed for author 6</strong><br>";
                exit;
            }
            else 

                echo "<strong>insertion into published done for author 6 </strong><br>"; 

        }
        /////////////////////////
        echo "Records inserted";

        mysqli_close($link);
        ?>

        <br><br><a href="main.php">Home</a>

    </body>
</html>