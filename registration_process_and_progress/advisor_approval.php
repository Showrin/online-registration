<?php

    session_start();

    $full_info = $_SESSION['full_info'];
    $roll = $full_info['roll'];
    $dept = $full_info['dept'];
    $year = $full_info['year'];
    $applicant_name = $full_info['name'];
    $semester = $full_info['semester'];
    $status = $full_info['status'];


    if (isset($_POST['submit']))
    {
        $name = $_POST['session'];
        
        $connection = mysqli_connect('localhost','root','','kuet_registration_database');
        
        $query_1 = "DELETE FROM advisor_head_approval WHERE applicant_roll = '$roll' AND requested_as = 'Advisor'";
        
        mysqli_query($connection, $query_1);
        
        $query_2 = "INSERT INTO advisor_head_approval (Serial, name, requested_as, applicant_roll, applicant_name, year, semester, status, progress) VALUES ('', '$name', 'Advisor', '$roll', '$applicant_name', '$year', '$semester', '$status', 'Processing')";
        
        mysqli_query($connection, $query_2);
        
        $query_3 = "UPDATE registration_progress SET advisor_approval = 'Processing' WHERE roll = '$roll'";
        
        mysqli_query($connection, $query_3);
        
        header("Location: ../registration_process_and_progress/progress.php");
    }

?>