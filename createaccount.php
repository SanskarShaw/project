<!doctype html>

        <?php

        $con = mysqli_connect("localhost","root","","rbi_india");
$msg="";$nameErr=""; $emailidErr=""; $passErr="";$cpassErr=""; $dobErr=""; 

        error_reporting(0);
        if(isset($_POST['submit']))
   {
        $name=$_POST['name'];
 if(!preg_match("/^[a-z. A-Z]*$/", $name))
   {
   $nameErr="<font color=red>Please insert Correct Name</font>";}
if(empty($name)){
  $nameErr="<font color=red> Name is required</font>";
}
// emailId
$emailid=$_POST['email'];
$com=substr($emailid,-4,4);
$coin=substr($emailid,-6,6);
if(empty($emailid)){
  $emailidErr="<font color=red>Email-Id is required</font>";
}
else if((strcasecmp($com,".COM")!=0)&&(strcasecmp($coin,".CO.IN")!=0)){
  $emailidErr="<font color=red>Please enter a Valid Email-Id !</font>";
}
// Password
$pass=$_POST['pass'];
if(empty($pass)){
  $passErr="<font color=red>Password is required</font>";
}
else if(strlen($pass)<5){
  $passErr="<font color=red>Password is too small, please try entering a STRONG password.</font>";
  }
// Confirm Password
$cpass=$_POST['cpass'];
if(empty($cpass)){
  $passErr1="<font color=red>Password is required</font>";
}
else if(strcmp($pass,$cpass)){
  $cpassErr="<font color=red>Password Deosn't Match</font>";}
// Date of birth
$dob=$_POST["dob"];
if(empty($dob)){
  $dobErr="<font color=red>Date of Birth is required</font>";
}
// Gender
$mf=$_POST['mf'];
$msg="";
  if(($nameErr=="")&&($emailidErr=="")&&($passErr=="")&&($dobErr=="")&&($cpassErr=="")) {
$ins="INSERT INTO `customers`(`name`,`email`,`pass`,`dob`,`mf`) VALUES('$name','$emailid','$pass','$dob','$mf');";
$res=mysqli_query($con,$ins);
  if($res){
    $msg="<font color=green>Record is Successfully Added!</font>";
  }
    else{
      $msg="<font color=red>Error In Record Insertion!</font>";
    }}
else{ $msg="<font color=red>Error In Record Insertion!</font>";}
}
        ?>



<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@1,700&display=swap" rel="stylesheet">

  <title>Bank of SLPR</title>
</head>

<body>

  <nav class="navbar navbar-dark navbar-expand-sm  fixed-top">
    <div class="container-fluid navcont">


      <a class="navbar-brand" href="./index.html">
        <img src="./images1/template.png" height="60" width="200 ">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="col-sm-1"></div>
      <div class="collapse navbar-collapse" id="Navbar">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span>About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./contactus.html"><span class="fa fa-address-card fa-lg"></span>Contact</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./createaccount.php"><span class="fa fa-address-card fa-lg"></span>Create Account</a>
          </li>
        </ul>

      </div>
    </div>
    </div>
  </nav>


  <div class="container" id="mar" class="bg">

    <form class="" action="createaccount.php" method="post">
        <div class="col ca">
          <h3>Create Account</h3><br>
          <div class="row">
            <div class="col">
              Name
            </div>
            <div class="col">
              <input type="text" name="name" value="" placeholder="First Last">
            </div>
            <div class="col">
              <?=@$nameErr?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              UserName
            </div>
            <div class="col">
              <input type="email" name="email" value="" placeholder="Something@example.com">
            </div>
            <div class="col">
              <?=@$emailidErr?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Password
            </div>
            <div class="col">
              <input type="password" name="pass" value="" placeholder="Something">
            </div>
            <div class="col">
              <?=@$passErr?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Confirm Password
            </div>
            <div class="col">
              <input type="password" name="cpass" value="" placeholder="Something">
            </div>
            <div class="col">
              <?=@$cpassErr?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Date of Birth
            </div>
            <div class="col">
              <input type="date" name="dob" value="">
            </div>
            <div class="col">
              <?=@$dobErr?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Gender
            </div>
            <div class="col">
              <select class="" name="mf">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Transgender">Transgender</option>
              </select>
            </div>
            <div class="col">
              <?=@$mfErr?>
            </div>
          </div><center>
          <button type="submit" name="submit" class="btn ripple">Create Account</button>
          <br>
          <?=$msg?>
          <center>
        </div>
        </form>
    </table>
  </div>








  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script scr="js/bank.js"></script>
</body>

</html>
