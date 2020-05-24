<?php

$host='localhost';
$username='root';
$password='';
$db='expenditure';

$gap=1;
$day=1;
$month=4;
$dog="-";


while($day<=31 && $gap<=7 && $month<=4)
{

if($day<10)
{
$g=0;
$day=$g.$day;
}
if($month<10 && $day==1)
{
$g=0;
$month=$g.$month;
}
echo"<table>";

if($gap==1)
{
	
     echo"<tr>";
        echo"<th>DATE</th>";
        echo"<th>TIME</th>";
        echo"<th>AMOUNT </th>";
        echo"<th>PURPOSE </th>";
        echo"<th>COMMENTS</th>";
        echo"</tr>";
        
}






$girish=$day.$dog.$month.$dog."2019";

$v=mysqli_connect($host, $username, $password,$db);
if($v)
{
//echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}


$query="select * FROM spend  where COL4='$girish' ";
$g=mysqli_query($v,$query);
while($row = mysqli_fetch_assoc($g)) {
$a=$row['COL2'];//amount
$b=$row['COL3'];//purpose
$c=$row['COL4'];//date
$d=$row['COL5'];//time
$e=$row['COL7'];//comments
echo"<tr>";
        echo"<td>$c</td>";
        echo"<td>$d</td>";
        echo"<td>$a</td>";
        echo"<td>$b</td>";
        echo"<td>$d</td>";
        echo"<td>$e</td>";
      echo"</tr>";

}


if($gap==7)
{
      echo"</table>";

	$gap=1;
	printf("<br/>");

}
if($day==31)
{
	$day==0;
	$month=$month+1;
	printf("<br/>");
}


$gap++;
$day=$day+1;

}





?>