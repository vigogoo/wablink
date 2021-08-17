
<?php
function send_mail($sender,$receiver,$subject,$message){
 
   $header = "From:Siyabonga Africa\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
   $header .= "Reply-to: $sender\r\n";   
   $retval = mail ($receiver,$subject,$message,$header);
   if( $retval == true ){
            return "okay";
         }
         else{
            return "failed";
         }
}
      
/*$result=send_mail("mugishadavidsibo@gmail.com","Test message","Hello testing email");	  
	  if($result=="okay"){
	  echo "Message sent";
	  }else{
	  echo "Sending failed";
	  }*/
?>