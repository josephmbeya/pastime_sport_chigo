<?php
  $host= "Localhost";  //127.0.0.1
  $user= "root";
  $password= "";
  $query= "CREATE database pastime_sports";
  $con= mysql_connect($host,$user,$password);
  if(! $con){
        die("could not connect:" . mysql_error());
  }
  echo "connected successfuly!";
   
  $rev = mysql_query($query);  

/*
  //creating the members table
  
  $query = " CREATE TABLE member(
            MEMB_ID INT NOT NULL AUTO_INCREMENT,
            MEMB_FNAME VARCHAR(30) NOT NULL,
            MEMB_SNAME VARCHAR(30) NOT NULL,
            DOB DATE NOT NULL,
            MEMB_ADDRESS VARCHAR(30) NOT NULL,
            EMAIL VARCHAR(20) NOT NULL,
            S_DATE DATE NOT NULL,
            E_DATE DATE NOT NULL,
            ANNUAL_FEE VARCHAR(10) DEFAULT '£300',
            MEMBERSHIP VARCHAR(10) DEFAULT 'ANNUAL',
            SPORT VARCHAR(30) NOT NULL,
            PRIMARY KEY(MEMB_ID)
  )";
   mysql_select_db("pastime_sports");
   $rev = mysql_query($query, $con); 
   
   
   //creating the registration table
  
  $query = " CREATE TABLE register(
           id INT NOT NULL AUTO_INCREMENT,
           username VARCHAR(20) NOT NULL,
           password VARCHAR(256) NOT NULL,
           email VARCHAR(20) NOT NULL,
           UNIQUE INDEX username_unique(username),
           PRIMARY KEY(id)
  )";
   mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
  
   //creating the employees table
  
  $query = " CREATE TABLE employee(
           EMP_ID INT NOT NULL AUTO_INCREMENT,
           EMP_NAME VARCHAR(30) NOT NULL,
           EMP_POSITION VARCHAR(30) NOT NULL,   
           PRIMARY KEY(EMP_ID)
  )";
   mysql_select_db("pastime_sports");
   $rev = mysql_query($query);
  
 //creating the sponsors table

  $query = " CREATE TABLE SPONSOR(
           SPONS_ID INT NOT NULL AUTO_INCREMENT,
           SPONS_NAME VARCHAR(30) NOT NULL,
           PRIMARY KEY(SPONS_ID)  
  )";
  mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
  */
   //creating the donations table

  $query = " CREATE TABLE DONATION(
           DON_ID INT NOT NULL AUTO_INCREMENT,
           DON_NAME VARCHAR(30) NOT NULL,
           DON_EMAIL VARCHAR(30) NOT NULL,
           PAYMENT VARCHAR(30) NOT NULL,
           COMMENT VARCHAR(255) NOT NULL,
           PRIMARY KEY(DON_ID)  
  )";
  mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
   
/*
  //creating newsletter table called subscribe
  $query = " CREATE TABLE SUBSCRIBE(
             ID INT  NOT NULL AUTO_INCREMENT,
             EMAIL VARCHAR(255) NOT NULL,
             PRIMARY KEY(ID)  
  )";
  mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
   
  //creating forum topic table
  $query = "CREATE TABLE FORUM(
            F_ID INT NOT NULL AUTO_INCREMENT,
            F_TITLE VARCHAR(256) NOT NULL,
            F_CONTENT TEXT NOT NULL,
            F_DATE DATETIME NOT NULL,
            F_OWNER VARCHAR(150) NOT NULL,
            PRIMARY KEY(F_ID)
  )";
  mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
 /*
  //creating counter table
  $query = "CREATE TABLE COUNTR(
             CNT_ID INT NOT NULL AUTO_INCREMENT,
             CNTR INT(20) NOT NULL,
             PRIMARY KEY(CNT_ID)
  )";
  mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
  
  //insert value 0 in counter
  $query = "INSERT INTO sponsor(SPONS_NAME) VALUES('Sport England')";
  mysql_select_db("pastime_sports");
  $rev = mysql_query($query);
 */

  
  

		
	
?>

<!DOCTYPE html>
<html>
<head>
  <title>CREATE DATABASE & TABLES</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>database and tables for pastime_sports</h2>
  </div>
	 
  <p>
    <?php
        
        if(! $rev){
          die("could not create tables!\n " . mysql_error());
     }else{
       echo ('<script type = "text/javascript"> alert("You have Successfully created pastime_sports Database\n table employee\n table member\n table sponsor\n table donation\n table register\n table subscribe\n table category\n table topic\n table posts");window.location=\'login.php\';</script>');
     }
    ?>
  </p>
  
  
</body>
</html>