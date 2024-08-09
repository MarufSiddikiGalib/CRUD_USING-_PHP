
<?php include('config/dbcon.php');  ?>
<?php include('curd/insert.php');  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h1>CRUD APP</h1>

    <div class = "container"></div>

    <div class = "box">
    <h2>ALL STUDENTS</h2>
    <button class = "btn" data-toggle="modal" data-target="#exampleModal" data-toggle="modal" data-target="#exampleModal" >ADD STUDENT</button>
    </div>



    <table>
        <thead></thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
         </thead>

        <tbody>

         <?php
         
         $query = "SELECT * FROM `students`";
         $result = mysqli_query($con, $query);

         if(!$result){
            die("query Failed".mysqli_error($con));
         }
         else{
            while($row = mysqli_fetch_assoc($result)){
                ?>

            <tr>
                <td> <?php echo $row['id']; ?> </td>
                <td> <?php echo $row['first_name']; ?> </td>
                <td> <?php echo $row['last_name']; ?> </td>
                <td> <?php echo $row['age']; ?> </td>
                <td><a href="curd/update.php?id=<?php echo $row['id']; ?>  " class = "btn btn-success">Update</a></td>
                <td><a href="curd/delete.php?id=<?php echo $row['id']; ?>" class = "btn btn-danger">Delete</a></td>
            </tr>

                <?php
            }
         }
         
         ?>

           

        </tbody>

    </table>



   <?php 
      
      if (isset($_GET['message'])){  // extract the message from url

        echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['message']) . "</h6>";

      }
   
  
      
      if (isset($_GET['insert_message'])){  // extract the message from url

        echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['insert_message']) . "</h6>";

      }
   

      if (isset($_GET['update_msg'])){   // extract the message from url

        echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['update_msg']) . "</h6>";

      }
   

      if (isset($_GET['delete_msg'])){   // extract the message from url

        echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['delete_msg']) . "</h6>";

      }
   
     ?>



<!-- Modal -->

<form action="curd/insert.php" method="post">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        


          <div class="form-group">

            <label for="f_name">First Name</label>
            
            <input type="text" name="f_name" class="form-control">
          </div>


          <div class="form-group">

            <label for="l_name">Last Name</label>

            <input type="text" name="l_name" class="form-control">
             </div>



            <div class="form-group">

               <label for="age">Age</label>

               <input type="number" name="age" class="form-control">
                 </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="add_student" class="btn btn-primary" value="ADD">
      </div>
    </div>
  </div>
</div>

       </form>
    
    </div>

</body>
</html>