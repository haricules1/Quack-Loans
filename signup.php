<?php
$uname=$_POST["uname"];
$password=$_POST["psw"];
$accno=$_POST["accno"];
$loan=0;
$getloan=0;
$dueamount=0;
$duedate=0000-00-00; 
//echo " $uname <br>";
//echo "$password<br>";
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
mysql_select_db("quack");
$sql="select * from login where username = '$uname'";
$result=mysql_query($sql,$conn);
if(!$result)
{
die("could not execute query". mysql_error() );
echo "<br>";
}
else
{
$rows=mysql_num_rows($result);
if($rows>0)
{
echo "User already Exists Cannot be registered<br>" ;
}
else
{
$insert="insert into Login values('$uname','$password','$accno','$loan','$getloan',$dueamount,$duedate)";
$insertresult=mysql_query($insert,$conn);
include 'login1.php';
if(!$insertresult)
{
die("Query not executed" . mysql_error());
}
}
}
//mysql_close($conn);
?>