<html>
<head><title> EXPENDITURE CALCULATOR</title></head>
<form action="page4.php"  method="POST">
<center>
<table>
<tr><td>ENTER STARTING DATE </td></tr><tr><td><input type='date' name="dat1"></td></tr><tr><td>ENTER ENDING DATE </td></tr>  <tr><td><input type='date' name="dat2"></td></tr>
<tr><td><input type="text" name="total" placeholder="ENTER THE AMOUNT"   autocomplete="off"></td></tr>
<tr><td>DO YOU WANT TO SHOW REMAING BALANCE?</td></tr>
<tr><td><input type="radio" name="show" value="1" >YES</td></tr>
<tr><td><input type="radio" name="show" value="0" >NO</td></tr>
<tr><td><input type="submit" name="submit"></td></tr>
</table>
</form>
</center>
</html>

<?php

if(isset($_POST['dat1']))
{
$dat1=$_POST['dat1'];
$show1=$dat1;
$day1= date('D', strtotime($dat1));
$dat2=$_POST['dat2'];
$show2=$dat2;
$dat3=$dat2;
$l=1;

$dat4 = date('d-m-Y',(strtotime( '-1 day' , strtotime($dat3))));
$day2=date('D', strtotime($dat2));
$amount=$_POST['total'];
$cat=$_POST['show'];
$host='localhost';
$sum=0;
$sum2=0;
$total3=14320+15736+3585+15670+19260;
//$deduct=5259;
$deduct=0;

$dat1 = date("Y-m-d", strtotime($dat1));
$dat2 = date("Y-m-d", strtotime($dat2));
$dat4 = date("Y-m-d", strtotime($dat4));
//echo"<center> <h2>EXPENDITURE BETWEEN $show1($day1) and $show2($day2)</h2></center>";


$username='root';
$password='';
$db='expenditure';
$v=mysqli_connect($host, $username, $password,$db);
if($v)
{
//echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}


while($dat1<=$dat2){
	echo"<table bordercolor='black' border='2' cellspacing='0'>";
          echo"<tr>";
             echo"<th colspan='3'>DATE</th>";
              echo"<th>TIME</th>";
              echo"<th>AMOUNT </th>";
               echo"<th>PURPOSE </th>";
               echo"<th colspan='2'>COMMENTS</th>";
               echo"<th colspan='2'>BILL</th>";
        echo"</tr>";
$dat22 = date('Y-m-d',(strtotime( '+6 day' , strtotime($dat1))));
$show1=$dat1;
$show2=$dat22; 
$show1=date("d-m-Y", strtotime($show1));
$show2=date("d-m-Y", strtotime($show2));
echo"<center> <h2> $l.EXPENDITURE BETWEEN $show1 and $show2</h2></center>";
$l=$l+1;
$query="select * FROM spend  where COL4>='$dat1' and col4<= '$dat22'  order by COL4";
$g=mysqli_query($v,$query);
while($row = mysqli_fetch_assoc($g)) {
$a=$row['COL2'];//amount
$b=$row['COL3'];//purpose
$c=$row['COL4'];//date
$d=$row['COL5'];//time
$e=$row['COL7'];//comments
$z=$row['COL6'];//bill
$sum=$sum+$a;
$sum2=$sum2+$a;

$c=date("d-m-Y", strtotime($c));
echo"<tr> <h6>";
        echo"<td colspan='3'>$c</td>";
        echo"<td>$d</td>";
        echo"<td>$a</td>";
        echo"<td>$b</td>";
        echo"<td colspan='2'>$e</td> </h6>";
        if($z!='')
        {
        	echo"<td><a href='$z' target='blank'>CLICK HERE </a></td>";
         }
         else
         {
         	echo"<td></td>";
         }
      echo"</tr>";

}

$available=$amount-$sum2;
echo"</table>";
echo"<br>";
echo"<center>";
echo"<h1><u>AMOUNT SPENT DETAILS</u></h1>";
if($cat==1)
{
echo"<table bordercolor='black' border='2' cellspacing='0' width='900' height='100'>";
echo"<tr><td>TOTAL AMOUNT GIVEN</td><td><b>$amount</b></td></tr>";
echo"<tr><td>AMOUNT SPENT THIS WEEK($show1 to $show2)</td><td><font color='red'><b>$sum</b></font></td></tr>";
echo"<tr><td>AMOUNT SPENT TOTAL( from 07-04-2019  to $show2)</td><td><font color='red'><b>$sum2</b></font></td></tr>";
echo"<tr><td>TOTAL AMOUNT AVAILABLE ON DATE $show2</td><td><font color='green'><b>$available</b></font></td></tr>";
echo"</table>";
//echo"<b>The total calculated amount id $total3</b>";
}
else
{
    echo"<h3><i>AMOUNT SPENT BETWEEN THE DATES  $dat1 and $dat22 is</i> :<u>$sum</u></h3>";
}
echo"</center>";

$dat1 = date('Y-m-d',(strtotime( '+1 day' , strtotime($dat22))));
$sum=0;
echo"<br/>";
echo'<hr style="border-top: dotted 1px;" /> ';

}
}







?>