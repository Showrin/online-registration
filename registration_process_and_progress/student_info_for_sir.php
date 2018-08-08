<?php

    session_start();

    $full_info_teacher = $_SESSION['full_info_teacher'];
    $name = $full_info_teacher['name'];

    $roll = $_GET['roll'];
    
    $connection = mysqli_connect('localhost', 'root', '',  'kuet_registration_database');

    if (isset($_POST['approve']))
    {
        $roll = $_POST['approve'];

        $connection = mysqli_connect('localhost','root','','kuet_registration_database');

        $query = "SELECT * FROM advisor_head_approval WHERE applicant_roll = '$roll'";
            
        $result = mysqli_query($connection, $query);
        
        if (mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['full_info_student'] = $row;
        }

        $query_1 = "UPDATE registration_progress SET advisor_approval = 'Approved' WHERE roll = '$roll'";

        mysqli_query($connection, $query_1);

        $query_2 = "UPDATE advisor_head_approval SET progress = 'Approved' WHERE applicant_roll = '$roll' AND requested_as = 'Advisor'";

        mysqli_query($connection, $query_2);
        
        header("Location: ../registration_process_and_progress/head_approval.php");
        
    }
    else if (isset($_POST['disapprove']))
    {
        $roll = $_POST['disapprove'];
        
        $connection = mysqli_connect('localhost','root','','kuet_registration_database');

        $query = "SELECT * FROM advisor_head_approval WHERE applicant_roll = '$roll'";
            
        $result = mysqli_query($connection, $query);
        
        if (mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['full_info_student'] = $row;
        }
        
        $query_1 = "UPDATE registration_progress SET advisor_approval = 'Disapproved' WHERE roll = '$roll'";

        mysqli_query($connection, $query_1);

        $query_2 = "UPDATE advisor_head_approval SET progress = 'Disapproved' WHERE applicant_roll = '$roll' AND requested_as = 'Advisor'";

        mysqli_query($connection, $query_2);
        
    }

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
			<a href=""> <img src="../images/kuet_logo.png"> </a>

			<nav>
				<ul>
					<li><a href="">PROFILE</a></li>
					<li><a href="#">Materials</a></li>
					<li><a href="#" id="page_marker">Notification</a></li>
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

				<img src="../images/sir.png">

			</div>


			<!-- ======== Name Showing ========== -->

			<div id="pro_name">
				<p>
					<a href=""> <?php echo $full_info_teacher['name']; ?> </a>
				</p>
			</div> <br>

		</section>




		<!-- ========================== Switching To Apply Page ============================== -->

		<?php

			if ($full_info_teacher['designation'] === "Head")
			{
				?>

				<section id="switching_advisor_to_head">
			
					<a href="" id="apply_btn"> Advisor </a>
					<a href="head_account.php" id="progress_btn"> Head </a>

				</section>

				<?php 
			}

		?>



		<!-- ========================== Cover ============================== -->

		<section id="info_for_sir">

			<?php

				$query = "SELECT * FROM student_info WHERE roll = '$roll'";
            
	            $result = mysqli_query($connection, $query);
	            
	            if (mysqli_num_rows($result))
	            {
	                $full_info = mysqli_fetch_assoc($result);
	            }
	            else 
	            {
	                $connect = false;
	            }

			?>


			<!-- ======== Image Showing ========= -->

			<div id="pro_pic">

				<?php

					$folder = "../profile/profile_pic/";
					$file = $roll . ".jpg";

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
					<a href=""><?php echo $full_info['name']; ?></a>
				</p>
			</div> <br>


			<!-- ======== Info Showing ========== -->

			<p id="text" style="margin-top: 20px;"> 
				<b>Roll: </b> <?php echo $full_info['roll']; ?> 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<b>Department: </b> <?php echo $full_info['dept']; ?> 
			</p>
			<p id="text" style="margin-top: 20px;"> 
				<b>Father: </b> <?php echo $full_info['father_name']; ?> 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<b>Mother: </b> <?php echo $full_info['mother_name']; ?> 
			</p>
			<p id="text"> 
				<b>Address: </b> <?php echo $full_info['address']; ?> 
			</p>
			<p id="text"> 
				<b>Residence: </b> <?php echo $full_info['hall']; ?> 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<b>Boarder No: </b> <?php echo $full_info['boarder_no']; ?> 
			</p>
			<p id="text"> 
				<b>Email: </b> <?php echo $full_info['email']; ?> 
				&nbsp; &nbsp; &nbsp;
				<b>Sex: </b> <?php echo $full_info['sex']; ?> 
			</p>

			<p id="text"> 
				<b>CGPA: </b> <?php include("cgpa_calculation.php"); ?> 
			</p>

					
		</section>



		<!-- ========================== Year and Semester Selection ============================== -->

		<section id="registered_course">

			<?php

				$query2 = "SELECT * FROM registered_courses WHERE roll = '$roll'";
            
	            $result2 = mysqli_query($connection, $query2);

			?>


			<h1>Registered Courses</h1>



			<div id="table_header_container">

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



	        <?php


                   while ($status = mysqli_fetch_assoc($result2))
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
                                ?> 
                                </h4>
                           </div>
                           <div id="table_content">
                                <h4 align='center'> <?php echo $status['status']; ?> </h4>
                           </div>

                       </div>

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