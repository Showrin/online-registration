<?php 

    session_start();

    $full_info = $_SESSION['full_info'];
    $roll = $full_info['roll'];

    $connection = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

    $query = "SELECT * FROM hall_records WHERE roll = '$roll'";

    $result = mysqli_query($connection, $query);

    $hall_dues = 0.00;

    while ($information = mysqli_fetch_assoc($result))
    {
        if ($information['status'] === "Not Paid")
        {
            $hall_dues = $hall_dues + $information['taka'];
        }
    }


    
    $_SESSION['hall_dues'] = $hall_dues;

    $connection2 = mysqli_connect('localhost', 'root', '', 'kuet_registration_database');

    if ($hall_dues > 3000.00)
    {
        $query2 = "UPDATE registration_progress SET hall_approval ='Disapproved' WHERE roll = '$roll'";

        $result2 = mysqli_query($connection2, $query2);
        
    }
    else
    {
        $query2 = "UPDATE registration_progress SET hall_approval ='Approved' WHERE roll = '$roll'";

        $result2 = mysqli_query($connection2, $query2);
    }

    header("Location: ../registration_process_and_progress/progress.php");

?>