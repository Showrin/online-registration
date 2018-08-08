<?php

    session_start();

    $full_info = $_SESSION['full_info'];

?>






<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title> <?php echo $full_info['name']; ?> </title>
	    <link rel="stylesheet" type="text/css" href="../css/main_style.css">
	</head>

	<body>

		

		<!-- ========================== Header ============================== -->

		<header>
			<a href="profile.php"> <img src="../images/kuet_logo.png"> </a>

			<nav>
				<ul>
					<li><a href="profile.php" id="page_marker">PROFILE</a></li>
					<li><a href="../registration_process_and_progress/course_selection.php">REGISTRATION</a></li>
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
					<a href="profile.php"> <?php echo $full_info['name']; ?> </a>
				</p>
			</div> <br>


			<!-- ======== Info Showing ========== -->

			<p id="text"> 
				<b>Roll: </b> <?php echo $full_info['roll']; ?> 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<b>Department: </b> <?php echo $full_info['dept']; ?> 
			</p>
			<p id="text"> 
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

					
		</section>




		<!-- ========================== Footer ============================== -->
	    
		<footer>
			<p>
				Khulna University of Engineering & Technology
			</p> 
		</footer>



	</body>
</html>