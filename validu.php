<?php
echo"<style>
@import url(me.CSS);

table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #f44336;;
    color: white;
}
</style>";

$uname=$_POST["uname"];
$password=$_POST["psw"];
//echo " $uname <br>";
//echo "$password<br>";
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
//echo "connected<br>";
mysql_select_db("quack");
$sql="select * from login where username = '$uname' and password = '$password'";
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
if($uname=='admin')
{
include 'update1.php';

}
else
{
include 'login1.php';
}
}

else
{
echo "Invalid User name and Password<br>";
}
}
//mysql_close($conn);
?>