<?php
    
    session_start();

    $full_info = $_SESSION['full_info'];
    $course_ammount = $_SESSION['course_ammount'];
    $credits = $_SESSION['credits'];
    
?>




<!DOCTYPE html>
<html>
<head>
	<title>Course Selection</title>
	<link rel="stylesheet" type="text/css" href="../css/main_style.css">
</head>
<body>


	<!-- ========================== Header ============================== -->

		<header>
			<a href="../profile/profile.php"> <img src="../images/kuet_logo.png"> </a>

			<nav>
				<ul>
					<li><a href="../profile/profile.php">PROFILE</a></li>
					<li><a href="../registration_process_and_progress/course_selection.php" id="page_marker">REGISTRATION</a></li>
					<li><a href="../registration_process_and_progress/result.php">RESULT</a></li>
					<li><a href="#">LIBRARY</a></li>
					<li><a href="../login/logout.php">LOGOUT</a></li>
				</ul>
			</nav>
		</header>



		<!-- ========================== Cover ============================== -->

		<section id="cover">

		</section>




		<!-- ========================== Cover ============================== -->

		<section id="info">


			<!-- ======== Image Showing ========= -->

			<div id="pro_pic">

				<?php

					$folder = "../profile/profile_pic/";
					$file = $full_info['roll'] . ".jpg";

					if (is_dir($folder))
					{
						if ($open = opendir($folder))
						{
							echo '<img src = "../profile/profile_pic/' . $file . '" >';
						}
					} 
				?>

			</div>


			<!-- ======== Name Showing ========== -->

			<div id="pro_name">
				<p>
					<a href="../profile/profile.php"> <?php echo $full_info['name']; ?> </a>
				</p>
			</div> <br>

		</section>



		<!-- ========================== Validation ============================== -->
		<section id="after_4-2_course">
			
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

		                $query_1 = "DELETE FROM registration_progress WHERE roll = '$roll'";
		        
		                mysqli_query($connection, $query_1);

		                $query_2 = "INSERT INTO registration_progress (roll, hall_approval, advisor_approval, head_approval, edu_section_approval, bank_approval, bank_reciept_pdf) VALUES ('$roll', '', '', '', '', '', '')";

		                mysqli_query($connection, $query_2);


		            ?>
		            
		            <div id="message">
		               <h1 align='center' id="text"> Your course selection process has been completed          successfully.<br>Now go to the next step.</h1>
		            </div>
		            
		            <form action="progress.php" method="post">
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


		</section>




    <!-- ========================== Footer ============================== -->
	    
		<footer>
			<p>
				Khulna University of Engineering & Technology
			</p> 
		</footer>



</body>
</html>
