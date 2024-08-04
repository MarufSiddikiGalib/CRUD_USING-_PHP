<?php include('dbcon.php');  ?>


<?php 

    if (isset($_GET['id'])){       //extract the id from url
         $id_new = $_GET['id'];

     }

     $query = "DELETE FROM `students`WHERE `id` = '$id_new'";

     $result = mysqli_query($con, $query);
  
     if(!$result){
        die("query Failed".mysqli_error($con));  //my sqi error function
     }

     else{
        header("Location:index.php?delete_msg=Succesfully_deleted_the_data");  //dont forget it 
  }
?>