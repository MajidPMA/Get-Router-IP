<?php 
  
// set an username
define("USERNAME", "trdstudionas"); 

// set a secure password
define("PASSWORD", "taera88106331"); 

function redirect($url)
{
    if (!headers_sent()){
        header("Location: $url");
    }else{
        echo "<script type='text/javascript'>window.location.href='$url'</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=$url'/></noscript>";
    }
    exit;
}

if(empty($_GET["Username"]) || $_GET["Username"] != USERNAME || empty($_GET["Password"]) || $_GET["Password"] != PASSWORD) {
    
    $myfile = fopen("IP.md", "r") or die("Unable to open file!");
    $LIP =  fread($myfile,32);
    fclose($myfile);
    redirect($LIP);
     

} else {
    $myIP = $_SERVER['REMOTE_ADDR'] ;
    echo  $myIP;



    $myfile = fopen("IP.md", "w") or die("Unable to open file!");
    fwrite($myfile, $myIP);
    fclose($myfile);
    
}


  ?>   