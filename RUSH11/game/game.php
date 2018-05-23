<?php
require_once ('./Player.Class.php');
require_once ('./PlayerOne.Class.php');
require_once ('./Mars.class.php');
require_once ('./PlayerTwo.Class.php');
require_once ('./Ship.class.php');
session_start();
$PlayerOne = new PlayerOne("One");
$PlayerTwo = new PlayerTwo("Two");
$ship1 = new MarsShip("Destroyer");
$ship2 = clone $ship1;
$_SESSION['fuel1'] = $ship1->get_fuel();
$_SESSION['fuel2'] = $ship1->get_fuel();
$PlayerTwo->set_hp(500);
?>
<!DOCTYPE html>
<html>
<head>
	<script src="./jquery/jquery-3.3.1.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="index.css">
</head>
<body onload="startGame()">
	<script>

		var playerOneShip;
		var playerTwoShip;
		var obstacle;
		var turn = 1;
		var x1;
		var x2;
		var y1;
		var y2;
		var hp1;
		var hp2;
		var index = 0;
		var player2;
		var obx;
		var oby;
		function startGame($ship_select) {
			var mars_class = "./pictures/Mars_class.png";
			var Grand_cruiser = "./pictures/Executor_Class_Grand_Cruiser.png";
			var TotalDestroy = "./pictures/TotalDestroy.png";
			playerOneShip = new component(50, 20, "./pictures/Mars_Class.png", 10, 10, "image", "Player1");
			playerTwoShip = new component(50, 20, "./pictures/Executor_Class_Grand_Cruiser.png", 1420, 960, "image", "Player2");
			obstacle = new component(100, 170, "./pictures/RPzV8fB.png", 200, 300, "image", "obstacle_1");
			obstacle1 = new component(150, 150, "./pictures/asteroid3.png", 400, 700, "image", "obstacle_2");
			obstacle2 = new component(150, 120, "./pictures/asteroid2.png", 1100, 300, "image", "obstacle_3");
			background = new component(1500, 1000, "./pictures/canvas_background1.jpg", 0, 0, "image", "bg");
			myGameArea.start();
		}
		var myGameArea = {
			canvas : document.createElement("canvas"),
			start : function() {
				this.canvas.width = 1500;
				this.canvas.height = 1000;
				this.context = this.canvas.getContext("2d");
				document.body.insertBefore(this.canvas, document.body.childNodes[0]);
				this.frameNo = 0;
				this.interval = setInterval(updateGameArea, 30);

			},
			clear : function() {
				this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
			},
			stop : function() {
				clearInterval(this.interval);
			}
		}
		function component(width, height, color, x, y, type, id) {
			this.id = id;
			this.type = type;
			if (type == "image") {
				this.image = new Image();
				this.image.src = color;
			}
			this.width = width;
			this.height = height;
			this.speedX = 0;
			this.speedY = 0;    
			this.x = x;
			this.y = y;    
			this.update = function() {
				getValue();
				ctx = myGameArea.context;
				if (type == "image") {
					if ((this.x < 0 || this.x > 1500 || this.y > 1000 || this.y < 0 || ((this.x >= 200 && this.x <= 270) && (this.y >= 300 && this.y <= 470)) || ((this.x >= 1100 && this.x <= 1250) && (this.y >= 300 && this.y <= 420)) || ((this.x >= 400 && this.x <= 550) && (this.y >= 700 && this.y <= 850))) && (this.id == "Player1" || this.id == "Player2"))
					{
						if (this.id == "Player1")
							alert("Player1 is dead!");
						else if (this.id == "Player2")
							alert("Player2 is dead");
						this.speedX = 0;
						myGameArea.stop();
					}
					if ((id == "Player1" && hp1 <= 0) || (id == "Player2" && hp2 <= 0)){
						if (id == "Player1" && hp1 <= 0)
						{
							alert("Player1 is dead!");
						}
						else if (id == "Player2" && hp2 <= 0)
						{
							alert("Player 2 is DEAD!");
						}
						this.speedX = 0;
						myGameArea.stop();
						return;
					}
					ctx.drawImage(this.image, 
						this.x, 
						this.y,
						this.width, this.height);
				} else {

					ctx.fillStyle = color;
					ctx.fillRect(this.x, this.y, this.width, this.height);
				}

				if (this.id == "Player1")
				{
x1 = this.x;
y1 = this.y;
document.getElementById("piu1").addEventListener("click", function(){ Laser(1, x1, y1, 1); }, {once : true});
document.getElementById("piu1").addEventListener("click", function(){ fire(x1, y1, x2, y2, 1, 1); }, {once : true});
document.getElementById("piu11").addEventListener("click", function(){ Laser(1, x1, y1, 5); }, {once : true});
document.getElementById("piu11").addEventListener("click", function(){ fire(x1, y1, x2, y2, 1, 5); }, {once : true});
}
else if (this.id == "Player2")
{
	x2 = this.x;
	y2 =  parseInt(this.y);
	document.getElementById("piu2").addEventListener("click", function(){ Laser(2, x2, y2, 1); }, {once : true});
	document.getElementById("piu2").addEventListener("click", function(){ fire(x1, y1, x2, y2, 2, 1); }, {once : true});
	document.getElementById("piu22").addEventListener("click", function(){ Laser(2, x2, y2, 5); }, {once : true});
	document.getElementById("piu22").addEventListener("click", function(){ fire(x1, y1, x2, y2, 2, 5); }, {once : true});
}
if (Math.abs(x1 - x2) < 200 && (Math.abs(y1 - y2) < 200) && this.id == "Player1") {
	console.log ("x1 y1 x2 y2" + x1 + " " + y1 + " " + x2 + " " + y2 + " ");
	hp2 = parseFloat(document.getElementById("hp2").value) - 1;
	setValue(2, hp2)
}
else if (Math.abs(x1 - x2) < 50 && Math.abs(y1 - y2) < 50 && this.id == "Player2") {
	hp1 = parseFloat(document.getElementById("hp1").value) - 1;
	setValue(1, hp1)
}
}
this.newPos = function() {
	this.x += this.speedX;
	this.y += this.speedY;        
}
}
var printError = function(error, explicit) {
	console.log(`[${explicit ? 'EXPLICIT' : 'INEXPLICIT'}] ${error.name}: ${error.message}`);
}
function updateGameArea() {
	myGameArea.clear();
	background.update();
	obstacle.update();
	obstacle1.update();
	obstacle2.update();
	playerOneShip.newPos();
	playerOneShip.update();
	playerTwoShip.newPos();
	playerTwoShip.update();
	explosion1.update();
	explosion2.update();
}
function explosion() {
	explosion1.update();
	try {
		explosion1.update();
		console.log("Explosion")
	} catch (e) {
		if (e instanceof ReferenceError) {
			printError(e, true);
		} else {
			explosion1.update();
			explosion1.update();
		}
	}
}
function moveup() {
	playerOneShip.speedY = -8; 
}
function movedown() {
	playerOneShip.speedY = 8; 
}
function moveleft() {
	playerOneShip.speedX = -8; 
}
function moveright() {
	playerOneShip.speedX = 8; 
}
function clearmove() {
	playerOneShip.speedX = 0; 
	playerOneShip.speedY = 0; 
}
function moveup2() {
	ctx = myGameArea.context;
	var canvas = document.getElementById('canvas');
	playerTwoShip.speedY = -8; 
}
function movedown2() {
	playerTwoShip.speedY = 8; 
}
function Laser(player, x, y, power) {
	var cx = document.querySelector("canvas").getContext("2d");
	if (player == 1)
	{
		ctx.beginPath();
		ctx.moveTo(x + 15, y + 9);
		ctx.lineTo(x + (200 * power), y);
		ctx.lineWidth = 6 * power;
		ctx.strokeStyle="#FF0000";
		ctx.stroke();
	}
	else if(player == 2)
	{
		ctx.beginPath();
		ctx.moveTo(x + 15, y + 9);
		ctx.lineTo(x - (200 * power), y);
		ctx.lineWidth = 6 * power;
		ctx.strokeStyle="#FF0000";
		ctx.stroke();
	}
}
function fire(x1, y1, x2, y2, player, dist){
	if (Math.abs(x1 - x2) < 200 * dist && Math.abs(y1 - y2) < 30 && player == 1) {
		hp2 = parseFloat(document.getElementById("hp2").value) - 1;
		setValue(2, hp2)
	}
	else if (Math.abs(x1 - x2) < 200 * dist && Math.abs(y1 - y2) < 30 && player == 2) {
		hp1 = parseFloat(document.getElementById("hp1").value) - 1;
		setValue(1, hp1)
	}
}
function moveleft2() {
	playerTwoShip.speedX = -5; 
}
function moveright2() {
	playerTwoShip.speedX = 5;
}
function clearmove2() {
	playerTwoShip.speedX = 0; 
	playerTwoShip.speedY = 0; 
}
function getRandInteger(min, max) {
	var x = Math.floor(Math.random() * (max - min) + min);
	document.getElementById("dice").innerHTML = x;
}
function setValue(player, val)
{
	if (player == 2)
		document.getElementById("hp2").innerHTML = val;
	else if (player == 1)
		document.getElementById("hp1").innerHTML = val;
}
function getValue()
{
	hp2 = parseFloat(document.getElementById("hp2").value);
	hp1 = parseFloat(document.getElementById("hp1").value);
	setValue(2, hp2);
	setValue(1, hp1);
}
function Restart()
{
	if (window.confirm ("Are you sure to restart? All progress will be lost"))
		location.href = 'game.php';
}
function put_PP(indexx)
{
	var pp = document.getElementById("dice").innerHTML;
	console.log("pp = ====" + pp);
	if (indexx == 1)
		document.getElementById("ppp1").innerHTML = pp;
	else if (indexx == 0)
		document.getElementById("ppp2").innerHTML = pp;
	index++;

}
</script>

<div style="display: flex; justify-content:space-around;">
	<div class="button">
		<button class="arrow" onmousedown="moveup()" onmouseup="clearmove()" ontouchstart="moveup()">UP</button><br><br>
		<button class="arrow" style="margin-right: 80px;" onmousedown="moveleft()" onmouseup="clearmove()" ontouchstart="moveleft()">LEFT</button>
		<button class="arrow" onmousedown="moveright()" onmouseup="clearmove()" ontouchstart="moveright()">RIGHT</button><br><br>
		<button class="arrow" style="margin-bottom: 40px;" onmousedown="movedown()" onmouseup="clearmove()" ontouchstart="movedown()">DOWN</button><br><br>
		<button id="piu1" >PIU-PIU</button>
		<button id="piu11" >PIU-PIU-PIU</button>
		<button id="megapiu1" onclick="DeathStar(1)">MEGA PIU-PIU</button>
		<script>
			function DeathStar(player){
				if (player == 1)
				{
					explosion1 = new component(1500, 1000, "./pictures/death_explosion.gif", 0, 0, "image", "beam");
					alert("Player2 is dead!");
					updateGameArea();
				}
				else if (player == 2)
				{
					explosion1 = new component(1500, 1000, "./pictures/explosion2.png", 0, 0, "image", "beam");
					alert("Player1 is dead");
					updateGameArea();
				}
				myGameArea.stop();
			}
		</script>
	</div>
	<div>
		<p id="Player1">Player 1</p>
		<p id="Life1">Life: <output id="hp1" value="<?php echo $_SESSION['hp1'];?>"><?php echo $_SESSION['hp1'];?></span></p>
			<p id="Shield1">Shield: <span id="shield1"><?php echo $_SESSION['shield1'];?></span></p>
			<p id="Speed1">Speed: <span id="speed1"><?php echo $_SESSION['speed1'];?></span></p>
			<p id = "PP1">PP: <span id="ppp1"></span></p>
			<p id="Fuel1">FUEL: <span id="fuel01"><?php echo $_SESSION['fuel1'];?></span></p>
		</div>
		
		<div>
			<div>Throw me</div>
			<button class="button" id="dice_c" onclick="getRandInteger(1,7); put_PP(index % 2);">DICE</button></br>
			<output name = "dice" value = 5 id="dice"></output>
		</div>
		<div>
			<p id="Player2">Player 2</p>
			<p id="Life2">Life: <output id="hp2" value="<?php echo $_SESSION['hp2'];?>"><?php echo $_SESSION['hp2'];?></span></p>
				<p id="Shield2">Shield: <span id="shield2"><?php echo $_SESSION['shield2'];?></span></p>
				<p id="Speed2">Speed: <span id="speed2"><?php echo $_SESSION['speed2'];?></span></p>
				<p id = "PP2">PP: <span id="ppp2"></span></p>
				<p id="Fuel2">FUEL: <span id="fuel02"><?php echo $_SESSION['fuel2'];?></span></p>
			</div>
			<div class="button">
				<button class="arrow" onmousedown="moveup2()" onmouseup="clearmove2()" ontouchstart="moveup2()">UP</button><br><br>
				<button class="arrow" style="margin-right: 80px;" onmousedown="moveleft2()" onmouseup="clearmove2()" ontouchstart="moveleft2()">LEFT</button>
				<button class="arrow" onmousedown="moveright2()" onmouseup="clearmove2()" ontouchstart="moveright2()">RIGHT</button><br><br>
				<button class="arrow" style="margin-bottom: 40px;" onmousedown="movedown2()" onmouseup="clearmove2()" ontouchstart="movedown2()">DOWN</button><br><br>
				<button id="piu2" >PIU-PIU</button>
				<button id="piu22" >PIU-PIU-PIU</button>
				<button id="megapiu2" onclick="DeathStar(2)">MEGA PIU-PIU</button>
			</div>
		</div>
		<button onclick='Restart();' id="Restart" class="float-left submit-button" >RESTART</button>
		<button onclick="window.location.href='../chat/html/switch.html'" id="Home" class="float-left submit-button" >HOME</button>
		<p>Piu Piu Game.</p>
		<p id="err"></p>

	</body>
	</html>