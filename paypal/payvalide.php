<?php 

session_start();

 include_once("../install/installcons.php");

 include_once("../connect.php");

$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: ipnpb.paypal.com:443\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ipnpb.paypal.com', 443, $errno, $errstr, 30);

$req = 'cmd=_notify-validate';

 foreach ($_POST as $key => $value) {
$value = trim(urlencode(stripslashes($value)));
$req .= "&$key=$value";
}

 if (isset($fp)){
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) {

 $a = $_POST['item_number'];;

 $a2 = "+".$a."month";

 $date1 =  date(dmY, strtotime("$a2"));

 $date1 = htmlspecialchars($date1);

 $date1 = $mysqli->real_escape_string($date1);

 $pseudo = $_POST['pseudo'];

 $pseudo = htmlspecialchars($pseudo);

 $pseudo = $mysqli->real_escape_string($pseudo);  

 $u = 'UPDATE ebo SET temps = "'.$date1.'" WHERE pseudo = "'.$pseudo.'"'; 

 $mysqli->query($u); 

}
}
}

?>
