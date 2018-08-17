<?php
echo "<style>
#cancelbtn{
    width: auto;
    padding: 10px 18px;
    background-color: red;
}
#userbtn{
    width: auto;
    padding: 10px 18px;
color:blue;
    background-color: transparent;
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
input[type=label]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border:0px;
    border-radius: 4px;
    box-sizing: border-box;
background-color:transparent;
}

input[type=submit] {
font-size:80%;
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    height:50px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 2	0px;
}


table {font-size:120%;
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
echo "<div style=background-color:red;height:50px>";
	echo "<img src=hut1.png width=60px height=50px align=left>";
		echo "<h1><font color=#66ff33>Quack</font><font color=#ffb84d> Loans </font> </h1>";	
echo "</div>";

echo "<table width=30% height=30% class=w3-table-all>";
echo "<tr class=w3-red><th>Username</th><th></th> <th>Account No.</th> <th>Requesting</th><th></th><th>Loan given</th><th>Due Amount</th><th>Due Date</th><th colspan=2>Approval</th>";

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
echo "<form method=post action=approval.php>";
echo "<tr>";
echo "<td> <input type=submit id=userbtn name=approve value={$row['username']} formaction=profile.php /> </td>";
echo "<td> <input type=hidden name=uname value={$row['username']} /> </td>";
echo "<td> {$row['accno']} </td>";
echo "<td> {$row['getloan']} </td>";
echo "<td> <input type=hidden name=getloan value={$row['getloan']} /> </td>";
echo "<td> {$row['loan']} </td>";
echo "<td> {$row['dueamount']} </td>";
echo "<td> {$row['duedate']} </td>";
echo "<td> <input type=submit name=approve value=Approve /> </td>";
echo "<td> <input type=submit id=cancelbtn name=approve value=Decline formaction=decline.php /> </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";

echo "<div>";
echo "<form name=updateform method=post action=update.php>";
echo "<fieldset>";
echo "User Name: <input type=text name=uname placeholder='Enter Username'> <br>";
echo "Get Loan: <input type=text name=getloan placeholder='Enter amount to deposit'> <br>";
echo "Loan: <input type=text name=loan placeholder='Enter new loan'> <br>";
echo "Due Amount: <input type=text name=dueamount placeholder='Enter new Due Amount'> <br>";
echo "Due Date: <input type=date name=duedate placeholder='Enter new Due Date'> <br>";
echo"<div class=container style=background-color:#f1f1f1>";
echo "<input type=submit name=txtsubmit value=update>";
echo"</div>";
echo "</fieldset>";
echo "</form>";
echo"</div>";
}
//mysql_close($conn);
?>










