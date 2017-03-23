<?php 
if(isset($_POST['submit'])){
    $to = "kiforce.training@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Mailing List Entry";
    $message = "Name: " . $name . "\nEmail: " . $from;
    $headers = "From:" . $from;
    $headers .= "Reply-To: $from";   
    
    if(mail($to,$subject,$message,$headers)){
        $success = "Thank you " . $name . ", you will soon receive an email containing your free copy of \"Stress Free in 7 Simple Steps\".";
    } else {
        $success = "Oops.. An error has occurred, please try inserting your name and email again.";
    }

    echo "
        <script type='text/javascript'>
            
            window.alert('$success');
            document.location.href = 'index.html';
        </script>
    ";
    
    }
?>
