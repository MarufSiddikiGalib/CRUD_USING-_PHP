<?php include('dbcon.php');  ?>


<?php 

function reorderAndReset($con) {
   
   // Reorder IDs
   $reorderQuery = "SET @count = 0; UPDATE students SET id = @count:= @count + 1;";
   if (mysqli_multi_query($con, $reorderQuery)) {
       // Wait for the queries to finish
       while (mysqli_next_result($con)) {;}
   } else {
       die("Query Failed: " . mysqli_error($con));
   }

   // Reset auto-increment value
   $resetQuery = "ALTER TABLE students AUTO_INCREMENT = 1;";
   if (!mysqli_query($con, $resetQuery)) {
       die("Query Failed: " . mysqli_error($con));
   }
}






    if (isset($_GET['id'])){       //extract the id from url
         $id_new = $_GET['id'];

     }

     $query = "DELETE FROM `students`WHERE `id` = '$id_new'";

     $result = mysqli_query($con, $query);
  
     if(!$result){
        die("query Failed".mysqli_error($con));  //my sqi error function
     }

     else{
        reorderAndReset($con); // Call the reorder and reset function after deletion
        header("Location:index.php?delete_msg=Succesfully_deleted_the_data");  //dont forget it 
  }
?>