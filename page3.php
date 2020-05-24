<html>
<head><title> EXPENDITURE CALCULATOR</title></head>
<form action="page3.php"  method="POST">
<center>
<table>
<tr><td>ENTER STARTING DATE </td></tr><tr><td><input type='date' name="dat1"></td></tr><tr><td>ENTER ENDING DATE </td></tr>  <tr><td><input type='date' name="dat2"></td></tr>
<tr><td><input type="text" name="total" placeholder="ENTER THE AMOUNT"   autocomplete="off"></td></tr>
<tr><td>DO YOU WANT TO SHOW REMAING BALANCE?</td></tr>
<tr><td><input type="radio" name="show" value="1" >YES</td></tr>
<tr><td><input type="radio" name="show" value="0" >NO</td></tr>

<tr><td>YES OR NO?</td></tr>
<tr><td><input type="radio" name="show1" value="1" >YES<input type="radio" name="show1" value="0" >NO</td></tr>


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

$dat4 = date('d-m-Y',(strtotime( '-1 day' , strtotime($dat3))));
$day2=date('D', strtotime($dat2));
$amount=$_POST['total'];
$cat=$_POST['show'];
$cat1=$_POST['show1'];
$host='localhost';
$sum=0;
$total3=14320+20995+3585+15670+19260+4066+8162+7806+6320+4430+12170+16855+5290+64150;
if($cat1==1)
{
$deduct=5259;
}
if($cat1==0)
{
$deduct=0;
}
$show1=date("d-m-Y", strtotime($show1));
$show2=date("d-m-Y", strtotime($show2));
$dat1 = date("Y-m-d", strtotime($dat1));
$dat2 = date("Y-m-d", strtotime($dat2));
$dat4 = date("Y-m-d", strtotime($dat4));
echo"<center> <h2>EXPENDITURE BETWEEN $show1($day1) and $show2($day2)</h2></center>";


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
echo"<table bordercolor='black' border='2' cellspacing='0'>";
 echo"<tr>";
        echo"<th colspan='3'>DATE</th>";
        echo"<th>TIME</th>";
        echo"<th>AMOUNT </th>";
        echo"<th>PURPOSE </th>";
        echo"<th colspan='2'>COMMENTS</th>";
        echo"</tr>";


$query="select * FROM spend  where COL4>='$dat1' and col4<= '$dat2'  order by COL4";
$g=mysqli_query($v,$query);
while($row = mysqli_fetch_assoc($g)) {
$a=$row['COL2'];//amount
$b=$row['COL3'];//purpose
$c=$row['COL4'];//date
$d=$row['COL5'];//time
$e=$row['COL7'];//comments
$sum=$sum+$a;
$c=date("d-m-Y", strtotime($c));
echo"<tr>";
        echo"<td colspan='3'>$c</td>";
        echo"<td>$d</td>";
        echo"<td>$a</td>";
        echo"<td>$b</td>";
        echo"<td colspan='2'>$e</td>";
      echo"</tr>";

}
$sum=$sum+$deduct;
$available=$amount-$sum;
echo"</table>";
echo"<br>";
echo"<center>";
echo"<h1><u>AMOUNT SPENT DETAILS</u></h1>";
if($cat==1)
{
echo"<table bordercolor='black' border='2' cellspacing='0' width='900' height='100'>";
echo"<tr><td>TOTAL AMOUNT </td><td><b>$amount</b></td></tr>";
echo"<tr><td>AMOUNT SPENT</td><td><font color='red'><b>$sum</b></font></td></tr>";
echo"<tr><td>AMOUNT AVAILABLE</td><td><font color='green'><b>$available</b></font></td></tr>";
echo"</table>";
echo"<b>The total calculated amount id $total3</b>";
if($total3==$sum)
{
	echo"<b>CALCULATED SUCESSFULLY.........OK......!</b>";

}
}
else
{
    echo"<h3><i>AMOUNT SPENT BETWEEN THE DATES  $dat1 and $dat2 is</i> :<u>$sum</u></h3>";
}
echo"</center>";


}







?>