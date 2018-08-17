<?php
echo"<style>
@import url(me.CSS);

table {
    border-collapse: collapse;
    width: 100%;
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
echo "<body>";
echo "<table class=table>";
echo "<tr><th>Username</th> <th>Account No.</th> <th>Get Loan</th><th>Pay Loan</th><th>Balance</th>";
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
echo "<tr>";
echo "<td > {$row['username']}  </td>";
echo "<td> {$row['accno']} </td>";
echo "<td> {$row['getloan']} </td>";
echo "<td> {$row['payloan']} </td>";
echo "<td> {$row['balance']} </td>";
echo "</tr>";
}
echo "</table>";

echo"<form name=getloanform method=post action=getloan.php>";
 echo"<fieldset>";
echo"<td><input type=hidden name=username value=$uname><br>";
   echo"Get Loan:";
   echo"<td><input type=text name=getloan><br>";
   echo"<button type=submit>Request Loan</button>"; 
 echo"</fieldset>";
echo"</form>";

echo"<form name=payloanform method=post action=payloan.php>";
 echo"<fieldset>";
echo"<td><input type=hidden name=username value=$uname><br>";
   echo"Pay Loan:";
   echo"<td><input type=text name=payloan><br>";
   echo"<button type=submit>Pay Loan</button>"; 
 echo"</fieldset>";
echo"</form>";

}

else
{
echo "Invalid User name and Password<br>";
}
}
mysql_close($conn);
?>
