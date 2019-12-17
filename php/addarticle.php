<html>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <h1>Add Article : </h1>
        <form action="insertarticle.php" method="POST">
            <b>Enter Article Details</b>

            <p><b> Magazine ID </b><input type="text" name="maga_id"required> </p>
            <p><b> Volume ID </b><input type="text" name="vol_id"required> </p>
            <p><b>Article Title</b><input type="text" name="article_title"required></p>
            <p><b>Page Number</b><input type="text" name="page_num"required></p>

            <label for="author_num"><b>No of Authors</b></label>
            <input id="author_num" type="text">

            <a class="button button2" onclick="myfunction()">Populate Authors</a> 

            <div id="auth1">
                <br> <b>Auhtor 1</b></br>

            First Name <input type="text" name="fname"required>
            <p>
            <p>
                Last Name <input type="text" name="lname"required>
            <p>
            <p>
                Email <input type="text" name="email"required>
            <p>
            </p></div>
        <div id="auth2">  
            <br> <b>Auhtor 2</b></br>
        <p>
            First Name <input type="text" name="fname1">
        <p>
        <p>
            Last Name <input type="text" name="lname1">
        <p>
        <p>
            Email <input type="text" name="email1">
        <p> </p></div>
    <div id="auth3">  
        <br> <b>Auhtor 3</b></br>
    <p>
        First Name <input type="text" name="fname2">
    <p>
    <p>
        Last Name <input type="text" name="lname2">
    <p>
    <p>
        Email <input type="text" name="email2">
    <p>
    </p></div>
<div id="auth4">  
    <br> <b>Auhtor 4</b></br>
<p>
    First Name <input type="text" name="fname3">
<p>
<p>
    Last Name <input type="text" name="lname3">
<p>
<p>
    Email <input type="text" name="email3">
<p>
</p></div>
<div id="auth5">  
    <br> <b>Auhtor 5</b></br>
<p>
    First Name <input type="text" name="fname4">
<p>
<p>
    Last Name <input type="text" name="lname4">
<p>
<p>
    Email <input type="text" name="email4">
<p>
</p></div>
<div id="auth6">  
    <br> <b>Auhtor 6</b></br>
<p>
    First Name <input type="text" name="fname5">
<p>
<p>
    Last Name <input type="text" name="lname5">
<p>
<p>
    Email <input type="text" name="email5">
<p>



</p>


</div>

<p id="times"></p>

<input type="submit" class="button" name="SUBMIT">
</form>


</body>
<script>
    $(document).ready(function(){
        document.getElementById("auth1").style.display="none";
        document.getElementById("auth2").style.display="none";
        document.getElementById("auth3").style.display="none";
        document.getElementById("auth4").style.display="none";
        document.getElementById("auth5").style.display="none";
        document.getElementById("auth6").style.display="none";

    });
    function myfunction()
    {
        var times=document.getElementById("author_num").value;

        if(times==1)
        {
            document.getElementById("auth1").style.display="block"; 
        }
        else if(times==2)
        {
            document.getElementById("auth1").style.display="block"; 
            document.getElementById("auth2").style.display="block"; 
        }
        else if(times==3)
        {
            document.getElementById("auth1").style.display="block"; 
            document.getElementById("auth2").style.display="block"; 
            document.getElementById("auth3").style.display="block"; 
        }
        else if(times==4)
        {
            document.getElementById("auth1").style.display="block"; 
            document.getElementById("auth2").style.display="block"; 
            document.getElementById("auth3").style.display="block"; 
            document.getElementById("auth4").style.display="block"; 
        }
        else if(times==5)
        {
            document.getElementById("auth1").style.display="block"; 
            document.getElementById("auth2").style.display="block"; 
            document.getElementById("auth3").style.display="block"; 
            document.getElementById("auth4").style.display="block"; 
            document.getElementById("auth5").style.display="block"; 
        }
        else if(times==6)
        {
            document.getElementById("auth1").style.display="block"; 
            document.getElementById("auth2").style.display="block"; 
            document.getElementById("auth3").style.display="block"; 
            document.getElementById("auth4").style.display="block"; 
            document.getElementById("auth5").style.display="block"; 
            document.getElementById("auth6").style.display="block"; 
        }

    }
</script>
</html>