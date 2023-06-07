<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website</title>

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>

   *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        text-decoration: none !important;
        font-family: 'Courier New', Courier, monospace;
    }
    body{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        text-decoration: none !important;
        
    }
      .form-control{
        width: 22vw;
      }
      .input-center{
        margin:0vw 4vw ;
      }
      .submit-btn{
        font-weight: 800;
      }
    </style>


  </head>

  
  <?php 
  
  if (isset($_POST['submit'])) {
    // Get form data
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    include 'db-conn.php';

    $sql = "SELECT * FROM `singup` where email = '$email'"; 
    $result = mysqli_query($conn, $sql);  

    $num = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($num){
      echo "Password match";
      header("Location: index.html");
      die();
      // if(password_verify($pswd, $num["pswd"])){
        // header("Location: index.php");
        // die();

        // echo "Password match";
      // }
      // else{
      //   echo "<div class='alert alert-danger'>Password does not  match!.</div>";
      // }
    }else{
      echo "<div class='alert alert-danger'>Email does not exists!.</div>";
    }
     
  }    
  
  ?>
  

<body>

<section class="" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            <h3 class="mb-5"><b>Sign in</b></h3>

            <form action="Sign-in.php" method="POST">
              <div class="form-outline input-center mb-3">
                <input type="email" name="email"  placeholder="Enter Your Email" class="form-control form-control-lg" required/>
              </div>
              <div class="form-outline input-center mb-2">
                <input name="pswd" type="password" placeholder="Enter Your Password" class="form-control form-control-lg" required />
              </div>
              <!-- Checkbox -->
              <div class="form-check d-flex input-center justify-content-start mb-3">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                <label class="form-check-label " for="form1Example3 ">  Remember me </label>
              </div>
              <input type="submit" name="submit" value="Submit" class="submit-btn btn btn-primary">
            </form>

            <hr class="my-4">
            <div><h3><b>Also login through...</b></h3></div>
            <br>
            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
              <br><br>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>