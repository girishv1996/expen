<?php

$host='localhost';
$username='root';
$password='';
$db='expenditure';
$count=0;
$day=8;
$month=4;
if($day<10)
{
$g=0;
$day=$g.$day;
}
if($month<10)
{
$g=0;
$month=$g.$month;
}

$dog="-";

$girish=$day.$dog.$month.$dog."2019";
echo" date is $girish";
$v=mysqli_connect($host, $username, $password,$db);
if($v)
{
echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}

$query="select * FROM spend where COL4='$girish'";
$g=mysqli_query($v,$query);

while($row = mysqli_fetch_assoc($g)) {
  $mail=$row['COL1'];
$pass=$row['COL2'];
echo"$mail";
echo"$pass";
$count=$count+1;
if($count<10)
{
$v=0;
$count=$v.$count;
}
echo" count is $count";

}



?>