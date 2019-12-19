

<?

$name=$_POST['name'];
$Email=$_POST['email'];
$website=$_POST['url'];
$message=$_POST['message'];



    $body .= "Name: " . $name . "\n";
    $body .= "Email: " . $Email . "\n";
    $body .= "Website: " . $website . "\n";
    $body .= "Message: " . $message . "\n";

    //replace with your email
    mail("youremail@email.com","New email",$body); 


?>

<!DOCTYPE html>
<html>
<head>
<script>alert("Your message has been sent successfully. We will contact you shortly.");</script>
<meta HTTP-EQUIV="REFRESH" content="0; url=contact.html">

</head>
</html>
