<?php

    session_start();

    $full_info = $_SESSION['full_info'];
    
    $roll = $full_info['roll'];
    $name = $full_info['name'];
    $dept = $full_info['dept'];

    $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

    $query = "SELECT * FROM registration_taka_summery WHERE year = '1' AND semester = '1'";

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc ($result);

    $total_taka = 0;

?>




<!DOCTYPE html>
<html>
<head>
	<title>HTML to PDF</title>
	
	<style>
    
        #table
        {
            width: 400px;
            height: 50px;
            border: 1px;
            border-collapse: collapse;
            border-color: black;
        }
        
        #portion
        {
            width: 500px;
            height: 1100px;
            float: left;
            margin-left: 10px;
        }
        
        #container
        {
            width: 2040px;
            height: 1100px;
        }
        
        #btn
        {
            width: 200px;
            height: 50px;
            background-color: darkolivegreen;
        }
    
    </style>
</head>
<body>
	<!-- 
	content of this area will be the content of your PDF file 
	-->
	<div id = "container">
	<div id="portion">
       
           <div style="margin-left:28px"> <br> Bank Scroll No:  </div>
           
           <div> 
               <center>
                   <h3>Khulna University of Engineering & Technology</h3>
                   <h4> Graduate Student's Admit Reciept </h4>
                   (Student's Copy)<br>
               </center>
           </div>
           
           <div>
           <table style="width:500px">
               <tr>
                   <td style="margin-left:28px; width:350px"><center> <br> <br> Name: <?php echo $name; ?> </center></td>
                   <td align="right" style="width:150px; padding-right:100px"> <br> <br> Roll: <?php echo $roll; ?></td>
               </tr>
           </table>
	       </div>
          
           <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> Dept: <?php echo $dept; ?> </td>
                   <td align="right"></td>
               </tr>
           </table>
	       </div>
          
          <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> <br> </td>
                   <td align="right"> <br> </td>
               </tr>
           </table>
	       </div>
           
           
           <div> 
               <center>
                   <table id = "table" border="1px">
                       <tr>
                           <th>Serial</th>
                           <th style="width:250px; height:25px">Description</th>
                           <th>Taka</th>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2589</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 1 </center></td>
                            <td style="width:250px; padding-left:10px">Admit fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['admit_fee'].".00";
                            $total_taka = $total_taka + $row['admit_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 2 </center></td>
                            <td style="width:250px; padding-left:10px">Tution</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['tution'].".00";
                            $total_taka = $total_taka + $row['tution']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 3 </center></td>
                            <td style="width:250px; padding-left:10px">Treatment fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['treatment_fee'].".00";
                            $total_taka = $total_taka + $row['treatment_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 4 </center></td>
                            <td style="width:250px; padding-left:10px">Marksheet Verification fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['marksheet_verification_fee'].".00";
                            $total_taka = $total_taka + $row['marksheet_verification_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 5 </center></td>
                            <td style="width:250px; padding-left:10px">Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['registration_fee'].".00";
                            $total_taka = $total_taka + $row['registration_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 6 </center></td>
                            <td style="width:250px; padding-left:10px">Exam fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['exam_fee'].".00"; 
                            $total_taka = $total_taka + $row['exam_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 7 </center></td>
                            <td style="width:250px; padding-left:10px">Grade Sheet</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['grade_sheet'].".00"; 
                            $total_taka = $total_taka + $row['grade_sheet']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 8 </center></td>
                            <td style="width:250px; padding-left:10px">Transportation Charge</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['transport_charge'].".00"; 
                            $total_taka = $total_taka + $row['transport_charge']; ?></td>
                       </tr>
                       
                       <tr>
                           <td style="width:60px"><center> 9 </center></td>
                            <td style="width:250px; padding-left:10px">Electricity</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['electricity'].".00"; 
                            $total_taka = $total_taka + $row['electricity']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 10 </center></td>
                            <td style="width:250px; padding-left:10px">Course Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['course_registration_fee'].".00"; 
                            $total_taka = $total_taka + $row['course_registration_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 11 </center></td>
                            <td style="width:250px; padding-left:10px">Internet fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['internet_fee'].".00"; 
                            $total_taka = $total_taka + $row['internet_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 1525</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 12 </center></td>
                            <td style="width:250px; padding-left:10px">Security</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['security'].".00"; 
                            $total_taka = $total_taka + $row['security']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2143</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 13 </center></td>
                            <td style="width:250px; padding-left:10px">Relegion fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['relegion_fee'].".00"; 
                            $total_taka = $total_taka + $row['relegion_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2303</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 14 </center></td>
                            <td style="width:250px; padding-left:10px">Student Activities fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['student_activities'].".00"; 
                            $total_taka = $total_taka + $row['student_activities']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 15 </center></td>
                            <td style="width:250px; padding-left:10px">Literature fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['literature_fee'].".00"; 
                            $total_taka = $total_taka + $row['literature_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 16 </center></td>
                            <td style="width:250px; padding-left:10px">Sports fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['sports_fee'].".00"; 
                            $total_taka = $total_taka + $row['sports_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 17 </center></td>
                            <td style="width:250px; padding-left:10px">Annual fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['annual_fee'].".00"; 
                            $total_taka = $total_taka + $row['annual_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 6250</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 18 </center></td>
                            <td style="width:250px; padding-left:10px">Emergency Helping Fund</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['emergency_helping_fund'].".00"; 
                            $total_taka = $total_taka + $row['emergency_helping_fund']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7115</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 19 </center></td>
                            <td style="width:250px; padding-left:10px">Laboratory fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['laboratory_fee'].".00"; 
                            $total_taka = $total_taka + $row['laboratory_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7514</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 20 </center></td>
                            <td style="width:250px; padding-left:10px">Library fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['library_fee'].".00"; 
                            $total_taka = $total_taka + $row['library_fee']; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Total</b></center></td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $total_taka.".00"; ?></td>
                       </tr>
                       
                   </table>
               </center>
               
               <div style="margin-left:28px"> <br> <br> Student's signature: </div>
           
               <div>
               <table style="width:500px">
                   <tr>
                       <td><center> <br> <br> Education Section <br> KUET </center></td>
                       <td><center> <br> <br> Casheer <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                       <td><center> <br> <br> Manager <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                   </tr>
               </table>
               </div>
           </div>
           
           
	    

	</div>
	
	<div id="portion">
       
           <div style="margin-left:28px"> <br> Bank Scroll No:  </div>
           
           <div> 
               <center>
                   <h3>Khulna University of Engineering & Technology</h3>
                   <h4> Graduate Student's Admit Reciept </h4>
                   (Education Section's Copy)<br>
               </center>
           </div>
           
           <div>
           <table style="width:500px">
               <tr>
                   <td style="margin-left:28px; width:350px"><center> <br> <br> Name: <?php echo $name; ?> </center></td>
                   <td align="right" style="width:150px; padding-right:100px"> <br> <br> Roll: <?php echo $roll; ?></td>
               </tr>
           </table>
	       </div>
          
           <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> Dept: <?php echo $dept; ?> </td>
                   <td align="right"></td>
               </tr>
           </table>
	       </div>
          
          <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> <br> </td>
                   <td align="right"> <br> </td>
               </tr>
           </table>
	       </div>
           
           
           <div> 
               <center>
                   <table id = "table" border="1px">
                       <tr>
                           <th>Serial</th>
                           <th style="width:250px; height:25px">Description</th>
                           <th>Taka</th>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2589</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 1 </center></td>
                            <td style="width:250px; padding-left:10px">Admit fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['admit_fee'].".00";?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 2 </center></td>
                            <td style="width:250px; padding-left:10px">Tution</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['tution'].".00";?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 3 </center></td>
                            <td style="width:250px; padding-left:10px">Treatment fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['treatment_fee'].".00";?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 4 </center></td>
                            <td style="width:250px; padding-left:10px">Marksheet Verification fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['marksheet_verification_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 5 </center></td>
                            <td style="width:250px; padding-left:10px">Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['registration_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 6 </center></td>
                            <td style="width:250px; padding-left:10px">Exam fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['exam_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 7 </center></td>
                            <td style="width:250px; padding-left:10px">Grade Sheet</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['grade_sheet'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 8 </center></td>
                            <td style="width:250px; padding-left:10px">Transportation Charge</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['transport_charge'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                           <td style="width:60px"><center> 9 </center></td>
                            <td style="width:250px; padding-left:10px">Electricity</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['electricity'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 10 </center></td>
                            <td style="width:250px; padding-left:10px">Course Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['course_registration_fee'].".00";?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 11 </center></td>
                            <td style="width:250px; padding-left:10px">Internet fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['internet_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 1525</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 12 </center></td>
                            <td style="width:250px; padding-left:10px">Security</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['security'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2143</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 13 </center></td>
                            <td style="width:250px; padding-left:10px">Relegion fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['relegion_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2303</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 14 </center></td>
                            <td style="width:250px; padding-left:10px">Student Activities fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['student_activities'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 15 </center></td>
                            <td style="width:250px; padding-left:10px">Literature fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['literature_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 16 </center></td>
                            <td style="width:250px; padding-left:10px">Sports fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['sports_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 17 </center></td>
                            <td style="width:250px; padding-left:10px">Annual fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['annual_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 6250</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 18 </center></td>
                            <td style="width:250px; padding-left:10px">Emergency Helping Fund</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['emergency_helping_fund'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7115</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 19 </center></td>
                            <td style="width:250px; padding-left:10px">Laboratory fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['laboratory_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7514</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 20 </center></td>
                            <td style="width:250px; padding-left:10px">Library fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['library_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Total</b></center></td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $total_taka.".00"; ?></td>
                       </tr>
                       
                   </table>
               </center>
               
               <div style="margin-left:28px"> <br> <br> Student's signature: </div>
           
               <div>
               <table style="width:500px">
                   <tr>
                       <td><center> <br> <br> Education Section <br> KUET </center></td>
                       <td><center> <br> <br> Casheer <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                       <td><center> <br> <br> Manager <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                   </tr>
               </table>
               </div>
               
           </div>
           
           
	    

	</div>
	
	<div id="portion">
       
           <div style="margin-left:28px"> <br> Bank Scroll No:  </div>
           
           <div> 
               <center>
                   <h3>Khulna University of Engineering & Technology</h3>
                   <h4> Graduate Student's Admit Reciept </h4>
                   (Accounting Section's Copy)<br>
               </center>
           </div>
           
           <div>
           <table style="width:500px">
               <tr>
                   <td style="margin-left:28px; width:350px"><center> <br> <br> Name: <?php echo $name; ?> </center></td>
                   <td align="right" style="width:150px; padding-right:100px"> <br> <br> Roll: <?php echo $roll; ?></td>
               </tr>
           </table>
	       </div>
          
           <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> Dept: <?php echo $dept; ?> </td>
                   <td align="right"></td>
               </tr>
           </table>
	       </div>
          
          <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> <br> </td>
                   <td align="right"> <br> </td>
               </tr>
           </table>
	       </div>
           
           
           <div> 
               <center>
                   <table id = "table" border="1px">
                       <tr>
                           <th>Serial</th>
                           <th style="width:250px; height:25px">Description</th>
                           <th>Taka</th>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2589</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 1 </center></td>
                            <td style="width:250px; padding-left:10px">Admit fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['admit_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 2 </center></td>
                            <td style="width:250px; padding-left:10px">Tution</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['tution'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 3 </center></td>
                            <td style="width:250px; padding-left:10px">Treatment fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['treatment_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 4 </center></td>
                            <td style="width:250px; padding-left:10px">Marksheet Verification fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['marksheet_verification_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 5 </center></td>
                            <td style="width:250px; padding-left:10px">Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['registration_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 6 </center></td>
                            <td style="width:250px; padding-left:10px">Exam fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['exam_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 7 </center></td>
                            <td style="width:250px; padding-left:10px">Grade Sheet</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['grade_sheet'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 8 </center></td>
                            <td style="width:250px; padding-left:10px">Transportation Charge</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['transport_charge'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 9 </td>
                            <td style="width:250px; padding-left:10px">Electricity</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['electricity'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 10 </center></td>
                            <td style="width:250px; padding-left:10px">Course Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['course_registration_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 11 </center></td>
                            <td style="width:250px; padding-left:10px">Internet fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['internet_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 1525</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 12 </center></td>
                            <td style="width:250px; padding-left:10px">Security</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['security'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2143</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 13 </center></td>
                            <td style="width:250px; padding-left:10px">Relegion fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['relegion_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2303</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 14 </center></td>
                            <td style="width:250px; padding-left:10px">Student Activities fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['student_activities'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 15 </center></td>
                            <td style="width:250px; padding-left:10px">Literature fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['literature_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 16 </center></td>
                            <td style="width:250px; padding-left:10px">Sports fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['sports_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 17 </center></td>
                            <td style="width:250px; padding-left:10px">Annual fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['annual_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 6250</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 18 </center></td>
                            <td style="width:250px; padding-left:10px">Emergency Helping Fund</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['emergency_helping_fund'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7115</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 19 </center></td>
                            <td style="width:250px; padding-left:10px">Laboratory fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['laboratory_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7514</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 20 </center></td>
                            <td style="width:250px; padding-left:10px">Library fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['library_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Total</b></center></td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $total_taka.".00"; ?></td>
                       </tr>
                       
                   </table>
               </center>
               
               <div style="margin-left:28px"> <br> <br> Student's signature: </div>
           
               <div>
               <table style="width:500px">
                   <tr>
                       <td><center> <br> <br> Education Section <br> KUET </center></td>
                       <td><center> <br> <br> Casheer <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                       <td><center> <br> <br> Manager <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                   </tr>
               </table>
               </div>
               
           </div>
           
           
	    

	</div>
	
	<div id="portion">
       
           <div style="margin-left:28px"> <br> Bank Scroll No:  </div>
           
           <div> 
               <center>
                   <h3>Khulna University of Engineering & Technology</h3>
                   <h4> Graduate Student's Admit Reciept </h4>
                   (Bank Copy)<br>
               </center>
           </div>
           
           <div>
           <table style="width:500px">
               <tr>
                   <td style="margin-left:28px; width:350px"><center> <br> <br> Name: <?php echo $name; ?> </center></td>
                   <td align="right" style="width:150px; padding-right:100px"> <br> <br> Roll: <?php echo $roll; ?></td>
               </tr>
           </table>
	       </div>
          
           <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> Dept: <?php echo $dept; ?> </td>
                   <td align="right"></td>
               </tr>
           </table>
	       </div>
          
          <div>
           <table style="width:500px">
               <tr>
                   <td align="left" style="padding-left:63px"> <br> </td>
                   <td align="right"> <br> </td>
               </tr>
           </table>
	       </div>
           
           
           <div> 
               <center>
                   <table id = "table" border="1px">
                       <tr>
                           <th>Serial</th>
                           <th style="width:250px; height:25px">Description</th>
                           <th>Taka</th>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2589</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 1 </center></td>
                            <td style="width:250px; padding-left:10px">Admit fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['admit_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 2 </center></td>
                            <td style="width:250px; padding-left:10px">Tution</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['tution'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 3 </center></td>
                            <td style="width:250px; padding-left:10px">Treatment fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['treatment_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 4 </center></td>
                            <td style="width:250px; padding-left:10px">Marksheet Verification fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['marksheet_verification_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 5 </center></td>
                            <td style="width:250px; padding-left:10px">Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['registration_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 6 </center></td>
                            <td style="width:250px; padding-left:10px">Exam fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['exam_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 7 </center></td>
                            <td style="width:250px; padding-left:10px">Grade Sheet</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['grade_sheet'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 8 </center></td>
                            <td style="width:250px; padding-left:10px">Transportation Charge</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['transport_charge'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                           <td style="width:60px"><center> 9 </center></td>
                            <td style="width:250px; padding-left:10px">Electricity</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['electricity'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 10 </center></td>
                            <td style="width:250px; padding-left:10px">Course Registration fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['course_registration_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 11 </center></td>
                            <td style="width:250px; padding-left:10px">Internet fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['internet_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 1525</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 12 </center></td>
                            <td style="width:250px; padding-left:10px">Security</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['security'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2143</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 13 </center></td>
                            <td style="width:250px; padding-left:10px">Relegion fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['relegion_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 2303</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 14 </center></td>
                            <td style="width:250px; padding-left:10px">Student Activities fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['student_activities'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 15 </center></td>
                            <td style="width:250px; padding-left:10px">Literature fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['literature_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 16 </center></td>
                            <td style="width:250px; padding-left:10px">Sports fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['sports_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 17 </center></td>
                            <td style="width:250px; padding-left:10px">Annual fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['annual_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 6250</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 18 </center></td>
                            <td style="width:250px; padding-left:10px">Emergency Helping Fund</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['emergency_helping_fund'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7115</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 19 </center></td>
                            <td style="width:250px; padding-left:10px">Laboratory fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['laboratory_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Savings Account No: 7514</b></center></td>
                            <td align = "right" style="width:0px"></td>
                       </tr>
                       
                       <tr>
                            <td style="width:60px"><center> 20 </center></td>
                            <td style="width:250px; padding-left:10px">Library fee</td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $row['library_fee'].".00"; ?></td>
                       </tr>
                       
                       <tr>
                            <td style="width:0px"></td>
                            <td style="width:250px; height:25px"><center><b>Total</b></center></td>
                            <td align = "right" style="width:90px; padding-right:10px"><?php echo $total_taka.".00"; ?></td>
                       </tr>
                       
                   </table>
                   
                   
                   <?php
				   		$connection = mysqli_connect('localhost','root','','kuet_registration_database');
        
						$query_1 = "DELETE FROM reg_bank_slip WHERE roll = '$roll'";

						mysqli_query($connection, $query_1);
				   		
				   		$query_3 = "INSERT INTO reg_bank_slip (roll, taka) VALUES ('$roll', '$total_taka')";
				   
				   		mysqli_query($connection, $query_3);
				   		
				   ?>
                   
               </center>
               
               <div style="margin-left:28px"> <br> <br> Student's signature: </div>
           
               <div>
               <table style="width:500px">
                   <tr>
                       <td><center> <br> <br> Education Section <br> KUET </center></td>
                       <td><center> <br> <br> Casheer <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                       <td><center> <br> <br> Manager <br> Janata Bank Ltd. <br> KUET Branch </center></td>
                   </tr>
               </table>
               </div>
               
           </div>
           
           
	    

	</div>
	
	</div>

	<div style="margin-left:38px; float:left">
        <br> <br>
	    <button id="btn" onclick="window.print()"> <font color = "white" size = "3"> <b>Print Reciept</b></font> </button>
	    <br> <br> <br> <br>
	</div>
	
</body>
</html>