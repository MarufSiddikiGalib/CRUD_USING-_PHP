<?php include('dbcon.php');  ?>

<?php 

if (isset($_POST['add_student'])){


   $fname = $_POST['f_name'];
   $lname = $_POST['l_name'];
   $age = $_POST['age'];

    if($fname == "" || empty($fname)){

        $message = urlencode("INSERT FIRST NAME");
        header('Location: index.php?message=' . $message);
        exit;
            
        }

else{

    $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";

     $result = mysqli_query($con, $query);
     


     if( !$result ){
           die("Query Failed".mysqli_error($con));
     }

     else{

        $message = urlencode("DATA ADDED SUCCESSFULL");
        header('Location: index.php?message=' . $message);
        exit;
     }
}


}



?>