<?php


    session_start();
    
        // initializing variables
          $username = "";
          $email    = "";
          $display_block ="";
          $display_member ="";
          $errors = array(); 

        // connect to the database
          $host= "Localhost";  //127.0.0.1
          $user= "root";
          $password= "";
          $db = mysqli_connect($host, $user, $password, 'pastime_sports');

        // REGISTER USER
          if (isset($_POST['reg_user'])) {
                       // receive all input values from the form
                       $fname = mysqli_real_escape_string($db, $_POST['fname']);
                       $lname = mysqli_real_escape_string($db, $_POST['lname']);
                       $dob = mysqli_real_escape_string($db, $_POST['mdob']);
                       $address = mysqli_real_escape_string($db, $_POST['address']);
                       $username = mysqli_real_escape_string($db, $_POST['username']);
                       $sdate = mysqli_real_escape_string($db, $_POST['sdate']);
                       $edate = mysqli_real_escape_string($db, $_POST['edate']);
                       $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
                       $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
                       $email = mysqli_real_escape_string($db, $_POST['email']);
                       $sport = mysqli_real_escape_string($db, $_POST['sport']);
                       
          
                      // form validation: ensure that the form is correctly filled ...                    
                     // by adding (array_push()) corresponding error unto $errors array
                     if (empty($fname)) { array_push($errors, "fname is required"); }
                     if (empty($lname)) { array_push($errors, "fname is required"); }
                     if (empty($dob)) { array_push($errors, "date of birth is required"); }
                     if (empty($address)) { array_push($errors, "enter address"); }
                     if (empty($sdate)) { array_push($errors, "enter todays date"); }
                     if (empty($edate)) { array_push($errors, "enter end date"); }
                     if (empty($username)) { array_push($errors, "Username is required"); }
                     if (empty($password_1)) { array_push($errors, "Password is required"); }
                     if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
                     if (empty($email)) { array_push($errors, "Email is required"); }
                     if (empty($sport)) { array_push($errors, "please select sport"); }
                     
  

                     // first check the database to make sure 
                    // a user does not already exist with the same username and/or email
                    $query = "SELECT * FROM register WHERE username='$username' OR email='$email' LIMIT 1";
                    $result = mysqli_query($db, $query);
                    $user = mysqli_fetch_assoc($result);
  
                    if ($user) { // if user exists
                               if ($user['username'] === $username) {
                                       array_push($errors, "Username already exists");
                                }

                               if ($user['email'] === $email) {
                                        array_push($errors, "email already exists");
                                }
                     }

                    // Finally, register user if there are no errors in the form
                     if (count($errors) == 0) {
  	                          $password = md5($password_1);//encrypt the password before saving in the database

  	                          $query = "INSERT INTO register (username, password, email) 
  			                                      VALUES('$username', '$password', '$email')";
  	                          mysqli_query($db, $query);
  	                          $_SESSION['username'] = $username;
                                  $_SESSION['success'] = "You are now registered";
                              
                                  echo ('<script type = "text/javascript"> alert("You have Successfully Registered with Pastime Sports\n CLICK OK TO PROCEED TO LOGIN");window.location=\'login.php\';</script>');
                                  //header('location: login.php');
                      }
                     //Also enter information into member table 
                     $query = "SELECT * FROM member WHERE MEMB_FNAME='$fname' OR EMAIL='$email' LIMIT 1";
                     $result = mysqli_query($db, $query);
                     $member = mysqli_fetch_assoc($result);
  
                    if ($member) { // if member exists
                               if ($member['EMAIL'] === $email) {
                                       array_push($errors, "a member with that email already exists");
                                }

                                if ($user['email'] === $email) {
                                        array_push($errors, "email already exists");
                                }
                     }

                    // Finally, register member if there are no errors in the form
                     if (count($errors) == 0) {
  	                         // $password = md5($password_1);//encrypt the password before saving in the database

  	                          $query = "INSERT INTO MEMBER (MEMB_FNAME, MEMB_SNAME, DOB, MEMB_ADDRESS, EMAIL, S_DATE, E_DATE, SPORT) 
  			                                      VALUES('$fname', '$lname', '$dob', '$address', '$email', '$sdate', '$edate', '$sport')";
  	                          mysqli_query($db, $query);
  	                          $_SESSION['MEMB_SNAME'] = $lname;
                                  $_SESSION['success'] = "You are now registered";
                              
                                   echo ('<script type = "text/javascript"> alert("You have Successfully Registered with Pastime Sports\n CLICK OK TO PROCEED TO LOGIN");window.location=\'login.php\';</script>');
                                   //header('location: login.php');
                      }
           }

       // LOGIN USER
             
            if (isset($_POST['login_user'])) {
                        if(!isset($_SESSION['attempt'])){
			        $_SESSION['attempt'] = 1;
		        }
                  
                  $username = mysqli_real_escape_string($db, $_POST['username']);
                  $password = mysqli_real_escape_string($db, $_POST['password']);
                  $email = mysqli_real_escape_string($db, $_POST['email']);

                 if (empty($username)) {
  	                      array_push($errors, "Username is required");
                  }
                 if (empty($password)) {
  	                      array_push($errors, "Password is required");
                  }
                  if (empty($email)) {
                        array_push($errors, "email is required");
                 }

                 if (count($errors) == 0) {
  	                      $password = md5($password);
                         	$query = "SELECT * FROM register WHERE username='$username' AND password='$password' AND email='$email' ";
  	                      $results = mysqli_query($db, $query);
  	                      if (mysqli_num_rows($results) == 1) {
                                                  $_SESSION['username'] = $username; 
                                                  $_SESSION['email'] = $email;                                                
                                            //$_SESSION['success'] = "You are now logged in";
                                            echo ('<script type = "text/javascript"> alert("LOGIN SUCCESSFUL!!\n CLICK OK TO PROCEED TO HOMEPAGE");window.location=\'index.php\';</script>');
                                                  // header('location: index.php');                                              
  	                      }else {	
                                echo ('<script type = "text/javascript"> alert("incorrect username or password")</script>');			             
                                      // array_push($errors, "incorrect username or passwors!");
  	                        }
                  }
           }

            // MEMBER RECORDS
             
            if (isset($_POST['login_user'])) {                                 
                        $email = mysqli_real_escape_string($db, $_POST['email']);         
                        if (empty($email)) {
                                array_push($errors, "email is required");
                        }
                        $query = "SELECT * FROM member WHERE EMAIL='$email' LIMIT 1";
                        $results = mysqli_query($db, $query)  or die(mysqli_error());
                        if (mysqli_num_rows($results) < 1) {
                                 //there are no topics, so say so
                                 $display_member = "<P><em>No Records Exist.</em></p>";
                        } else {
                                //create the display string
                                $display_member = "
                                                 <table cellpadding=3 cellspacing=1 border=1>
                                                 <tr>
                                                      <th>MEMBER ID</th>
                                                      <th>FIRST NAME</th>
                                                      <th>LAST NAME</th>
                                                      <th>DATE OF BIRTH</th>
                                                      <th>ADDRESS</th>
                                                      <th>EMAIL</th>
                                                      <th>SPORT</th>
                                                      <th>MEMBERSHIP START</th>
                                                      <th>MEMBERSHIP END</th>
                                                      <th>MEMBERSHIP FEE</th>
                                                 </tr>";
       
                                while ($member_info = mysqli_fetch_array($results)) {
                                                   $member_id = $member_info['MEMB_ID'];
                                                   $member_fname = stripslashes($member_info['MEMB_FNAME']);
                                                   $member_lname = stripslashes($member_info['MEMB_SNAME']);                                            
                                                   $member_dob = $member_info['DOB'];
                                                   $address = stripslashes($member_info['MEMB_ADDRESS']);
                                                   $member_email = stripslashes($member_info['EMAIL']);
                                                   $member_sdate = $member_info['S_DATE'];
                                                   $member_edate = $member_info['E_DATE'];
                                                   $member_fee = $member_info['ANNUAL_FEE'];
                                                   $sport = $member_info['SPORT'];                                             
        
                                                   //add to display
                                                   $display_member .= "
                                                                       <tr>                                                                    
                                                                                                                                                      <td align=center>$member_id</td>
                                                                                                                                                      <td align=center>$member_fname</td>
                                                                                                                                                      <td align=center>$member_lname</td>
                                                                                                                                                      <td align=center> $member_dob</td>
                                                                                                                                                      <td align=center>$address</td>
                                                                                                                                                      <td align=center>$member_email</td>
                                                                                                                                                      <td align=center>$sport</td>
                                                                                                                                                      <td align=center>$member_sdate</td>
                                                                                                                                                      <td align=center>$member_edate</td>
                                                                                                                                                      <td align=center>$member_fee</td>
                                                                       </tr>";
                                  }
                                  //close up the table
                                  $display_member .= "</table>";
			}                                
         
            }
          
        //SUBSCRIBE NEWSLETTER
        if (isset($_POST['subscribe_newsletter'])){
                       $email = mysqli_real_escape_string($db, $_POST['email']);
                       if(empty($email)) {
                               array_push($errors, "email required!!");
                        }
                       
                        $user_check_query = "SELECT * FROM subscribe WHERE EMAIL='$email'  LIMIT 1";
                        $result = mysqli_query($db, $user_check_query);
                        $user = mysqli_fetch_assoc($result);
                        if ($user) { // if email exists
                                  if ($user['EMAIL'] === $email) {
                                   array_push($errors, "email already exists");
                                  }
                        }

                        if (count($errors) == 0) {
                                 $query = "INSERT INTO subscribe (EMAIL) 
                                           VALUES('$email')";
                          mysqli_query($db, $query);
                          $_SESSION['EMAIL'] = $email;
                          $_SESSION['success'] = "You are now subscribed";
                          
                          echo "you are now subscribed to pastime sports newsletter!";
                         //header('location: login.php');
                  }
         }

          //register button
        if (isset($_POST['register'])){header('location: register.php');}

        //create database button
        if (isset($_POST['database'])){header('location: setup.php');}

         //forum
        if (isset($_POST['comment'])){
                 $topic = mysqli_real_escape_string($db, $_POST['topic']);
                 if(empty($topic)) {
                        array_push($errors, "enter topic!");
                 }
                 $top_owner = mysqli_real_escape_string($db, $_POST['username']);
                 if(empty($top_owner)) {
                         array_push($errors, "email is required!!");
                  }
                  $post_cont = mysqli_real_escape_string($db, $_POST['message']);
                  if(empty($post_cont)) {
                          array_push($errors, "enter message!!");
                  }
          
                  $user_check_query = "SELECT * FROM forum WHERE F_OWNER='$top_owner'  LIMIT 1";
                  $result = mysqli_query($db, $user_check_query);
                  //$top = mysqli_fetch_assoc($result);
                  

                    if (count($errors) == 0) {
                          $query = "INSERT INTO forum (F_TITLE, F_CONTENT, F_DATE, F_OWNER) 
                                                VALUES('$topic','$post_cont', now(), '$top_owner')";
                          mysqli_query($db, $query);
                          $_SESSION['F_OWNER'] = $top_owner;
                          $_SESSION['success'] = "You have posted a message";
             
                           echo ('<script type = "text/javascript"> alert("You have poasted a message!");</script>');
                           //header('location: login.php');
                           $user_check_query = "SELECT * FROM forum WHERE F_OWNER='$top_owner'  LIMIT 1";
                           $result = mysqli_query($db, $user_check_query);
                           $pst = mysqli_fetch_assoc($result);
                           if ($pst) { // if email exists
                                   if ($pst['F_OWNER'] === $top_owner) {
                                            array_push($errors, "email already exists");
                                    }
                            }
		        }		
 
                  
        }

        if (isset($_POST['update'])) {
                         // receive all input values from the form
                       $fname = mysqli_real_escape_string($db, $_POST['fname']);
                       $lname = mysqli_real_escape_string($db, $_POST['lname']);
                       $dob = mysqli_real_escape_string($db, $_POST['dob']);
                       $address = mysqli_real_escape_string($db, $_POST['address']);                      
                       $sport = mysqli_real_escape_string($db, $_POST['sport']);
                       $email = mysqli_real_escape_string($db, $_POST['email']);
                       $query = "UPDATE member SET MEMB_FNAME = '$fname', MEMB_SNAME='$lname', DOB='$dob', MEMB_ADDRESS='$address', SPORT='$sport' WHERE EMAIL='$email'";
                       $result = mysqli_query($db, $query);
        }
        if (isset($_POST['del_fname'])) {
                // receive all input values from the form
              $fname = mysqli_real_escape_string($db, $_POST['record']);             
              $query = "DELETE FROM member WHERE MEMB_FNAME='$fname'";
              $result = mysqli_query($db, $query);
        }
        //create user
        if (isset($_POST['create_user'])) {
                         // receive all input values from the form
                       $fname = mysqli_real_escape_string($db, $_POST['fname']);
                       $lname = mysqli_real_escape_string($db, $_POST['lname']);
                       $dob = mysqli_real_escape_string($db, $_POST['dob']);
                       $address = mysqli_real_escape_string($db, $_POST['address']);                      
                       $sdate = mysqli_real_escape_string($db, $_POST['sdate']);
                       $edate = mysqli_real_escape_string($db, $_POST['edate']);                      
                       $email = mysqli_real_escape_string($db, $_POST['email']);
                       $sport = mysqli_real_escape_string($db, $_POST['sport']);
          
                      // form validation: ensure that the form is correctly filled ...                    
                     // by adding (array_push()) corresponding error unto $errors array
                     if (empty($fname)) { array_push($errors, "fname is required"); }
                     if (empty($lname)) { array_push($errors, "fname is required"); }
                     if (empty($dob)) { array_push($errors, "date of birth is required"); }
                     if (empty($address)) { array_push($errors, "enter address"); }
                     if (empty($sdate)) { array_push($errors, "enter todays date"); }
                     if (empty($edate)) { array_push($errors, "enter end date"); }                     
                     if (empty($email)) { array_push($errors, "Email is required"); }
                     if (empty($sport)) { array_push($errors, "please select sport"); }
                      // Enter information into member table 
                      $query = "SELECT * FROM member WHERE MEMB_FNAME='$fname' OR EMAIL='$email' LIMIT 1";
                      $result = mysqli_query($db, $query);
                      $member = mysqli_fetch_assoc($result);
    
                      if ($member) { // if memner exists
                                 if ($member['EMAIL'] === $email) {
                                         array_push($errors, "a member with that email already exists");
                                  }
  
                                /* if ($user['email'] === $email) {
                                          array_push($errors, "email already exists");
                                  }*/
                       }
  
                      // Finally, register member if there are no errors in the form
                       if (count($errors) == 0) {
                                     // $password = md5($password_1);//encrypt the password before saving in the database
  
                                      $query = "INSERT INTO MEMBER (MEMB_FNAME, MEMB_SNAME, DOB, MEMB_ADDRESS, EMAIL, S_DATE, E_DATE, SPORT) 
                                                                  VALUES('$fname', '$lname', '$dob', '$address', '$email', '$sdate', '$edate', '$sport')";
                                      mysqli_query($db, $query);
                                      $_SESSION['MEMB_SNAME'] = $lname;
                                $_SESSION['success'] = "You have entered a new record";
                                
                               // echo ('<script type = "text/javascript"> alert("You have Successfully Registered with Pastime Sports\n CLICK OK TO PROCEED TO LOGIN");window.location=\'login.php\';</script>');
                               //header('location: login.php');
                        }
        }
         
         
                if (isset($_POST['donate'])) {
                              $name = mysqli_real_escape_string($db, $_POST['fulname']);
                              $email = mysqli_real_escape_string($db, $_POST['email']);
                              $amount = mysqli_real_escape_string($db, $_POST['amount']);
                              $comment = mysqli_real_escape_string($db, $_POST['don_comment']);
                              $query = "INSERT INTO donation (DON_NAME, DON_EMAIL, PAYMENT, COMMENT) VALUES('$name', '$email', '$amount', '$comment')";
  	                      $results = mysqli_query($db, $query);
  	                      if ($results) {                                           
                                            echo "thank you, you have made a donation";                                                                                              
  	                      }

                } 
        // CHANGE PASSWORD
        if (isset($_POST['reset'])) {
                // receive all input values from the form
                
                $username = mysqli_real_escape_string($db, $_POST['username']);               
                $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
                $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
                $email = mysqli_real_escape_string($db, $_POST['email']);               
                
   
               // form validation: ensure that the form is correctly filled ...                    
              // by adding (array_push()) corresponding error unto $errors array              
              if (empty($username)) { array_push($errors, "Username is required"); }
              if (empty($password_1)) { array_push($errors, "Password is required"); }
              if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
              if (empty($email)) { array_push($errors, "Email is required"); }
              
              
              // first check the database to make sure 
             // a user does not already exist with the same username and/or email
             $query = "SELECT * FROM register WHERE username='$username' OR email='$email' LIMIT 1";
             $result = mysqli_query($db, $query);
             $user = mysqli_fetch_assoc($result);

             if ($user) { // if user exists
                        if ($user['username'] === $username) {
                                array_push($errors, "Username already exists");
                         }

                        if ($user['email'] === $email) {
                                 array_push($errors, "email already exists");
                         }
              }

             // Finally, register user if there are no errors in the form
              if (count($errors) == 0) {
                             $password = md5($password_1);//encrypt the password before saving in the database

                             $query = "UPDATE register SET password = '$password' WHERE username='$username'";
                             mysqli_query($db, $query);
                             $_SESSION['username'] = $username;
                           $_SESSION['success'] = "You are now registered";
                       
                           echo ('<script type = "text/javascript"> alert("You have Successfully Change your password\n CLICK OK TO PROCEED TO LOGIN");window.location=\'login.php\';</script>');
                           //header('location: login.php');
               }
 
			
        }
?>     