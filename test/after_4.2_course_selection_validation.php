<?php
    session_start();

    
    $course_ammount = $_SESSION['course_ammount'];
    $credits = $_SESSION['credits'];
    
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> <?php echo $full_info['name']; ?> </title>
	<link rel="stylesheet" href="style.css">
	
	<style>
    
        #table_header_container
        {
            width: 1125px;
            height: 70px;
            margin-top: 100px;
            margin-left: 110px;
        }
        
        #title_small
        {
            width: 140px;
            height: 60px;
            background-color: rgba(0, 0, 0, .7);
            margin-left: 20px;
            float: left;
            border-radius: 20px;
            border: solid 1px #ecedee;
        }
        
        #title_large
        {
            width: 440px;
            height: 60px;
            background-color: rgba(0, 0, 0, .7);
            margin-left: 20px;
            float: left;
            border-radius: 20px;
            border: solid 1px #ecedee;
        }
        
        #text_color
        {
            color: white;
        }
        
        #session_container
        {
            width: 1125px;
            height: 70px;
            margin-top: 200px;
            margin-left: 150px;
        }
        
        #session_selection
        {
            width: 255px;
            height: 60px;
            margin-left: 20px;
            float: left;
        }
        
        #table_content_container
        {
            width: 1125px;
            height: 70px;
            margin: auto;
            margin-left: 110px;
        }
        
        #table_content
        {
            width: 140px;
            height: 60px;
            background-color: rgba(255,255,255,0.5);
            margin-left: 20px;
            margin-top: 30px;
            float: left;
            border-radius: 20px;
            border: solid 1px #8b8a90;
        }
        
        #table_content_title
        {
            width: 440px;
            height: 60px;
            background-color: rgba(255,255,255,0.5);
            margin-left: 20px;
            margin-top: 30px;
            float: left;
            border-radius: 20px;
            border: solid 1px #8b8a90;
        }
        
        #box_align
        {
            width: 20px;
            height: 20px;
            margin-top: 20px;
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
        
        #message
        {
            width: 1125px;
            height: 80px;
            margin-top: 300px;
            margin-left: 110px;
            text-align: center;
            border-radius: 20px;
        }
        
        #text_alert
        {
            color: #ff7e7e;
        }
        
        #text
        {
            color: #b8dd79;
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
            
            if ($total_credit > 24)
            {
                ?>
            
                <div id="message">
                   <h1 align='center' id="text_alert"> Please select courses having less than or equal to 24.00 credit in total.</h1>
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
                
                $semester = $_SESSION['semester'];
        
                $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');
                
                $query = "DELETE FROM registered_courses WHERE 1";
                
                mysqli_query($connection, $query);
        
                $query_1 = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND semester = '$semester' AND (status = 'Backlog' OR status = 'Incomplete')";

                $result = mysqli_query($connection, $query_1);
                
                $index = 0;
            
                while ($status = mysqli_fetch_assoc($result))
                {
                    $course_no = $status['course_no'];
                    $course_title = $status['course_title'];
                    $year = $status['year'];
                    
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

	</div>

	
   
   
   
   

</body>
</html>

