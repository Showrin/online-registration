<?php

    session_start();

    $full_info = $_SESSION['full_info'];
    $roll = $full_info['roll'];

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




		<!-- ========================== Switching To Apply Page ============================== -->

		<section id="switching_progress_to_apply">
			
			<a href="course_selection.php" id="apply_btn"> Apply </a>
			<a href="" id="progress_btn"> Progress </a>

		</section>



		<!-- ========================== Year and Semester Selection ============================== -->

		<section id="advisor_selection">


			<div id="selection_container">
      
		      <center>
		       
		       <form action="advisor_approval.php" method="post">
		           
		           <center>
		              
		               <p> <b> <font size="4"> Advisor: </font> </b>
		               
		               <select name="session" id="drop_down_style">
		                   
		                   <option value="Mr. W"> Mr. W </option>
		                   <option value="Mr. X"> Mr. X </option>
		                   <option value="Mr. Y"> Mr. Y </option>
		                   <option value="Mr. Z"> Mr. Z </option>
		                   
		               </select>
		               
		               </p>
		               
		               </center>
		           
		        
		             
		               <center> 
		               
		               <p>
		              
		                   <input type="submit" name="submit" value="Submit">
		               
		               </p>
		               
		               </center>

		           
		       </form>
		       
		       </center>
		       
		   </div>


		</section>






		<!-- ========================== Footer ============================== -->
	    
		<footer>
			<p>
				Khulna University of Engineering & Technology
			</p> 
		</footer>



</body>
</html>