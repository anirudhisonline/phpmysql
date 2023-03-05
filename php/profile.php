<?php
$con=mysqli_connect("localhost","root",""); 
mysqli_select_db($con,"users");
$username = $_POST['email'];
$result=mysqli_query($con,"select * from profiles where email='$username'");
echo "<table border='1' >
<tr>
<td align=center> <b>Roll No</b></td>
<td align=center><b>Name</b></td>
<td align=center><b>Address</b></td>
<td align=center><b>Stream</b></td></td>
<td align=center><b>Status</b></td>";

while($data = mysqli_fetch_row($result))
{   
    echo "$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9]";
    // echo "<tr>";
    // echo "<td align=center>$data[0]</td>";
    // echo "<td align=center>$data[1]</td>";
    // echo "<td align=center>$data[2]</td>";
    // echo "<td align=center>$data[3]</td>";
    // echo "<td align=center>$data[4]</td>";
    
    // echo "<td align=center>$data[5]</td>";
    // echo "<td align=center>$data[6]</td>";
    // echo "<td align=center>$data[7]</td>";
    // echo "<td align=center>$data[8]</td>";
    // echo "<td align=center>$data[9]</td>";
    // echo "</tr>";
}

?>