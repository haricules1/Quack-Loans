<?php
echo"<style>

body{font-family: Century Gothic, sans-serif;
}
form {
    border: 3px solid #f1f1f1;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
font-size:100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 10%;
    }
}



        table {font-family: Century Gothic, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-family:rockwell;
}

h3
{font-family: Century Gothic, sans-serif;
color:green;
}

h4
{font-family: Century Gothic, sans-serif;
color:blue;
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
echo "<div style=background-color:red;height:50px>";	
echo "<img src=hut1.png width=60px height=50px align=left>";
		echo "<h1><font color=#66ff33>Quack</font><font color=#ffb84d> Loans </font> </h1>";	
echo "</div>";	
echo "<table class=table%>";
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{

echo "<tr><td><h3>Username</h3></td><td><h4> {$row['username']} </h4></td>

<td><form method=post action=myloan.php>
<input type=hidden name=uname value=$uname />
<button width=100% type=submit name=myloanbtn />My Loans</button></td>
</form>

</tr>";
echo "<tr><td><h3>Account No.</h3></td><td> <h4>{$row['accno']}</h4> </td></tr>";
echo "<tr><td><h3>Request</h3></td><td><h4> {$row['getloan']}</h4></td></tr>";
echo "<tr><td><h3>Balance</h3></td><td><h4> {$row['loan']} </h4></td></tr>";

}
echo "</table width=50%>";


}

else
{
echo "Invalid User name and Password<br>";
}
}
mysql_close($conn)
?>
