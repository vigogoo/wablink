
<?php
function send_mail($sender,$subject,$message,$contact){
   $message="<h1><img src='http://www.sparklessalon.com/wpimages/wpeb368309_06.png' style='max-height:50px'/></h1>".$message."<br/><br/><br/>Contact: ".$contact;
   $receiver="freshnoop@gmail.com";
   $header = "From:Sparkles Salon\r\n";
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