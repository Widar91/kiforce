<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './assets/php/PHPMailer/src/Exception.php';
require './assets/php/PHPMailer/src/PHPMailer.php';

if(isset($_POST['submit'])) {

    $customer_name = $_POST['name'];
    $customer_email = $_POST['email'];
    
    $kiforce_name = "Davide Alfonsi";
    $kiforce_email = "kiforce.training@gmail.com";

    $ebook_path = "./assets/ebook.pdf";

    $body = "
        <center><img src=\"cid:cover\" alt=\"cover\" height=\"300\" width=\"200\"></center>
        <p style=\"text-align: center;\">
            Thank you for downloading <b><i>Stress Free in 7 Simple Steps</i></b>.<br/>
            You will find your free copy attached to this email.
        </p>

        <p style=\"text-align: center;\">
            Enjoy!
        </p>

        <p style=\"text-align: center;\">
            Davide Alfonsi
            <br/>
            <a href=\"http://www.ki-force.com/\">Ki-Force Fitness</a>
        </p>
    ";  

    $email = new PHPMailer;
    $email->Subject   = 'Free eBook';
    $email->Body      = "eBook successfully sent to $customer_name at $customer_email.";
    $email->setFrom($customer_email, $customer_name);
    $email->addAddress( $kiforce_email );


    $email2 = new PHPMailer;
    $email2->isHTML(true);
    $email2->Subject   = 'Free eBook';
    $email2->Body      = $body;
    $email2->setFrom($kiforce_email, "Davide Alfonsi");
    $email2->addAddress( $customer_email );
    $email2->addAttachment($ebook_path);
    $email2->addEmbeddedImage("./assets/images/ebook_cover.png", "cover");




    // $kiforce = "kiforce.training@gmail.com"; // this is your Email address
    // $customer = $_POST['email']; // this is the sender's Email address
    // $name = $_POST['name'];
    // $subject = "Free eBook";
    // $message1 = "Name: " . $name . "\nEmail: " . $customer;
    // $headers1 = "From:" . $customer;
    // $headers1 .= "Reply-To: $customer"; 

    // $headers2 = "From:" . $kiforce;
    // $headers2 .= "Reply-To: $kiforce"; 

    
    //if(mail($kiforce,$subject,$message1,$headers1) && mail($customer, $subject, $message2, $headers2)){
    if ($email2->Send() && $email->Send()) {
        $success = "Thank you " . $customer_name . ", you will soon receive an email containing your free copy of \"Stress Free in 7 Simple Steps\".";
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
