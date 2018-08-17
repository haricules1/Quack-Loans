<?php
echo"<style>
#cancelbtn{
    width: auto;
    padding: 10px 18px;
    background-color: red;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
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



        table { font-size:100%;
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-family:rockwell;
}

h3
{
color:green;
}

h4
{
color:blue;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #f44336;;
    color: white;
}

</style>";

$uname=$_POST["uname"];
//echo " $uname <br>";
//echo "$password<br>";
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
//echo "connected<br>";
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
echo "<body background=hut21.jpg>";
echo "<div style=background-color:red;height:50px>";
	echo "<img src=hut1.png width=60px height=50px align=left>";
		echo "<h1><font color=#66ff33>Quack</font><font color=#ffb84d> Loans </font> </h1>";	
echo "</div>";	
echo "<table class=table%>";

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
echo "<table class=table%>";
echo"<form name=userupdateform method=post action=updateuser.php>";
echo "<tr><td><h3>Username</h3></td><td> <input type=text name=uname value={$row['username']} /> </td></tr>";
echo "<tr><td><h3>Account No.</h3></td><<td><input type=text name=uname value={$row['accno']} /></td></td></tr>";
echo "<td> <input type=submit name=userupdate value=Update /> </td>";
echo"</form>";
echo "</table>";

echo "<table width=30% height=20% class=w3-table-all>";
echo "<tr class=w3-red> <th>Requesting</th><th>Loan Recieved</th><th>due amount</th><th>duedate</th></tr>";
echo "<tr>";

echo "<td> {$row['getloan']} </td>";
echo "<td> {$row['loan']} </td>";
echo "<td> {$row['dueamount']} </td>";
echo "<td> {$row['duedate']} </td>";
echo "</tr>";
echo "<form method=post action=approval.php>";
echo "<tr>";
echo "<td> <input type=hidden name=uname value={$row['username']} /> </td>";
echo "<td> <input type=hidden name=getloan value={$row['getloan']} /> </td>";
echo "<td> <input type=submit name=approve value=Approve /> </td>";
echo "<td> <input type=submit id=cancelbtn name=approve value=Decline formaction=decline.php /> </td>";

echo "</tr>";
echo "</form>";
echo "</table>";


echo"<form name=getloanform method=post action=getloan.php>";
 echo"<fieldset>";
echo"<td><input type=hidden name=username value=$uname><br>";
   echo"Get Loan:";
   echo"<td><input type=text name=getloan placeholder='Enter amount'><br>";
   echo"<button type=submit>Request Loan</button>"; 
 echo"</fieldset>";
echo"</form>";

echo"<form name=payloanform method=post action=payloan.php>";
 echo"<fieldset>";
echo"<td><input type=hidden name=username value=$uname><br>";
   echo"Pay Loan:";
   echo"<td><input type=text name=payloan placeholder='Enter amount to pay'><br>";
   echo"<button type=submit>Pay Loan</button>"; 
 echo"</fieldset>";
echo"</form>";

}
}

else
{
echo "Invalid User name and Password<br>";
}
}
mysql_close($conn)
?>
