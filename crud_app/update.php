<?php include('dbcon.php');  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
       <h1>CRUD APP</h1>

  
       <?php
       
       if (isset($_GET['id'])){

        $id = $_GET['id'];
       


         $query = "SELECT * FROM `students` WHERE `id` = '$id' ";
         $result = mysqli_query($con, $query);

         if(!$result){
            die("query Failed".mysqli_error($con));
         }
         else{
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
      }
       }
       
       ?>
 

    <?php
      
      if (isset($_POST['update_student'])){

          if (isset($_GET['id_new'])){
               $id_new = $_GET['id_new'];
   
               
          }

               $fname = $_POST['f_name'];
               $lname = $_POST['l_name'];
               $age = $_POST['age'];

         $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = '$id_new'";


         $result = mysqli_query($con, $query);

         if(!$result){
            die("query Failed".mysqli_error($con));
         }
         else{
            header("Location:index.php?update_msg=Succesfully_updated_the_data");  //dont forget it 
      }

         }
     
     
       ?>






<form action="update.php?id_new=<?php echo $id; ?> " method = "POST">

     <div class="form-group">

      <label for="f_name">First Name</label>
      <input type="text" name="f_name" class="form-control" value = "<?php echo $row['first_name']; ?>" >
</div>


     <div class="form-group">

       <label for="l_name">Last Name</label>
       <input type="text" name="l_name" class="form-control" value = "<?php echo $row['last_name']; ?>" >
 </div>



     <div class="form-group">

          <label for="age">Age</label>
          <input type="text" name="age" class="form-control" value = "<?php echo $row['age']; ?>" >
     </div>
       
     <input type="submit" name="update_student" class="btn btn-primary" value="UPDATE">

     </form>


</body
</html>