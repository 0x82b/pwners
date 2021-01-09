<title>pwners</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	background: #222;
  color: white;
	margin: 0rem;
	min-height: 100vh;
	font-family: Futura, sans-serif;
}
#canvas, #text {
	position: absolute;
	display: block;
	top: 0;
	left: 0;
	z-index: -1;
}
#text {
  min-height: 100vh;
  width: 100vw;
  z-index: 1;
  color: #fff;
  text-transform: uppercase;
  font-size: 3vmin;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
#text h1 {
	opacity: 0.9
}
</style>
<canvas id="canvas"></canvas>
<center>
          <pre>
	  
 ██▓███   █     █░ ███▄    █  ▓█████ ██▀███    ██████ 
▓██░  ██ ▓█░ █ ░█░ ██ ▀█   █  ▓█   ▀▓██ ▒ ██▒▒██    ▒ 
▓██░ ██▓▒▒█░ █ ░█ ▓██  ▀█ ██▒ ▒███  ▓██ ░▄█ ▒░ ▓██▄   
▒██▄█▓▒ ▒░█░ █ ░█ ▓██▒  ▐▌██▒ ▒▓█  ▄▒██▀▀█▄    ▒   ██▒
▒██▒ ░  ░░░██▒██▓ ▒██░   ▓██░▒░▒████░██▓ ▒██▒▒██████▒▒
▒▓▒░ ░  ░░ ▓░▒ ▒  ░ ▒░   ▒ ▒ ░░░ ▒░ ░ ▒▓ ░▒▓░▒ ▒▓▒ ▒ ░
░▒ ░       ▒ ░ ░  ░ ░░   ░ ▒░░ ░ ░    ░▒ ░ ▒ ░ ░▒  ░ ░
░░         ░   ░     ░   ░ ░     ░    ░░   ░ ░  ░  ░  
             ░             ░ ░   ░     ░           ░  
                                                     

        </pre>
  <br>
        <p>Hello We are pwners!</p>
        <p>We are a Grey hat hacking group. We only hack to troll, make money and for fun.</p>
        <br>
        <p>Donations are appreciated :)</p>
  <p>BTC: 17x9zC5voBnnYcmbNCKJYsePuF8Rwh39Lp</p>
  <p>ETH: 0x568C6C3AEc245a08EB6c17AABF8265dC87669B60</p>
  <p>LTC: LVmdVdfYVeuqt36Nuo5kUwZKmA25Wxj8q8</p>
  <p>XMR: 47WW2N5W1NiHiokRC6rFngTTyTcGNbdnKcHnEVB5XoHDDisgE1cDDWRgqSQSmdj7VfdMErRdXfZVFSbQhawimYzd2p4sGPk</p>
</div>
<script>
let resizeReset = function() {
	w = canvasBody.width = window.innerWidth;
	h = canvasBody.height = window.innerHeight;
}

const opts = { 
	particleColor: "rgb(200,200,200)",
	lineColor: "rgb(200,200,200)",
	particleAmount: 30,
	defaultSpeed: 1,
	variantSpeed: 1,
	defaultRadius: 2,
	variantRadius: 2,
	linkRadius: 200,
};

window.addEventListener("resize", function(){
	deBouncer();
});

let deBouncer = function() {
    clearTimeout(tid);
    tid = setTimeout(function() {
        resizeReset();
    }, delay);
};

let checkDistance = function(x1, y1, x2, y2){ 
	return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
};

let linkPoints = function(point1, hubs){ 
	for (let i = 0; i < hubs.length; i++) {
		let distance = checkDistance(point1.x, point1.y, hubs[i].x, hubs[i].y);
		let opacity = 1 - distance / opts.linkRadius;
		if (opacity > 0) { 
			drawArea.lineWidth = 0.5;
			drawArea.strokeStyle = `rgba(${rgb[0]}, ${rgb[1]}, ${rgb[2]}, ${opacity})`;
			drawArea.beginPath();
			drawArea.moveTo(point1.x, point1.y);
			drawArea.lineTo(hubs[i].x, hubs[i].y);
			drawArea.closePath();
			drawArea.stroke();
		}
	}
}

Particle = function(xPos, yPos){ 
	this.x = Math.random() * w; 
	this.y = Math.random() * h;
	this.speed = opts.defaultSpeed + Math.random() * opts.variantSpeed; 
	this.directionAngle = Math.floor(Math.random() * 360); 
	this.color = opts.particleColor;
	this.radius = opts.defaultRadius + Math.random() * opts. variantRadius; 
	this.vector = {
		x: Math.cos(this.directionAngle) * this.speed,
		y: Math.sin(this.directionAngle) * this.speed
	};
	this.update = function(){ 
		this.border(); 
		this.x += this.vector.x; 
		this.y += this.vector.y; 
	};
	this.border = function(){ 
		if (this.x >= w || this.x <= 0) { 
			this.vector.x *= -1;
		}
		if (this.y >= h || this.y <= 0) {
			this.vector.y *= -1;
		}
		if (this.x > w) this.x = w;
		if (this.y > h) this.y = h;
		if (this.x < 0) this.x = 0;
		if (this.y < 0) this.y = 0;	
	};
	this.draw = function(){ 
		drawArea.beginPath();
		drawArea.arc(this.x, this.y, this.radius, 0, Math.PI*2);
		drawArea.closePath();
		drawArea.fillStyle = this.color;
		drawArea.fill();
	};
};

function setup(){ 
	particles = [];
	resizeReset();
	for (let i = 0; i < opts.particleAmount; i++){
		particles.push( new Particle() );
	}
	window.requestAnimationFrame(loop);
}

function loop(){ 
	window.requestAnimationFrame(loop);
	drawArea.clearRect(0,0,w,h);
	for (let i = 0; i < particles.length; i++){
		particles[i].update();
		particles[i].draw();
	}
	for (let i = 0; i < particles.length; i++){
		linkPoints(particles[i], particles);
	}
}

const canvasBody = document.getElementById("canvas"),
drawArea = canvasBody.getContext("2d");
let delay = 200, tid,
rgb = opts.lineColor.match(/\d+/g);
resizeReset();
setup();
</script>
