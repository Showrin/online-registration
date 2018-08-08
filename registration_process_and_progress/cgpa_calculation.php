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
                

			   $gpa = 0.00;
			   $total_credit = 0;
			   $total_sum_for_calculate_gpa = 0;    
			   $total_real_credit = 0;


			   while ($status = mysqli_fetch_assoc($result))
			   {
				   $total_real_credit = $total_real_credit + $status['credit'];

				   if ($status['status'] !== "Incomplete" && !empty ($status['letter_grade']))
				   {



						if ($status['status'] !== "Backlog")
						{
							$total_sum_for_calculate_gpa = $total_sum_for_calculate_gpa + ($status['gpa'] * $status['credit']);

							$total_credit = $total_credit + $status['credit'];
						}


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

				$credit_for_cgpa = $credit_for_cgpa + $total_credit;
                
            }
        }
    }

    echo number_format($cgpa, 2);


?>