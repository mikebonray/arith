﻿Merry Christmas <img src=https://static.vecteezy.com/system/resources/previews/014/703/898/non_2x/merry-christmas-with-glass-ball-and-giftbox-for-flyer-brochure-design-on-black-background-invitation-theme-concept-happy-holiday-greeting-banner-and-card-template-vector.jpg height=80><br>
<?php
  $memdata=$_SERVER['QUERY_STRING']; //getenv("Query_String");
//print "<hr color=red>";
  $filename="memo.txt";
  if($memdata) {
    parse_str($memdata, $output);
    $filename = $output['f'];
  }
  $sum = "0";
  $msg = trim($_POST['msg']);
  $msgmail = trim($_POST['msgmail']);
  $today = getdate();
  $daystr = sprintf("%04d%02d%02d%02d%02d%02d",
      $today['year'],$today['mon'],$today['mday'],$today['hours'],$today['minutes'],$today['seconds']);
  if( empty($msg) ) {   
    $newmg = "";
  }
  else {
    $sum = trim($_POST['sum']);
    $newmg = "-------------------".$daystr."\nemail:".$msgmail."\n".$msg."\n"; //"Hello\n";
  }

  $lines = file($filename);
  $tot = 0;
  $allmg = $newmg;
  foreach ($lines as $line_num => $line) {
    $allmg .=  $line;
    if ($line_num >= 1) {
    }
  }
  if($sum+0 == 1+2) {
// Open the file and erase the contents if any
    $fp = fopen($filename, "w");
// Write the data to the file
    fwrite($fp, $allmg);
// Cÿ se 睅翴  file
    fclose($fp);
  }
  
  $showstr = $newmg;
//  $showstr = str_replace("\n", "<br>", $newmg);
//  print $showstr;
  
//echo "msg..".$_POST['msg']."<hr color=red>";
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/tr/html4/strict.dtd'>
<html lang=zh-tw>
<!-- start body --> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--big5-->
<meta http-equiv="expires" content="-1">
<title>
arithai.com|page|guestbook 
</title>
</head>
<body background=sample1/back0.gif>
<table>
<?php
print "<form method='POST' action='guestbook.php?f=$filename'>";
?>
<tr><td>
Message:&nbsp;&nbsp;&nbsp;
<a href=/>首頁HOME</a>[20241225 trim]&nbsp;&nbsp;&nbsp;
<a href=guestbook.php?f=memo.txt>一般 Simple</a>&nbsp;&nbsp;&nbsp;
<tr><td>
1+2=
<input name='sum' size=3 maxlength=3 value='
<?php
print $sum+0;
?>
'><br>
email:<br>
<input name='msgmail' size=50 maxlength=50 value='
<?php
print $msgmail;
?>
'>
<br>
Post:<br>
<textarea name='msg' cols=60 rows=10>
<?php
print $msg;
?>
</textarea><tr><td>
<input type=submit value='Post'>
</form>
</table>
Message<hr color=blue>
<?php
  
  $lines = file($filename);
  $tot=0;
  foreach ($lines as $line_num => $line) {
    if ($tot < 15) {
       print trim(str_replace("\n", "<br>", $line)); //str_replace("\n", "<br>", $line);
    }
    else {
       break;
    }
    $tot++;
  }
  
?>
</body>
</html>
