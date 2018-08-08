<?php

    session_start();

    $full_info = $_SESSION['full_info'];
    $roll = $_SESSION['roll'];
    $dept = $_SESSION['dept'];
    

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
            height: 90px;
            margin-top: 150px;
            margin-left: 110px;
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

	</div>

	<div id="session_container">
       
       <form action="course_selection.php" method="post">
           
           <div id="session_selection">
             
               <center>
              
               <p> <b> <font size="4" color="white"> Session: </font> </b>
               
               <select name="session" style="border: none; outline: none; background: rgba(255,255,255, .3); height: 30px; width: 150px; border-radius: 10px">
                   
                   <option value="2017-2018"> 2017-2018 </option>
                   <option value="2016-2017"> 2016-2017 </option>
                   <option value="2015-2016"> 2015-2016 </option>
                   <option value="2014-2015"> 2014-2015 </option>
                   
               </select>
               
               </p>
               
               </center>
               
           </div>
           
           <div id="session_selection">
             
               <center>
              
               <p> <b> <font size="4" color="white"> Year: </font> </b>
               
               <select name="year" style="border: none; outline: none; background: rgba(255,255,255, .3); height: 30px; width: 150px; border-radius: 10px">
                   
                   <option value="1"> First </option>
                   <option value="2"> Second </option>
                   <option value="3"> Third </option>
                   <option value="4"> Fourth </option>
                   <option value="5"> Fifth </option>
                   
               </select>
               
               </p>
               
               </center>
               
           </div>
           
           <div id="session_selection">
             
               <center>
              
               <p> <b> <font size="4" color="white"> Semester: </font> </b>
               
               <select name="semester" style="border: none; outline: none; background: rgba(255,255,255, .3); height: 30px; width: 150px; border-radius: 10px">
                   
                   <option value="1"> First </option>
                   <option value="2"> Second </option>
                   <option value="Backlog"> Backlog </option>
                   <option value="S_Backlog"> Special Backlog </option>
                   
               </select>
               
               </p>
               
               </center>
               
           </div>
           
           <div id="session_selection">
             
               <center> 
               
               <p>
              
               <input type="submit" name="show" value="Show" style="width: 100px; height: 30px; background: transparent; border: solid 1px white; outline: none; border-radius: 10px; color: white">
               
               </p>
               
               </center>
               
           </div>
           
       </form>
       
   </div>
   
   
   
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

</body>
</html>