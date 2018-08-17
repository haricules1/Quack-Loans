<?php
echo"<style>
@import url(me.CSS);
</style>";
echo"<link rel=stylesheet href=https://www.w3schools.com/w3css/4/w3.css>";

$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
mysql_select_db("quack");
$sql="select * from login";
$retval=mysql_query($sql,$conn);
if(!$retval)
{
die("could not execute query". mysql_error() );
echo "<br>";
}
else
{
echo "<body>";
echo "<table width=30% height=30% class=w3-table-all>";
echo "<tr class=w3-red><th>Username</th> <th>password</th>";
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
echo "<tr>";
echo "<td > {$row['username']}  </td>";
echo "<td> {$row['password']} </td>";
echo "</tr>";
}

echo "</table>";
echo "<form name=loginform method=post action=login.php>";
  echo "<div class=container>";
   echo " <label><b>Username</b></label>";
    echo "<input type=text placeholder=Enter Username name=uname required>";
 echo " </div>";
  echo "<div class=container style=background-color:#f1f1f1>";
    echo "<a href=quackloans.html><button type=button class=cancelbtn>Cancel</button></a>";
 echo " </div>";
echo "</form>";
}
mysql_close($conn);
?>




