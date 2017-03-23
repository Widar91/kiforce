<?php 
if(isset($_POST['submit'])){
    $to = "kiforce.training@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Free Breakthrough Session";
    $message = $name . "\n\n" . $_POST['comments'];
    $headers = "From:" . $from;
    
    if(mail($to,$subject,$message,$headers)){
        $success = "Your message has been sent. Thank you " . $name . ", we will get back to you shortly with more information on out Free Breakthrough Session.";
    } else {
        $success = "Oops.. An error has occurred, try resending the message or see below for other ways to contact us.";
    }

    echo "
        <script type='text/javascript'>
            
            window.alert('$success');
            document.location.href = 'contact.html';
        </script>
    ";
    
    }
?>
