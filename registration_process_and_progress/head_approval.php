<?php

    session_start();

    $full_info_student = $_SESSION['full_info_student'];
    $roll = $full_info_student['applicant_roll'];
    $dept = $full_info_student['dept'];
    $year = $full_info_student['year'];
    $applicant_name = $full_info_student['applicant_name'];
    $semester = $full_info_student['semester'];
    $status = $full_info_student['status'];


    $connection = mysqli_connect('localhost','root','','kuet_registration_database');
        
    $query_1 = "DELETE FROM advisor_head_approval WHERE applicant_roll = '$roll' AND requested_as = 'Head'";
        
    mysqli_query($connection, $query_1);
        
    $query_2 = "INSERT INTO advisor_head_approval (Serial, name, requested_as, applicant_roll, applicant_name, year, semester, status, progress) VALUES ('', 'Mr. W', 'Head', '$roll', '$applicant_name', '$year', '$semester', '$status', 'Processing')";
        
    mysqli_query($connection, $query_2);
        
    $query_3 = "UPDATE registration_progress SET head_approval = 'Processing' WHERE roll = '$roll'";
        
    mysqli_query($connection, $query_3);

    header("Location: ../registration_process_and_progress/advisor_account.php");

?>