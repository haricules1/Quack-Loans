<?php
$username=$_POST["username"];
$payloan=$_POST["payloan"];
echo " $username <br>";
echo " $payloan <br>";
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
echo "connected<br>";
mysql_select_db("quack");
$sql="select * from login where username = '$username'";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_array($result);
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
if($payloan>$row['dueamount'])
{
echo $row['dueamount'];
die("please enter lesser amount...could not execute query". mysql_error() );
}
else
{
echo $row['dueamount'];
$update="update login set dueamount=dueamount-$payloan where username = '$username'";
echo "Pay Loan updated Successfully<br>" ;
}
$updateresult=mysql_query($update,$conn);
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