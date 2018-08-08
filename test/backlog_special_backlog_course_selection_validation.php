<?php
    session_start();

    
    $course_ammount = $_SESSION['course_ammount'];
    $credits = $_SESSION['credits'];
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $full_info['name']; ?> </title>
	<link rel="stylesheet" href="style.css">
    
    <style>
    
        #message
        {
            width: 1125px;
            height: 90px;
            margin-top: 250px;
            margin-left: 110px;
        }
        
        #text
        {
            color: darkolivegreen;
        }
        
        #submit_large_button
        {
            width: 200px;
            height: 50px;
            background-color: rgba(114, 147, 58, .5);
            margin-top: 50px;
            margin-bottom: 100px;
            border: none;
            outline: none;
            border-radius: 10px;
            color: white;
        }
        
        #text_alert
        {
            color: #ff7e7e;
        }
    
    </style>
    
</head>
<body>
   
   <div class="header">
		
		<div class="sub_header">
            
            <div id="logout">
				<a href="../login/logout.php"> Logout </a>
			</div>

			<div  id="library">
                <a href="#"> Library </a>
			</div>

			<div  id="result">
                <a href="#"> Result </a>
			</div>

			<div id="registration">
				<a href="../course_selection/course_selection.php"> <font color = "#d98a2d"> Registration </font> </a>
			</div>

			<div id="profile">
				<a href="profile.php"> Profile </a>
			</div>

		</div>
    
    <?php
    
        if (count($_POST['course']) != $course_ammount)
        {
            $checked_course_sequence = array();
            $temporary_checked_course = $_POST['course'];
            
            
            for ($index_1=0,$index_2=0; $index_1 < count($temporary_checked_course); )
            {
                if ($temporary_checked_course[$index_1] == 0)
                {
                    $checked_course_sequence[$index_2] = 0;
                    $index_1++;
                    $index_2++;
                }
                else if ($temporary_checked_course[$index_1] == 1)
                {
                    $checked_course_sequence[$index_2] = 1;
                    $index_1 = $index_1 + 2;
                    $index_2++;
                }
            }
            
            
            
            //Minimum credit checking
            
            for ($index_1=0,$total_credit=0; $index_1 < $course_ammount; $index_1++)
            {
                if ($checked_course_sequence[$index_1] == 1)
                {
                    $total_credit = $total_credit + $credits[$index_1];
                }
            }
            
            if ($total_credit > 12)
            {
                ?>
            
                <div id="message">
                   <h1 align='center' id="text_alert"> Please select courses having less than or equal to 12.00 credit in total.</h1>
                </div>

                <form action="course_selection.php" method="post">
                    <div>
                       <center>
                           <input type="submit" name="submit" value="Back To Previous Page" id="submit_large_button">
                       </center>
                    </div>
                </form>
            
            <?php
            }
            else
            {
                $roll = $_SESSION['roll'];
                $dept = $_SESSION['dept'];
                $session = $_SESSION['session'];
                $year = $_SESSION['year'];
                $semester = "Backlog";
        
                $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');
                
                $query = "DELETE FROM registered_courses WHERE 1";
                
                mysqli_query($connection, $query);
        
                $query_1 = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND status = '$semester'";

                $result = mysqli_query($connection, $query_1);
                
                $index = 0;
            
                while ($status = mysqli_fetch_assoc($result))
                {
                    $course_no = $status['course_no'];
                    $course_title = $status['course_title'];
                    
                    $credit = $status['credit'];
                    
                    if ($checked_course_sequence[$index] == 1)
                    {
                        $remark = $status['status'];
                        $_SESSION['status'] = $remark;

                        $query_3 = "INSERT INTO registered_courses (Serial, roll, session, year, semester, course_no, course_title, status, credit) VALUES ('','$roll','$session','$year','$semester','$course_no','$course_title','$remark','$credit')";

                        mysqli_query($connection, $query_3);
                    }
                    
                    $index++;

                }


            ?>
            
            <div id="message">
               <h1 align='center' id="text"> Your course selection process has been completed          successfully.<br>Now go to the next step.</h1>
            </div>
            
            <form action="../progress/progress.php" method="post">
                <div>
                   <center>
                       <input type="submit" name="submit" value="Next" id="submit_large_button">
                   </center>
                </div>
            </form>
            
            <?php

            }
            
            
        }
        else
        {
            ?>
            
            <div id="message">
               <h1 align='center' id="text_alert"> Please select courses.</h1>
            </div>
            
            <form action="course_selection.php" method="post">
                <div>
                   <center>
                       <input type="submit" name="submit" value="Back To Previous Page" id="submit_large_button">
                   </center>
                </div>
            </form>
            
            <?php
         }
    
    ?>
    
</body>
</html>