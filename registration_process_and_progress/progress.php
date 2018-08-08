<?php

    session_start();

    $full_info = $_SESSION['full_info'];
    $roll = $full_info['roll'];
    
    $connection = mysqli_connect('localhost', 'root', '',  'kuet_registration_database');

    if (isset($_POST['btn']))
    {
        header("Location: ../registration_process_and_progress/invoice_pdf.php");
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

		<section id="progress">


			<div id="title_container">

			      <div id="title" class="left_margin">
			          <h3 align='center' id="text_color"> Hall Approval </h3>
			      </div>

			      <div id="title">
			          <h3 align='center' id="text_color"> Advisor Approval </h3>
			      </div>

			      <div id="title">
			          <h3 align='center' id="text_color"> Head Approval </h3>
			      </div>

			      <div id="title">
			          <h3 align='center' id="text_color"> Edu-Section Approval </h3>
			      </div>

			      <div id="title">
			          <h3 align='center' id="text_color"> Bank Approval </h3>
			      </div>

			</div>



			<div id="progress_container">
         
		        <?php
		    
		           $query = "SELECT * FROM registration_progress WHERE roll = '$roll'";
		            
		           $result = mysqli_query($connection, $query);
		          
		           $status = mysqli_fetch_assoc($result);
		          
		        ?>
           
	          	<div id="progress_box" style="margin-left: 13%">
	           
		          <?php
		            
		            if ($status['hall_approval'] === "Approved")
		            {
		                ?>
		                
		                
		                <h3 align='center' id="text_color_approved"> 
		          
		                    <?php
		                        echo $status['hall_approval'];
		                    ?>
		                
		                </h3>
		                
		                </div>
		                
		                
		                <div id="progress_box">
		                
		                <?php
		                
		                    if ($status['advisor_approval'] === "Approved")
		                    {
		                        ?>
		                
		                        <h3 align='center' id="text_color_approved"> 
		          
		                        <?php
		                            echo $status['advisor_approval'];
		                        ?>
		                
		                        </h3>
		                        </div>
		                        
		                        <div id="progress_box">
		                
		                        <?php
		                
		                            if ($status['head_approval'] === "Approved")
		                            {
		                                ?>
		                
		                                <h3 align='center' id="text_color_approved"> 
		          
		                                <?php
		                                    echo $status['head_approval'];
		                                ?>
		                    
		                                </h3>
		                                </div>
		                        
		                                <div id="progress_box">
		                
		                                <?php

		                                if ($status['edu_section_approval'] === "Approved")
		                                {
		                                    ?>

		                                    <h3 align='center' id="text_color_approved"> 

		                                    <?php
		                                        echo $status['edu_section_approval'];
		                                    ?>

		                                    </h3>
		                                    </div>

		                                    <div id="progress_box">
		                
		                                    <?php

		                                    if ($status['bank_approval'] === "Approved")
		                                    {
		                                        ?>

		                                        <h3 align='center' id="text_color_approved"> 

		                                        <?php
		                                            echo $status['bank_approval'];
		                                        ?>

		                                        </h3>
		                                        </div>
		                                        
		                                        <?php
		                                            
		                                            
		                                        
		                                    }
		                                    else if ($status['bank_approval'] === "Processing")
		                                    {
		                                        ?>

		                                        <h3 align='center' id="text_color_processing"> 

		                                        <?php
		                                            echo $status['bank_approval'];
		                                        ?>

		                                        </h3>
		                                        </div>

		                                        <?php
		                                    }
		                                    else if (empty($status['bank_approval']))
		                                    {
		                                        ?>

		                                        <h3 align='center'>
		                                        <a href="login.php" align='center' id="text_color_apply">

		                                        <?php
		                                            echo "Apply";
		                                        ?>

		                                        </a>
		                                        </h3>
		                                        </div>

		                                        <?php
		                                    }
		                                    else 
		                                    {
		                                        ?>

		                                        <h3 align='center' id="text_color_disapproved"> 

		                                        <?php
		                                            echo $status['bank_approval'];
		                                        ?>

		                                        </h3>
		                                        </div>

		                                        <?php
		                                    }

		                                }
		                                else if ($status['edu_section_approval'] === "Processing")
		                                {
		                                    ?>

		                                    <h3 align='center' id="text_color_processing"> 

		                                    <?php
		                                        echo $status['edu_section_approval'];
		                                    ?>

		                                    </h3>
		                                    </div>

		                                    <?php
		                                }
		                                else if (empty($status['edu_section_approval']))
		                                {
		                                    ?>

		                                    <h3 align='center'>
		                                    <a href="" align='center' id="text_color_apply">

		                                    <?php
		                                        echo "Apply";
		                                    ?>

		                                    </a>
		                                    </h3>
		                                    </div>

		                                    <?php
		                                }
		                                else 
		                                {
		                                    ?>

		                                    <h3 align='center' id="text_color_disapproved"> 

		                                    <?php
		                                        echo $status['edu_section_approval'];
		                                    ?>

		                                    </h3>
		                                    </div>

		                                    <?php
		                                }
		                                
		                            }
		                            else if ($status['head_approval'] === "Processing")
		                            {
		                                ?>
		                
		                                <h3 align='center' id="text_color_processing"> 
		          
		                                <?php
		                                    echo $status['head_approval'];
		                                ?>
		                
		                                </h3>
		                                </div>
		                        
		                                <?php
		                            }
		                            else if (empty($status['head_approval']))
		                            {
		                                ?>
		                
		                                <h3 align='center'>
		                                <a href="login.php" align='center' id="text_color_apply">
		                    
		                                <?php
		                                    echo "Apply";
		                                ?>
		                        
		                                </a>
		                                </h3>
		                                </div>
		                
		                                <?php
		                            }
		                            else 
		                            {
		                                ?>
		                
		                                <h3 align='center' id="text_color_disapproved"> 
		          
		                                <?php
		                                    echo $status['head_approval'];
		                                ?>
		                
		                                </h3>
		                                </div>
		                                
		                                <?php
		                            }
		                                
		                    }
		                    else if ($status['advisor_approval'] === "Processing")
		                    {
		                        ?>
		                
		                        <h3 align='center' id="text_color_processing"> 
		          
		                        <?php
		                            echo $status['advisor_approval'];
		                        ?>
		                
		                        </h3>
		                        </div>
		                
		                        <?php
		                    }
		                    else if (empty($status['advisor_approval']))
		                    {
		                        ?>
		                
		                        <h3 align='center'>
		                        <a href="advisor_selection.php" align='center' id="text_color_apply">
		                    
		                        <?php
		                            echo "Apply";
		                        ?>
		                    
		                        </a>
		                        </h3>
		                        </div>
		                
		                        <?php
		                    }
		                    else 
		                    {
		                        ?>
		                
		                        <h3 align='center' id="text_color_disapproved"> 
		          
		                        <?php
		                            echo $status['advisor_approval'];
		                        ?>
		                
		                        </h3>
		                        </div>
		                
		                        <?php
		                    }
		    
		            }
		            else if ($status['hall_approval'] === "Processing")
		            {
		                ?>
		                
		                <h3 align='center' id="text_color_processing"> 
		          
		                    <?php
		                        echo $status['hall_approval'];
		                    ?>
		                
		                </h3>
		                </div>
		                
		                <?php
		            }
		            else 
		            {
		                ?>
		                
		                <h3 align='center'>
		                <a href="hall_approval.php" align='center' id="text_color_apply">
		                    
		                    <?php
		                        echo "Apply";
		                    ?>
		                    
		                </a>
		                </h3>
		                </div>
		                
		                <?php

		            		}
		              
		            ?>
      
 	 		</div>   

   
			   <div id="alert_message">
			      <h1 align='center' id="text_color_disapproved">
			       <?php
			       
			           if ($status['hall_approval'] === "Disapproved")
			           {
			               echo "Your hall dues is " . $_SESSION['hall_dues'] . " Taka. Your hall dues should be less than or equal to 3000 Taka.";
			           }
			       
			       ?>
			      </h1>
			   </div>
			   
			   <div>
			      <?php
			       
			        if ($status['edu_section_approval'] === "Approved")
			        {
			            ?>
			            <form action="progress.php" method="post">
			               <center>
			                <button name="btn" value="btn" id="btn"><font color = "white" size = "3"><b>Collect Your Reciept</b></font></button>
			                </center>
			            </form>                    

			            <?php
			        }
			       
			       ?>
			   </div>
			   
			   <?php
			       
			        if ($status['bank_approval'] === "Approved")
			        {
			            ?>

			            <div id="message">
			                <h1 align='center' id="text"> Your registration process has been completed successfully</h1>
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