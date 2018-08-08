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
        
    $query_1 = "UPDATE registration_progress SET edu_section_approval = 'Approved' WHERE roll = '$roll'";
        
    mysqli_query($connection, $query_1);

    $query_2 = "UPDATE registration_progress SET bank_approval = 'Processing' WHERE roll = '$roll'";
        
    mysqli_query($connection, $query_2);

    header("Location: ../registration_process_and_progress/head_account.php");

?>