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




		<!-- ========================== Switching To Progress Page ============================== -->

		<section id="switching_apply_to_progress">
			
			<a href="" id="apply_btn"> Apply </a>
			<a href="progress.php" id="progress_btn"> Progress </a>

		</section>



		<!-- ========================== Year and Semester Selection ============================== -->

		<section id="yr_sem_selection">

			<form action="course_selection.php" method="post">
	           
               <p> <b> Session: </b>
               
               <select name="session">
                   
                   <option value="2017-2018"> 2017-2018 </option>
                   <option value="2016-2017"> 2016-2017 </option>
                   <option value="2015-2016"> 2015-2016 </option>
                   <option value="2014-2015"> 2014-2015 </option>
                   
               </select>
               
               
               <b> Year: </b>
               
               <select name="year">
                   
                   <option value="1"> First </option>
                   <option value="2"> Second </option>
                   <option value="3"> Third </option>
                   <option value="4"> Fourth </option>
                   <option value="5"> Fifth </option>
                   
               </select>
               
               
               <b> Semester: </b>
               
               <select name="semester">
                   
                   <option value="1"> First </option>
                   <option value="2"> Second </option>
                   <option value="Backlog"> Backlog </option>
                   <option value="S_Backlog"> Special Backlog </option>
                   
               </select>
               
               
               <input type="submit" name="show" value="Show">
               
    		</form>
			
		


			<?php
    
		        if (isset($_POST['show']))
		        {
		    
		                $session = $_POST['session'];
		                $year = $_POST['year'];
		                $semester = $_POST['semester'];
		            
		                $_SESSION['session'] = $session;
		                $_SESSION['year'] = $year;
		                $_SESSION['semester'] = $semester;
		            
		                
		                if ($year > 4)
		                {

		                    if ($semester === "1")
		                    {
		                        $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

		                        $query = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND semester = '$semester' AND (status = 'Backlog' OR status = 'Incomplete')";

		                        $result = mysqli_query($connection, $query);

		                        ?>


		                        <div id="table_header_container">

		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Status </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Code </h3>
		                              </div>
		                              <div id="title_large">
		                                  <h3 align='center' id="text_color"> Title </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Credit </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Remark </h3>
		                              </div>

		                        </div>



		                       <form action="after_4.2_course_selection_validation.php" method="post">

		                          <?php

		                               $credits = array();
		                               $index = 0;


		                               while ($status = mysqli_fetch_assoc($result))
		                               {
		                                   ?>

		                                   <div id="table_content_container">

		                                       <div id="table_content">
		                                            <center>
		                                            <input type="checkbox" name="course[]" value="1" id="box_align">
		                                            <input type="hidden" name="course[]" value="0">
		                                            </center>
		                                       </div>
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
		                                                $credits[$index] = $status['credit'];
		                                                $index++;
		                                            ?> 
		                                            </h4>
		                                       </div>
		                                       <div id="table_content">
		                                            <h4 align='center'> <?php echo $status['status']; ?> </h4>
		                                       </div>

		                                   </div>

		                                   <?php
		                               }

		                        $_SESSION['credits'] = $credits;
		                        $_SESSION['course_ammount'] = $index;


		                        ?>


		                        <div>
		                            <center>
		                            <input type="submit" name="submit" value="Submit" id="submit_large_button">
		                            </center>
		                        </div>

		                        </form>

		                        <?php
		                    }
		                    else if ($semester === "2")
		                    {
		                        $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

		                        $query = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND semester = '$semester' AND (status = 'Backlog' OR status = 'Incomplete')";

		                        $result = mysqli_query($connection, $query);

		                        ?>


		                        <div id="table_header_container">

		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Status </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Code </h3>
		                              </div>
		                              <div id="title_large">
		                                  <h3 align='center' id="text_color"> Title </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Credit </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Remark </h3>
		                              </div>

		                        </div>



		                       <form action="after_4.2_course_selection_validation.php" method="post">

		                          <?php

		                               $credits = array();
		                               $index = 0;


		                               while ($status = mysqli_fetch_assoc($result))
		                               {
		                                   ?>

		                                   <div id="table_content_container">

		                                       <div id="table_content">
		                                            <center>
		                                            <input type="checkbox" name="course[]" value="1" id="box_align">
		                                            <input type="hidden" name="course[]" value="0">
		                                            </center>
		                                       </div>
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
		                                                $credits[$index] = $status['credit'];
		                                                $index++;
		                                            ?> 
		                                            </h4>
		                                       </div>
		                                       <div id="table_content">
		                                            <h4 align='center'> <?php echo $status['status']; ?> </h4>
		                                       </div>

		                                   </div>

		                                   <?php
		                               }

		                        $_SESSION['credits'] = $credits;
		                        $_SESSION['course_ammount'] = $index;


		                        ?>


		                        <div>
		                            <center>
		                            <input type="submit" name="submit" value="Submit" id="submit_large_button">
		                            </center>
		                        </div>

		                        </form>

		                        <?php
		                    }
		                    else
		                    {
		                        ?>
		            
		                        <div id="message">
		                           <h1 align='center' id="text_alert"> No relevent courses. Select correct catagories</h1>
		                        </div>

		                        <?php
		                    }
		                    
		                }
		                else
		                {
		                    if ($semester === "Backlog")
		                    {
		                        $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

		                        $query = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND status = '$semester'";

		                        $result = mysqli_query($connection, $query);

		                        ?>


		                        <div id="table_header_container">

		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Status </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Code </h3>
		                              </div>
		                              <div id="title_large">
		                                  <h3 align='center' id="text_color"> Title </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Credit </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Remark </h3>
		                              </div>

		                        </div>



		                       <form action="backlog_special_backlog_course_selection_validation.php" method="post">

		                          <?php

		                               $credits = array();
		                               $index = 0;


		                               while ($status = mysqli_fetch_assoc($result))
		                               {
		                                   ?>

		                                   <div id="table_content_container">

		                                       <div id="table_content">
		                                            <center>
		                                            <input type="checkbox" name="course[]" value="1" id="box_align">
		                                            <input type="hidden" name="course[]" value="0">
		                                            </center>
		                                       </div>
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
		                                                $credits[$index] = $status['credit'];
		                                                $index++;
		                                            ?> 
		                                            </h4>
		                                       </div>
		                                       <div id="table_content">
		                                            <h4 align='center'> <?php echo $status['status']; ?> </h4>
		                                       </div>

		                                   </div>

		                                   <?php
		                               }

		                        $_SESSION['credits'] = $credits;
		                        $_SESSION['course_ammount'] = $index;


		                        ?>


		                        <div>
		                            <center>
		                            <input type="submit" name="submit" value="Submit" id="submit_large_button">
		                            </center>
		                        </div>

		                        </form>

		                        <?php
		                    }
		                    else if ($semester === "S_Backlog")
		                    {
		                        $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

		                        $query = "SELECT * FROM registered_courses_result WHERE roll = '$roll' AND status = 'Backlog'";

		                        $result = mysqli_query($connection, $query);

		                        ?>


		                        <div id="table_header_container">

		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Status </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Code </h3>
		                              </div>
		                              <div id="title_large">
		                                  <h3 align='center' id="text_color"> Title </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Credit </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Remark </h3>
		                              </div>

		                        </div>



		                       <form action="backlog_special_backlog_course_selection_validation.php" method="post">

		                          <?php

		                               $credits = array();
		                               $index = 0;


		                               while ($status = mysqli_fetch_assoc($result))
		                               {
		                                   ?>

		                                   <div id="table_content_container">

		                                       <div id="table_content">
		                                            <center>
		                                            <input type="checkbox" name="course[]" value="1" id="box_align">
		                                            <input type="hidden" name="course[]" value="0">
		                                            </center>
		                                       </div>
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
		                                                $credits[$index] = $status['credit'];
		                                                $index++;
		                                            ?> 
		                                            </h4>
		                                       </div>
		                                       <div id="table_content">
		                                            <h4 align='center'> <?php echo $status['status']; ?> </h4>
		                                       </div>

		                                   </div>

		                                   <?php
		                               }

		                        $_SESSION['credits'] = $credits;
		                        $_SESSION['course_ammount'] = $index;


		                        ?>


		                        <div>
		                            <center>
		                            <input type="submit" name="submit" value="Submit" id="submit_large_button">
		                            </center>
		                        </div>

		                        </form>

		                        <?php
		                    }
		                    else
		                    {
		                        $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

		                        $query = "SELECT * FROM course_table WHERE dept = '$dept' AND year = '$year' AND semester = '$semester'";

		                        $result = mysqli_query($connection, $query);

		                        ?>


		                        <div id="table_header_container">

		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Status </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Code </h3>
		                              </div>
		                              <div id="title_large">
		                                  <h3 align='center' id="text_color"> Title </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Credit </h3>
		                              </div>
		                              <div id="title_small">
		                                  <h3 align='center' id="text_color"> Remark </h3>
		                              </div>

		                        </div>



		                       <form action="course_selection_validation.php" method="post">

		                          <?php

		                               $credits = array();
		                               $index = 0;


		                               while ($status = mysqli_fetch_assoc($result))
		                               {
		                                   ?>

		                                   <div id="table_content_container">

		                                       <div id="table_content">
		                                            <center>
		                                            <input type="checkbox" name="course[]" value="1" id="box_align">
		                                            <input type="hidden" name="course[]" value="0">
		                                            </center>
		                                       </div>
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
		                                                $credits[$index] = $status['credit'];
		                                                $index++;
		                                            ?> 
		                                            </h4>
		                                       </div>
		                                       <div id="table_content">
		                                            <h4 align='center'> <?php echo $status['status']; ?> </h4>
		                                       </div>

		                                   </div>

		                                   <?php
		                               }

		                        $_SESSION['credits'] = $credits;
		                        $_SESSION['course_ammount'] = $index;


		                        ?>


		                        <div>
		                            <center>
		                            <input type="submit" name="submit" value="Submit" id="submit_large_button">
		                            </center>
		                        </div>

		                        </form>

		                        <?php
		                    }
		                }
		            
		                

		                
		            
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