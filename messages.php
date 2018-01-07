<? php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email =$_POST["email"];
  $message =$_POST["message"];
}
  $to = "kaustubhtoraskar@rediffmail.com";
  $headers = "From:".email."\n";
  mail($to,"Site Feedback",$message,$headers);
  echo $name;
 ?>
