<?php
    
    session_start();

    $connect = true; //User verification variable

    if (isset($_POST['submit']))
    {
        $man_id = $_POST['user_id'];
        $password = $_POST['password'];
        $authority = $_POST['authority'];

        if ($authority === "student")
        {
        	$connection = mysqli_connect('localhost', 'root', '',  'kuet_registration_database');
            
            $query = "SELECT * FROM student_info WHERE user_id = '$user_id' AND password = '$password'";
            
            $result = mysqli_query($connection, $query);
            
            if (mysqli_num_rows($result))
            {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['full_info'] = $row;
                $_SESSION['roll'] = $row[roll];
                $_SESSION['dept'] = $row[dept];
                $_SESSION['name'] = $row[name];
                header("Location: ../profile/profile.php");
            }
            else 
            {
                $connect = false;
            }
  
        } 
        else
        {
            $connection = mysqli_connect('localhost', 'root', '',  'kuet_registration_database');
            
            $query = "SELECT * FROM teacher_info WHERE user_id = '$user_id' AND password = '$password'";
            
            $result = mysqli_query($connection, $query);
            
            if (mysqli_num_rows($result))
            {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['full_info_teacher'] = $row;
                header("Location: ../registration_process_and_progress/advisor_account.php");
            }
            else 
            {
                $connect = false;
            }
  
        }   
        
    }

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login (KUET Academic Programmes) </title>
	<link rel="stylesheet" href="../css/login_style.css">
</head>


<body>

	<div class="box"> <!--class="box" is made to give css style to the background box containing input fields-->
		
		<center><img src="../images/login_logo.png"></center>
		
		<!-- Alert Message printing -->
		
		
		<?php 
        
        if ($connect === false) //Checking the accuracy of user-id and password
        {
            ?>
            
            <div style = "padding-bottom:20px">
                <center><font color = #cc3333>Invalid User-Id or Password</font></center>
            </div>
            
            <?php
        }
        
        ?>
        

		<form action="login.php" method="post">

			<div class="input_box"> <!--class="input_box" is made to give css style to input fields-->
				<input type="text" name="user_id" required="">
				<label>User-Id</label>
			</div>

			<div class="input_box">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>

			<div class="radio_line">
				<label>Designation</label>
				<input type="radio" name="authority" required="" value="student"> Student
				<input type="radio" name="authority" required="" value="teacher"> Teacher
			</div>

			<center><input type="submit" name="submit" value="Submit"></center>

		</form>	

	</div>
	
	

</body>
</html>