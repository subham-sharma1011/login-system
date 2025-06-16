<?php include("./includes/config.php");
$message="";
if(isset($_POST["username"])){
  $fullname=$_POST["name"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  $confirm=$_POST["confirm"];
  $email=$_POST["email"];
  $gender=$_POST["gender"];

  if($password==$confirm){
    $hashpass=hash("sha256",$password);
    $sqlquery="INSERT INTO users (username,password,email,name,gender) VALUES('$username','$hashpass','$email','$fullname','$gender')";
    $output=$conn->query($sqlquery);
    if($output==true){
      $message="<p class='success'> account created successfully</p>";
    }
    else{
      $message=" <p class='error'>unable to create user. please try again!</p>";
    }
  }
  else{
    $message="<p class='error'>password doesnt match</p>";
  }
  

}

?>


<?php include("./includes/header.php");?>
      <h1>Create New Account</h1>
      <form action="" method="post">
        <?php echo $message ?>
        <input name="name" type="text" placeholder=" full name" required />
        <input name="username" type="text" placeholder=" username" required />
        <input name="password" type="password" placeholder=" password" required />
        <input name="confirm" type="password" placeholder=" confirm password" required />
        <input name="email" type="text" placeholder=" enter email" required />
        
        <select name="gender" >
          <option value="" disabled selected>select gender</option>
            <option>male</option>
            <option>female</option>
            <option>gay</option>
            <option>lesbian</option>
            <option>bisexual</option>
            <option>transgender</option>
            <option>attack helicopter</option>
        </select>
        <button id="login">CREATE</button>
        <p class="message">already have an account?<a href="login.php"> sign in</a></p>
      </form>
      
      
   <?php include("./includes/footer.php");?>