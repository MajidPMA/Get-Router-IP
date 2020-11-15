<?php 
  
// set an username
define("USERNAME", "Your UserName"); 

// set a secure password
define("PASSWORD", "Your Password"); 

function redirect($url)
{
    if (!headers_sent()){
        header("Location: http://$url");
    }else{
        echo "<script type='text/javascript'>window.location.href='http://$url'</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=http://$url'/></noscript>";
    }
    exit;
}

if(empty($_GET["Username"]) || $_GET["Username"] != USERNAME || empty($_GET["Password"]) || $_GET["Password"] != PASSWORD) {
    
    $myfile = fopen("IP.db", "r") or die("Unable to open file!");
    $LIP =  fread($myfile,32);
    fclose($myfile);
    redirect($LIP);
     

} else {
    $myIP = $_SERVER['REMOTE_ADDR'] ;
    echo  $myIP;



    $myfile = fopen("IP.db", "w") or die("Unable to open file!");
    fwrite($myfile, $myIP);
    fclose($myfile);
    
}


  ?>   
