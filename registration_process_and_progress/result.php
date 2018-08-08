<?php

    session_start();

    $full_info = $_SESSION['full_info'];
    $roll = $full_info['roll'];
    $dept = $full_info['dept'];
    
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



		<!-- ========================== Year and Semester Selection ============================== -->

		<section id="result">

			 <?php
    
        $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');
    
        $cgpa = 0;
        $credit_for_cgpa = 0;
    
        for ($year = 1, $end = 0; $end == 0; $year++)
        {
            for ($semester = 1; $semester<=2; $semester++)
            {

                $query = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND year='$year' AND semester = '$semester' ";
                
                $result = mysqli_query($connection, $query);
                
                $result_for_test = mysqli_query($connection, $query);
                
                $test = mysqli_fetch_array($result_for_test);
                
                if (empty($test))
                {
                    $end = 1;
                    break;
                }
                else
                {
                	if ($year === 1 && $semester === 1) {

                	}
                	else
                	{
                		?>
                       <br> <br> <br> <br> <br> <br> <br> <br>
                       <?php
                	}

                	?>
                    
                        <h1 align = "center"> <?php echo $year." Year ".$semester." Semester Result" ?></h1> 

                        <div id="table_header_container">

                              <div id="title_small">
                                  <h3 align='center' id="text_color"> Code </h3>
                              </div>
                              <div id="title_large">
                                  <h3 align='center' id="text_color"> Course Name </h3>
                              </div>
                              <div id="title_small">
                                  <h3 align='center' id="text_color"> Credit </h3>
                              </div>
                              <div id="title_small">
                                  <h3 align='center' id="text_color"> GPA </h3>
                              </div>
                              <div id="title_small">
                                  <h3 align='center' id="text_color"> Grade </h3>
                              </div>

                        </div>



                    <?php

                               $gpa = 0.00;
                               $total_credit = 0;
                               $total_sum_for_calculate_gpa = 0;    
                               $total_real_credit = 0;


                               while ($status = mysqli_fetch_assoc($result))
                               {
                                   $total_real_credit = $total_real_credit + $status['credit'];
                                   
                                   if ($status['status'] !== "Incomplete" && !empty ($status['letter_grade']))
                                   {
                                       
                                   ?>
                                       <div id="table_content_container">

                                       <div id="table_content">
                                            <h4 align='center'> <?php echo $status['course_no']; ?> </h4>
                                       </div>
                                       <div id="table_content_title">
                                            <h4 align='center'> <?php echo $status['course_title']; ?> </h4>
                                       </div>
                                       <div id="table_content">
                                            <h4 align='center'> 
                                            
                                            <?php 
                                                echo $status['credit'];
                                       
                                                if ($status['status'] !== "Backlog")
                                                {
                                                    $total_sum_for_calculate_gpa = $total_sum_for_calculate_gpa + ($status['gpa'] * $status['credit']);
                                       
                                                    $total_credit = $total_credit + $status['credit'];
                                                }
                                            ?> 
                                            
                                            </h4>
                                       </div>
                                       <div id="table_content">
                                            <h4 align='center'> <?php echo $status['gpa']; ?> </h4>
                                       </div>
                                       <div id="table_content">
                                            <h4 align='center'> <?php echo $status['letter_grade']; ?> </h4>
                                       </div>

                                   </div>
                                   
                                   
                                   <?php
                                       
                                   }

                                   

                                   
                               }
                    
                        $gpa = $total_sum_for_calculate_gpa/$total_credit;
                    
                        if ($year == 1 && $semester == 1)
                        {
                            $cgpa = $gpa;
                        }
                        else
                        {
                            $cgpa = ($cgpa * $credit_for_cgpa + $gpa * $total_credit) / ($credit_for_cgpa + $total_credit);
                        }
                    
                        ?>
                    
                        <div id="cgpa_info_left">
                            <?php echo "Total Credit: ".$total_real_credit; ?>
                        </div>
                        <div id="cgpa_info_left">
                            <?php echo "Earned Credit: ".$total_credit; ?>
                        </div>
                        <div id="cgpa_info_right">
                            <?php echo "CGPA: ".number_format($cgpa, 2); ?>
                        </div>
                        <div id="cgpa_info_right">
                            <?php echo "GPA: ".number_format($gpa, 2); ?>
                        </div>
                        
                        <?php
                    
                        $credit_for_cgpa = $credit_for_cgpa + $total_credit;
                    
                }
            }
        }


                        ?> 

		</section>


		<br><br><br><br>




		<!-- ========================== Footer ============================== -->
	    
		<footer>
			<p>
				Khulna University of Engineering & Technology
			</p> 
		</footer>



</body>
</html>