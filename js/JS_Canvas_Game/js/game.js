// Create the canvas

window.onload = function(){

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
//document.body.appendChild(canvas);

// Background image
var bgReady = false;
var bgImage = new Image();
bgImage.onload = function () {
	bgReady = true;
};
bgImage.src = "images/background.png";

// Hero image
var heroReady = false;
var heroImage = new Image();
heroImage.onload = function () {
	heroReady = true;
	//hero.x = canvas.width / 5; // 
	//hero.y = canvas.height / 5; // restore if needed

};
heroImage.src = "images/hero.png";

// Monster image
var monsterReady = false;
var monsterImage = new Image();
monsterImage.onload = function () {
	monsterReady = true;
};
monsterImage.src = "images/monster.png";


var leachReady = false;
var leachImage = new Image();
leachImage.onload = function () {
	leachReady = true;
};
leachImage.src = "images/leach.png";

var leach2Ready = false;
var leach2Image = new Image();
leach2Image.onload = function () {
	leach2Ready = true;
};
leach2Image.src = "images/leach2.png";

var fireReady = false;
var fireImage = new Image();
fireImage.onload = function () {
	fireReady = true;
};
fireImage.src = "images/fire.png";


// var monsterReady = false;
// var monsterImage = new Image();
// monsterImage.onload = function () {
	// monsterReady = true;
// };
// monsterImage.src = "images/monster.png";



// Game objects
var hero = {
	speed_y: 0, speed_x: 0, a_x: 0, a_y: 0 // movement in pixels per second
};

//var hero = {
//	speed_x: 0 // movement in pixels per second
//};

//var hero = {
//	a_x: 0
//};

//var hero = {
//	a_y: 0
//};








var monster = {
	speed: 256
};
var leach = {
	speed: 200
};

var leach2 = {
	speed: 300
};

var fire = {
	position_0: true, position_1: false, position_2: false, position_3: false, position_4: false
};

var monstersCaught = 0;

var lives_remaining = 5;
var lives_display = function() {
	text = ""
	counter = lives_remaining
	for (i = lives_remaining; i > 0; --i){
		text = text + " O"
	}
	return text
}

// Handle keyboard controls
var keysDown = {};

addEventListener("keydown", function (e) {
	keysDown[e.keyCode] = true;
}, false);

addEventListener("keyup", function (e) {
	delete keysDown[e.keyCode];
}, false);



point_add = true;
point_take = true;
point_take2 = true;


var coin_flip = function() {
	if (Math.round(Math.random()) == 1) {
		return 1;
	}
	else return -1;
}


// Reset the game when the player catches a monster
var reset = function () {
	

	// Throw the monster somewhere on the screen randomly
	if (point_add == true) {
		monster.x = 32 + (Math.random() * (canvas.width - 64));
		monster.y = 32 + (Math.random() * (canvas.height - 64));
	
		monster_x_direction = coin_flip();
		monster_y_direction = coin_flip();
	}
	if (point_take == true) {    // turn these on for randomized leach one position
		leach.x = canvas.width / 2 -16
		leach.y = canvas.height / 2 - 16
		hero.x = canvas.width / 5; // remove if broken
		hero.y = canvas.height / 5; // remove if broken
	//	leach.x = 32 + (Math.random() * (canvas.width - 64));
	//	leach.y = 32 + (Math.random() * (canvas.height - 64));
	//	
	//	leach_x_direction = coin_flip();
	//	leach_y_direction = coin_flip();
	}
	
	
	if (point_take2 == true) {
		leach2.x = 32 + (Math.random() * (canvas.width - 64));
		leach2.y = 32 + (Math.random() * (canvas.height - 64));
		
		leach2_x_direction = coin_flip();
		leach2_y_direction = coin_flip();
	}
	
	
	
	
	point_take = false;
	point_take2 = false;
	point_add = false;
	
};






// Update game objects
var update = function (modifier) {


if (0) { // remove this clause!!!!

}
else {
	monster.x = monster.x + monster_x_direction * .1 * 2
	monster.y = monster.y + monster_y_direction *.1 * 2
	
	//leach.x = leach.x + leach_x_direction * 0.02 * 2  // turn these on for leach 1 to move
	//leach.y = leach.y + leach_y_direction * 0.02 * 2
	
	leach2.x = leach2.x + leach2_x_direction * .12 * 2
	leach2.y = leach2.y + leach2_y_direction * .12 * 2
	
// note speed reversal technique here, copy to rest of speed reversals to avoid "stuck in the side" bug
	if (hero.y <= 5) {
		hero.speed_y = Math.abs(hero.speed_y) * .95
	}

	if (hero.y >= canvas.height - 37) {
		hero.speed_y = Math.abs(hero.speed_y) * (-1) * .95
	}

	if (hero.x <= 5) {
		hero.speed_x = Math.abs(hero.speed_x) * .95
	}
	
	if (hero.x >= canvas.width - 37) {
		hero.speed_x = Math.abs(hero.speed_x) * (-1) * .95
	}
	
	
	if (monster.y >= 5) {
		monster_y_direction *= -1
	}

	if (monster.y <= canvas.height - 37) {
		monster_y_direction *= -1
	}

	if (monster.x >= 5) {
		monster_x_direction *= -1
	}
	
	if (monster.x <= canvas.width - 37) {
		monster_x_direction *= -1
	}
	
	
	
	
	// if (leach.y >= 5) { // leach 1 changing direction
		// leach_y_direction *= -1
	// }

	// if (leach.y <= canvas.height - 37) {
		// leach_y_direction *= -1
	// }

	// if (leach.x >= 5) {
		// leach_x_direction *= -1
	// }
	
	// if (leach.x <= canvas.width - 37) {
		// leach_x_direction *= -1
	// }
	
	
	
	if (leach2.y >= 5) {
		leach2_y_direction *= -1
	}

	if (leach2.y <= canvas.height - 37) {
		leach2_y_direction *= -1
	}

	if (leach2.x >= 5) {
		leach2_x_direction *= -1
	}
	
	if (leach2.x <= canvas.width - 37) {
		leach2_x_direction *= -1
	}
	
	
	// Hero movement logic here:
	
	
	hero.a_y = 0;
	hero.a_x = 0;
	
	hero_cx = hero.x + 16;
	hero_cy = hero.y + 16;
	
	leach_cx = leach.x + 16;
	leach_cy = leach.y + 16;
	
	delta_x = leach_cx - hero_cx;
	delta_y = leach_cy - hero_cy
	
	k = 1000000; // gravitational constant, change this proportional to strength of field
	field_modifier = 0.8; // will change how quickly the field increases with proximity to source, 1 is default, higher is stronger, lower is weaker and more uniform
	
	r_squared = (Math.pow(delta_x, 2) + Math.pow(delta_y, 2));
	
	a_g = k / Math.pow(r_squared, field_modifier);
	
	//theta = Math.atan((delta_y)/(delta_x));
	theta = Math.atan((Math.abs(delta_x))/(Math.abs(delta_y)));
	
	a_gx = a_g * Math.sin(theta);
	
	a_gy = a_g * Math.cos(theta);
	
	//a_gx = k / Math.pow(delta_x, 2);
	//a_gy = k / Math.pow(delta_y, 2);
	
	x_sign = delta_x / (Math.abs(delta_x));
	y_sign = delta_y / (Math.abs(delta_y));
	

	


	
	
	
	/////////////////////////// put additional gravitational acceleration AFTER input acceleration assignment
	
	
	fire.position_0 = true;
	fire.position_1 = false;
	fire.position_2 = false;
	fire.position_3 = false;
	fire.position_4 = false;
	
	
	if (87 in keysDown) { // Player holding up
		if (hero.y >= 5) {
			hero.a_y += -500
			fire.position_0 = false;
			fire.position_1 = true;

		}
	}
	if (83 in keysDown) { // Player holding down
		if (hero.y <= canvas.height - 37) {
			hero.a_y += 500
			fire.position_0 = false;
			fire.position_2 = true;

		}
	}
	//hero.a_y += 400 // add downward gravity with this line:
	hero.a_y += a_gy * y_sign;
	hero.speed_y += hero.a_y * modifier;
	hero.y += hero.speed_y * modifier;
	if (65 in keysDown) { // Player holding left
		if (hero.x >= 5) {
			hero.a_x += -500
			fire.position_0 = false;
			fire.position_3 = true;

		}
	}
	if (68 in keysDown) { // Player holding right
		if (hero.x <= canvas.width - 37) {
			hero.a_x += 500
			fire.position_0 = false;
			fire.position_4 = true;

		}
	}
	hero.a_x += a_gx * x_sign;
	hero.speed_x += hero.a_x * modifier;
	hero.x += hero.speed_x * modifier;
	if (fire.position_0 == true) {
		fire.x = -100;
		fire.y = -100;
	}
	else {
		fire.x = hero.x;
		fire.y = hero.y;
		if (fire.position_1 == true) {
			fire.y += 32;
		}
		if (fire.position_2 == true) {
			fire.y -= 32;
		}
		if (fire.position_3 == true) {
			fire.x += 32;
		}
		if (fire.position_4 == true) {
			fire.x -= 32;
		}
	}
	
	// gravitational acceleration logic here
	
	
	
	
	
	// Are they touching?
	if (
		hero.x <= (monster.x + 32)
		&& monster.x <= (hero.x + 32)
		&& hero.y <= (monster.y + 32)
		&& monster.y <= (hero.y + 32)
	) {
		++monstersCaught;
		// if (Math.Round(Math.random()) == 0) {
			// monster_x_direction *= -1
		// }
		// if (Math.Round(Math.random()) == 0) {
			// monster_y_direction *= -1
		// }
		point_add = true;
		reset();
	}
	
	
		if (
		hero.x <= (leach.x + 10)
		&& leach.x <= (hero.x + 10)
		&& hero.y <= (leach.y + 10)
		&& leach.y <= (hero.y + 10)
	) {
		// --monstersCaught;  // phasing out leach taking skulls mechanic
		--lives_remaining;
		// if (Math.Round(Math.random()) == 0) {
			// monster_x_direction *= -1
		// }
		// if (Math.Round(Math.random()) == 0) {
			// monster_y_direction *= -1
		// }
		point_take = true;
		reset();
	}
	
	
	
	
	
	
		if (
		hero.x <= (leach2.x + 32)
		&& leach2.x <= (hero.x + 32)
		&& hero.y <= (leach2.y + 32)
		&& leach2.y <= (hero.y + 32)
	) {
		//hero.speed_y = (hero.speed_y / (Math.abs(hero.speed_y))) * 400;
		//hero.speed_x = (hero.speed_x / (Math.abs(hero.speed_x))) * 400;
		//re-instate if speed up mechanic doesn't work
		--lives_remaining;
		point_take2 = true;
		
		reset();
	}
	
	
	
	
	
	
	
	
}	
};

// Draw everything
var render = function () {
	if (bgReady) {
		ctx.drawImage(bgImage, 0, 0);
	}

	if (heroReady) {
		ctx.drawImage(heroImage, hero.x, hero.y);
	}

	if (monsterReady) {
		ctx.drawImage(monsterImage, monster.x, monster.y);
	}
	
	if (leachReady) {
		ctx.drawImage(leachImage, leach.x, leach.y);
	}
	
	if (leach2Ready) {
		ctx.drawImage(leach2Image, leach2.x, leach2.y);
	}
	if (fireReady) {
		ctx.drawImage(fireImage, fire.x, fire.y);
	}
	// Score
	
	if (lives_remaining <=0) {
			ctx.fillStyle = "rgb(255, 255, 255)";
			ctx.font = "24px Helvetica";
			ctx.textAlign = "left";
			ctx.textBaseline = "top";
			ctx.fillText("Game Over", 32, 40);
	}
	else {
	
	ctx.fillStyle = "rgb(255, 255, 255)";
	ctx.font = "24px Helvetica";
	ctx.textAlign = "left";
	ctx.textBaseline = "top";
	ctx.fillText("Total green skulls recovered: " + monstersCaught, 32, 32);
	ctx.fillText("Lives Remaining: " + lives_display(), 32, 70);
	}
};

// The main game loop
var main = function () {
	var now = Date.now();
	var delta = now - then;

	update(delta / 1000);
	render();

	then = now;
};

// Let's play this game!
reset();
var then = Date.now();
setInterval(main, 1); // Execute as fast as possible

}
