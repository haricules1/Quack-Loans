<?php
$username=$_POST["uname"];
$getloan=$_POST["getloan"];
$loan=$_POST["loan"];
$dueamount=$_POST["dueamount"];
$duedate=$_POST["duedate"];

echo " $username <br>";
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
echo "connected<br>";
mysql_select_db("quack");
$sql="select * from login where username = '$username'";
$result=mysql_query($sql,$conn);
if(!$result)
{
die("could not execute query". mysql_error() );
echo "<br>";
}
else
{
echo "Query Execute successfully <br>";
$rows=mysql_num_rows($result);
if($rows>0)
{
echo "User name already Exists Record updated Successfully<br>" ;
$update="update login set getloan= '$getloan',loan= '$loan',dueamount='$dueamount',duedate='$duedate' where username = '$username'";
$updateresult=mysql_query($update,$conn);
$link="<script>window.open('update1.php')</script>";
	echo $link;
if(!$updateresult)
{
die("Query not executed" . mysql_error());
}
}
else
{
echo "Reg No. Does not exists, Record not updated <br>";
}
}
mysql_close($conn);
?>