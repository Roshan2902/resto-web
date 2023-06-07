

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


    
<style type="text/css">
.space-tb{
  padding: 2vw;
}

.cf input{
  width: 16.4vw;
  float: left;
  margin-top:10px;
}
.cf button{
  width: 3vw;
  height: 2.7vw;
  border-radius: 8px;
  margin-top:10px;
}
.visible-btn:hover{
  color:rgb(128, 9, 0);
}



</style>

</head>

<body>


<?php
include 'db-conn.php';
if (isset($_POST['sumbit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pswd = $_POST['pswd'];
    $date = date('y-m-d ');


    // $passHash =password_hash($pswd, PASSWORD_DEFAULT);
    // $passHash =password_hash($pswd, PASSWORD_BCRYPT);
    $errors = array();

    if(empty($name) OR empty($email) OR empty($mobile) OR empty($pswd) OR empty($date) ){
      array_push($errors, "All fields are required");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      array_push($errors, "Email is not Valid");
    }
    if (strlen($pswd)<8){
      array_push($errors, "Password must be at least 12 character long");
    }
    // if($pswd!==$cpswd){
    //   array_push($errors, "Password does not match");
    // }

    $sql = "SELECT * FROM `singup` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if($rowCount >0){
      array_push($errors, "Email is Already exists!");
    }

    if(count($errors)>0){
      foreach($errors as $error){
        echo "<div class='alert alert-danger'>$error</div>";
      }
    }else{
        $insertquery = "INSERT INTO `singup`(`name`, `email`, `mobile`, `date`, `pswd`) VALUES  ('$name','$email','$mobile','$date','$pswd')";

        $res=mysqli_query($conn, $insertquery);
        if($res)
          echo '<div class="alert alert-success">You are registered Successfully</div>';
        else
          die('Data not inserted');
      }

}

?>







<section class="" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class=" space-tb col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="text-decoration: underline;">Sign up</p>

                <form class="mx-1 mx-md-4" action="Sign-up.php" method="POST" >

                  <div class="d-flex flex-row align-items-center mb-4 ">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" placeholder="Enter Your Name" name="name" id="" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-1">
                      <input type="email" placeholder="Enter Your Email" name="email" id="" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile-phone  fa-lg me-3 fa-fw"> </i>  
                    <div class="form-outline mobile-int  flex-fill mb-0">
                      <input type="text" placeholder="Enter Your Mobile Number" name="mobile" id="" class="form-control" />
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline cf flex-fill mb-0">
                      <input type="password" placeholder="Enter Your Password " name="pswd" id="password" class="form-control"   />
                      <button type="button" class="visible-btn" id="password-toggle" onclick="togglePasswordVisibility()"><i class="fa fa-eye"></i></button><br><br>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c"  required/>
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="sumbit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                  <label class="form-check-label" for="sign-in-page">
                     Already have an account <a href="Sign-in.php">Login</a>
                  </label>

                </form>

              </div>

              <div class="col-md-10 img-section col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://images.pexels.com/photos/262047/pexels-photo-262047.jpeg?auto=compress&cs=tinysrgb&w=400"  class="img-fluid" width="100%" alt="">
                <!-- <img src="https://images.pexels.com/photos/5530436/pexels-photo-5530436.jpeg?auto=compress&cs=tinysrgb&w=600" class="img-fluid" alt="Sample image"> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script>
  function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var passwordToggle = document.getElementById("password-toggle");

      if (passwordInput.type === "password") {
          passwordInput.type = "text";
      } else {
          passwordInput.type = "password";
      }
  }
</script>

</body>
</html>


