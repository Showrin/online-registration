<?php

    session_start();

    $full_info_teacher = $_SESSION['full_info_teacher'];
    $name = $full_info_teacher['name'];
    
    $connection = mysqli_connect('localhost', 'root', '',  'kuet_registration_database');

    if (isset($_POST['approve']))
    {
        $roll = $_POST['approve'];

        $query = "SELECT * FROM advisor_head_approval WHERE applicant_roll = '$roll' AND requested_as = 'Head'";
            
        $result = mysqli_query($connection, $query);
        
        if (mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['full_info_student'] = $row;
        }

        $query_1 = "UPDATE registration_progress SET head_approval = 'Approved' WHERE roll = '$roll'";

        mysqli_query($connection, $query_1);

        $query_2 = "UPDATE advisor_head_approval SET progress = 'Approved' WHERE applicant_roll = '$roll' AND requested_as = 'Head'";

        mysqli_query($connection, $query_2);
        
        header("Location: ../registration_process_and_progress/edu_section_approval.php");
        
    }
    else if (isset($_POST['disapprove']))
    {
        $roll = $_POST['disapprove'];
        
        $query = "SELECT * FROM advisor_head_approval WHERE applicant_roll = '$roll' AND requested_as = 'Head'";
            
        $result = mysqli_query($connection, $query);
        
        if (mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['full_info_student'] = $row;
        }
        
        $query_1 = "UPDATE registration_progress SET head_approval = 'Disapproved' WHERE roll = '$roll'";

        mysqli_query($connection, $query_1);

        $query_2 = "UPDATE advisor_head_approval SET progress = 'Disapproved' WHERE applicant_roll = '$roll' AND requested_as = 'Head'";

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

				<section id="switching_head_to_advisor">
			
					<a href="advisor_account.php" id="apply_btn"> Advisor </a>
					<a href="" id="progress_btn"> Head </a>

				</section>

				<?php 
			}

		?>



		<!-- ========================== Year and Semester Selection ============================== -->

		<section id="notification">


			<?php
    
			    $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

			    $query = "SELECT * FROM advisor_head_approval WHERE name = '$name' AND requested_as = 'Head'";

			    $result = mysqli_query($connection, $query);

			    ?>


			    <div id="table_header_container">

			        <div id="title_small" class="lefty">
			            <h3 align='center' id="text_color"> Roll </h3>
			        </div>
			        <div id="title_large">
			            <h3 align='center' id="text_color"> Name </h3>
			        </div>
			        <div id="title_small">
			            <h3 align='center' id="text_color"> Progress </h3>
			        </div>

			    </div>



			    

			    <?php

			        while ($status = mysqli_fetch_assoc($result))
			        {
			            ?>

			            <div id="table_content_container">

			                <div id="table_content" class="lefty">
			                    <h4 align='center'> <?php echo $status['applicant_roll']; ?> </h4>
			                </div>
			                <div id="table_content_title">
			                    <form action="head_account.php" method="post">
			                        <h4 align='left' id="content_style"> <font id="table_content_name"> <a href="<?php echo "student_info_for_head.php?roll=".$status['applicant_roll']; ?>"><?php echo $status['applicant_name']; ?></a> </font>
			                        
			                        <?php
			                        
			                        if ($status['progress'] !== "Approved")
			                        {
			                            ?>

			                            <button name="approve" class="approve_btn" value="<?php echo $status['applicant_roll']; ?>"> <font color="white"> Approve </font></button>
			                        
			                            <button name="disapprove" class="disapprove_btn" value="<?php echo $status['applicant_roll'] ?>"> <font color="white"> Disapprove </font> </button>

			                            <?php
			                        }
			            
			                        ?>
			                        
			                        </h4>
			                    </form>
			                </div>
			                
			                <?php
			            
			                    if ($status['progress'] === "Approved")
			                    {
			                        ?>
			                        
			                        <div id="table_content">
			                            <h4 align='center'> <font color = 'green'> <?php echo $status['progress']; ?> </font> </h4>
			                        </div>
			                        
			                        <?php
			                    }
			                    else if ($status['progress'] === "Disapproved")
			                    {
			                        ?>
			                        
			                        <div id="table_content">
			                            <h4 align='center'> <font color = 'red'> <?php echo $status['progress']; ?> </font> </h4>
			                        </div>
			                        
			                        <?php
			                    }
			                    else
			                    {
			                        ?>
			                        
			                        <div id="table_content">
			                            <h4 align='center'> <font color = 'orange'> <?php echo $status['progress']; ?> </font> </h4>
			                        </div>
			                        
			                        <?php
			                    }
			            
			                ?>

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