<?php 

include 'povezava.php';


error_reporting(0);

if (isset($_POST['registerSumbit'])) {
	$name = $_POST['registerName'];
  $surname = $_POST['registerSurname'];
	$username = $_POST['registerEmail'];
	//$password = password_hash($_POST['registerPass'], PASSWORD_DEFAULT);
	//$cpassword = password_hash($_POST['confirmPass'], PASSWORD_DEFAULT);
  $password = $_POST['registerPass'];
  $cpassword = $_POST['confirmPass'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE Email='$username'";
    $result = mysqli_query($conn, $sql);
    $password = password_hash($_POST['registerPass'], PASSWORD_DEFAULT);

      if (!$result->num_rows > 0) {
        $sql = "INSERT INTO users (name, surname, username, password)
        VALUES ('$name','$surname','$username','$password' )";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('Wow! User Registration Completed.')   </script>"   ;
        $name = "";
				$username = "";
				$_POST['registerPass'] = "";
				$_POST['confirmPass'] = "";

			} else {

				echo "<script>alert('Woops! Something Wrong Went.')</script>";
        echo "Error: " . $sql . "<br>" . $conn->error;
			}
    } else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
//////////////////////////////login///////////////////////////////

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && ($_POST['loginsumbit'])){
    header("location: index.php");
    exit;
}
 
require_once "povezava.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
             
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            
                            header("location: index.php");
                        } else{

                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' media='screen' href='register.css'>

<link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
<title>Investment consultant</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="News.html">News <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="invest.html">Invest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pricing.html">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="Stocks.html">Stocks</a>
            <a class="dropdown-item" href="Crypto.html">Cryptocurrencies</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="infor.html">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shoping cart.html">Shoping Cart</a>
          </li>
          <li class="nav-item">
                    <a class="nav-link" href="register.php">Login</a>
                  </li>
      </ul>
    </div>
    </nav>

  <div class="login-reg-panel">
      <div class="login-info-box">
        <h2>Have an account?</h2>
        <p>Login in</p>
        <label id="label-register" for="log-reg-show">Login</label>
        <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
      </div>
                
      <div class="register-info-box">
        <h2>Don't have an account?</h2>
        <p>Make a one</p>
        <label id="label-login" for="log-login-show">Register</label>
        <input type="radio" name="active-log-panel" id="log-login-show">
        
      </div>
                
      <div class="white-panel">
        <div class="login-show">
        <form  action="" method="POST">
        <h2>LOGIN</h2>
        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                
          <input name="loginsumbit" type="submit" value="Login"></br>
        </form>
      
        <form action="forgotpass.php">
    <input type="submit" value="Forget Password" />
</form>
        </div>
        <div class="register-show">
          <form  action="" method="POST">
            <h5>REGISTER </h5>
          <input name="registerName" type="text" placeholder="Name" value="<?php echo $name; ?>" required>
          <input name="registerSurname" type="text" placeholder="Surname"value="<?php echo $surname; ?>" required>
          <input name="registerEmail" type="text" placeholder="Email" value="<?php echo $username; ?>" required>
          <input name="registerPass"  type="password" placeholder="Password" value="<?php echo $_POST['Password']; ?>" required>
          <input name="confirmPass"  type="password" placeholder="ConfirmPassword" value="<?php echo $_POST['ConfirmPassword']; ?>" required>
          <input name="registerSumbit" type="submit" value="Register">
        </form>
      </div>
    </div>

    <script src="register.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
           
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    


</body>
</html>
