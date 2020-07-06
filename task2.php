<!DOCTYPE html>
<html>
<head>

	<title></title>
<style type="text/css">
  .flex-container {
  display: flex;
    justify-content: space-around;
}

  body{
    text-align: center;
    justify-content: center;
background: linear-gradient(to right , #4cb8c4, #3CD3AD); 
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
button,#draw {
  background-color: white; 
  border: none;
  color: black;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 30px;
}

</style>
</head>
<body>
<h1> Robot Movement Map</h1>  
<div class="flex-container">  
<div>  
<form method="POST" action="add.php" >
	<label>Forward:</label> <br>
<input type="number" id="F" name="forward" required value="0" /> <br><br>
  <label>Right:</label> <br>
<input type="number" id="R" name="right" required value="0" /> <br><br>
	<label>Left:</label><br>
<input type="number" id="L" name="left" required  value="0" /> <br><br>
<button  type="submit" id="add" name="add" >Add</button>
<input type="button" id="draw" onclick="choice()" value="draw">
<br><br>
</form> 
<?php
$con= new mysqli("localhost","root","","Robot");
if($con->connect_error){
  die("Coneection failed:".$con->connect_error);
} 

$result = mysqli_query($con,"SELECT * FROM Control");

echo "<table border='1'>
<tr>
<th>Right</th>
<th>Forward</th>
<th>Left</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Righ'] . "</td>";
echo "<td>" . $row['Lef'] . "</td>";
echo "<td>" . $row['forward'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</div>
<div>	
<canvas id="myCanvas" width="500" height="500" style="border:1px solid #000000;">	
</canvas> </div>
<script type="text/javascript">	


function choice() {

var inputF = parseInt(document.getElementById("F").value);
var inputR = parseInt(document.getElementById("R").value);
var inputL = parseInt(document.getElementById("L").value);  

if (inputF!=0 && inputR!=0 && inputL!=0 ) {
var c = document.getElementById("myCanvas");
var inputF = parseInt(document.getElementById("F").value);
var inputR = parseInt(document.getElementById("R").value);
var inputL = parseInt(document.getElementById("L").value);
var context = c.getContext("2d");
context.clearRect(0, 0, myCanvas.width, myCanvas.height);
      context.beginPath();
      context.moveTo(40, 40);
      context.lineTo(40, ((inputF+40)*2));
      context.moveTo(45,35);
      context.lineTo(((inputR+40)*2), 35);
      context.moveTo(((inputR+40)*2),40);
      context.lineTo(((inputR+40)*2),(inputL+40)*2);
       context.font = '15px Bold';
           context.fillText('▲',33,39);
     context.fillText('▶',((inputR+40)*2)-3,40);
       context.fillText('▼',((inputR+40)*2)-7,((inputL+40)*2)+8);
      context.lineWidth = 5;
        context.lineCap = 'round';
      context.stroke(); }    
else if (inputF!=0 && inputR!=0 && inputL==0){
var c = document.getElementById("myCanvas");
var inputF = parseInt(document.getElementById("F").value);
var inputR = parseInt(document.getElementById("R").value);
var context = c.getContext("2d");
context.clearRect(0, 0, myCanvas.width, myCanvas.height);
      context.beginPath();
      context.moveTo(40, 40);
      context.lineTo(40, ((inputF+40)*2));
      context.moveTo(45,35);
      context.lineTo(((inputR+40)*2), 35);
       context.font = '15px Bold';
           context.fillText('▲',33,39);
     context.fillText('▶',((inputR+40)*2),40);
      context.lineWidth = 5;
        context.lineCap = 'round';
      context.stroke(); } 
else if (inputF!=0 && inputR==0 && inputL!=0){
var c = document.getElementById("myCanvas");
var inputF = parseInt(document.getElementById("F").value);
var inputL = parseInt(document.getElementById("L").value);
var context = c.getContext("2d");
context.clearRect(0, 0, myCanvas.width, myCanvas.height);
      context.beginPath();
      context.moveTo(((inputL+40)*2), 45);
      context.lineTo(((inputL+40)*2), ((inputF+40)*2));
      context.moveTo(45,35);
      context.lineTo(((inputL+40)*2), 35);
       context.font = '15px Bold';
           context.fillText('◀',33,41);
     context.fillText('▲',((inputL+40)*2)-7,45);
      context.lineWidth = 5;
        context.lineCap = 'round';
      context.stroke(); 
       }
else if (inputF!=0 && inputR==0 && inputL==0){
var c = document.getElementById("myCanvas");
var input = parseInt(document.getElementById("F").value);
var context = c.getContext("2d");
context.clearRect(0, 0, myCanvas.width, myCanvas.height);
      context.beginPath();
      context.moveTo(40, 40);
      context.lineTo(40, ((input+40)*2));
       context.font = '15px Bold';
      context.fillText('▲',33,39);
      context.lineWidth = 5;
        context.lineCap = 'round';
      context.stroke();     
       } 
else if (inputF==0 && inputR!=0 && inputL==0){
var c = document.getElementById("myCanvas");
var input = parseInt(document.getElementById("R").value);
var context = c.getContext("2d");
context.clearRect(0, 0, myCanvas.width, myCanvas.height);
      context.beginPath();
      context.moveTo(40, 400);
      context.lineTo(((input+40)*2), 400);
       context.font = '15px Bold';
      context.fillText('▶',((input+40)*2),405);
      context.lineWidth = 5;
        context.lineCap = 'round';
      context.stroke(); 
       }
else if (inputF==0 && inputR==0 && inputL!=0){
var c = document.getElementById("myCanvas");
var input = parseInt(document.getElementById("L").value);
var context = c.getContext("2d");
context.clearRect(0, 0, myCanvas.width, myCanvas.height);
      context.beginPath();
      context.moveTo(40, 400);
      context.lineTo(((input+40)*2), 400);
       context.font = '15px Bold';
      context.fillText('◀',27,405);
      context.lineWidth = 5;
        context.lineCap = 'round';
      context.stroke();     
       }}
 





</script>
</body>
</html>