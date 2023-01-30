<?php
session_start();
include('povezava.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function  send_password_reset($get_name,$get_email,$token){
$mail=new PHPMailer(true);
$mail->isSMTP(); 
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 
$mail->Host       = 'smtp.gmail.com';  
$mail->Username   = 'blazhemanevris@gmail.com';                     //SMTP username
    $mail->Password   = 'Feri123feri';        

    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;

    $mail->setFrom('blazhemanevris@gmail.com', $get_name);
    $mail->addAddress($get_email);               //Name is optional

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'RESET PASSWORD';
$email_template ="
<h2>Hello</h2>
<h3>You are reciving this mail to reset the password</h3>
<br/>
<a href='http://localhost/password-change.php?token=$token&email=$get_email'>Click me</a>
 
";
$mail->Body=$email_template;
$mail->send();


}

if (isset($_POST['sendMail'])){
$emailReset= mysqli_real_escape_string($conn,$_POST['email']);
$token =md5(rand());
$checkEmail="SELECT username  FROM users WHERE username = '$emailReset' LIMIT 1";
$checkEmail_run = mysqli_query($conn,$checkEmail);

if(mysqli_num_rows($checkEmail_run)>0){
$row =mysqli_fetch_array($checkEmail_run);
$get_name=$row['name'];
$get_email=$row['username'];//username====email
$update_token="UPDATE users SET Token='$token' WHERE username='$get_email' LIMIT 1";
$update_token_run= mysqli_query($conn,$update_token);
if($update_token_run){
send_password_reset($get_name,$get_email,$token);

echo "<script>alert('Wow! User Registration Completed.')   </script>"   ;
header("Location: forgotpass.php");
exit(0);

}else{
    $_SESSION['status']="Something wen wrong.#1";
header("Location: forgotpass.php");
exit(0);
}
}else{
$_SESSION['status']="No email Found";
header("Location: forgotpass.php");
exit(0);
}
}

if(isset($_POST['updatePassword'])){
    $mailForPass=mysqli_real_escape_string($conn,$_POST['email-pass']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmPassword=mysqli_real_escape_string($conn,$_POST['confirmPassword']);

   $verifyToken=mysqli_real_escape_string($conn,$_POST['tokenPassword']);

   if(!empty($verifyToken)){

       if(!empty($mailForPass) && !empty($password) && !empty($confirmPassword)){
          $checkToken= "SELECT Token FROM users WHERE Token='$verifyToken' LIMIT 1";
          $checkToken_run = mysqli_query($conn,$checkToken);
          if(mysqli_num_rows($checkToken_run)>0){

                 if($password==$confirmPassword){
                    $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);

                              $updatePassowrd="UPDATE users SET password ='$password1' WHERE Token='$verifyToken' LIMIT 1 ";
                              $updatePassowrd_run= mysqli_query($conn,$updatePassowrd);

                              if($updatePassowrd_run){
                                $_SESSION['status']=" Password has been changed ";
                                header("Location: register.php");
                                exit(0);
                              }else{
                                $_SESSION['status']="something went wrong no password changed ";
                                header("Location: password-change.php?token=$verifyToken&email=$mailForPass");
                                exit(0); 
                              }
                 }else{
            $_SESSION['status']="Password and Confimr password does not match ";
            header("Location: password-change.php?token=$verifyToken&email=$mailForPass");
            exit(0); 
          
        }

          }else{
            $_SESSION['status']="Invalid Token";
            header("Location: password-change.php?token=$verifyToken&email=$mailForPass");
            exit(0); 
          }


       }else{
        $_SESSION['status']="You can't change password";
        header("Location: password-change.php?token=$verifyToken&email=$mailForPass");
        exit(0); 
       }
   }else{
    $_SESSION['status']="No token Found";
    header("Location: forgotpass.php");
    exit(0); 
   }
}
?>