<?php include("./includes/config.php");

$message = "";


if(isset($_POST["username"]) and isset($_POST["password"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $hashpass=hash("sha256",$password);

  $sqlquery="SELECT * FROM users WHERE username='$username' AND password='$hashpass'";
  $output=$conn->query($sqlquery);
  

  if($output->num_rows==1){
    header("location: home.php");
  }
  else{
    $message="invalid username or password";
  }

}
?>


<?php include("./includes/header.php");?>
      <h1>Sign in</h1>
      <form method="post">
        <p class="error"><?php echo $message ?></p>
        <input name="username" id="username" type="text" placeholder="username" required/>
        <input name="password" id="password" type="password" placeholder="password" required/>
        <button id="login">LOGIN</button>
      <p class="message">Not registered?<a href="createaccount.php"> Create an account</a></p>
      </form>

<?php include("./includes/footer.php");?>
    