<?php 

function lookup_member_email() {
$email=$_POST["email"]; 

$con = mysqli_connect("localhost","webuser","GtY7QXDKIearLJujyhOS","oac_dev"); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error()); 
} 

$sql="SELECT * FROM oac_dev.members where active=1 order by createddate desc limit 1"; 
$retval=mysqli_query($con,$sql); 

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
		$lname = {$row['lname']};
        $fname = {$row['fname']};
        $email = {$row['email']};
} 

mysql_close($conn);

/* send email with member information
if ($email > 0)

else
--send email with how to sign up information

*/
//Redirects to the specified page
//header("Location: http://"); 
}

function send_mail() {
 
    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {
 
        // sanitize form values
        $name    = sanitize_text_field( $_POST["cf-name"] );
        $email   = sanitize_email( $_POST["cf-email"] );
        $subject = sanitize_text_field( $_POST["cf-subject"] );
        $message = esc_textarea( $_POST["cf-message"] );
 
        // get the blog administrator's email address
        $to = get_option( 'admin_email' );
 
        $headers = "From: $name <$email>" . "\r\n";
 
        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            echo '<div>';
            echo '<p>Thanks for contacting me, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo 'An unexpected error occurred';
        }
    }
}

?>
