<html>
<head>
<link rel="stylesheet" type="text/css" href="./styles/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="./scripts/script.js"></script>

	<title>
		Pet Malu Hotel
	</title>
</head>
<body>
	

	<button onclick="goToTop()" id="top" title="Go to top"><img src="./images/arrow.png"></button>

	<div id="header-container">
				<div id= "title-noemi" class="title"> Hotel Online Booking     </div>

	<div id="banner" class="site-header col-12">
		
		<h3>PET MALU HOTEL<br/>
			<span>a world of unparalleled comfort and convenience</span>
		</h3>
		<nav class="main-nav">
			<ul>
				<li><a class="border" href="#">HOME</a></li>
				<li><a class="border" href="#about">ABOUT US</a></li>
				<li><a class="border" href="#port">GALLERY</a></li>
				<li><a class="border" href="#exp">ROOM TYPES</a></li>
				<li><a class="border" href="#contact">CONTACT US</a></li>
				<li><a class="border" href="log_in.php">LOG IN</a></li>
			</ul>
		</nav>
	</div>


<style>
.mySlides {display:none;}
</style>

<div id="main" class="clearfix col-12">
<div class="w3-content w3-section" style="max-width:100%">
  <center><img class="mySlides" src="./images/nays.jpeg" style="width:100%">
  <img class="mySlides" src="./images/bgg.jpg" style="width:100%">
  <img class="mySlides" src="./images/bggg.jpg" style="width:100%">
  <img class="mySlides" src="./images/bgggg.jpg" style="width:100%">
  <h1>PET MALU HOTEL</h1>
		<p>"One of the best Hotel here in Davao " is here to give you a relaxing and pleasurable stay with us together with the ever vivid Davaoenos here in…..Davao City. <br>
                    <a href="log_in.php">
                    	<div class="portfolio-text-button">CLICK FOR RESERVATION</div>
                    	</a>
   		
</center>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>


</div>

	<div id="about" class="clearfix col-12">
		<center><img class="pec" src="./images/bg.jpg">
		<span class="header">WHY BOOK WITH US ?</span>
		<p class="header">PET MALU HOTEL offers 186 guestrooms for discerning travelers searching for the best hotels in Davao City, Southern Mindanao Islands hub for commerce, tourism and industry. Located just at Obrero St. near University of Southeastern Philipiines.</p>
		<div class="ab col-4">
			<img src="./images/4.png" class="ab-pic">
			<h3>Ushers guests </h3>
			<p>Hotel ushers guests to a world of unparalleled comfort and convenience, and reflects the citys progress with cutting-edge features that include an e-lounge with a bank of iMacs at the lobby and complimentary Wi-Fi throughout the premises.</p>
		</div>
		<div class="ab col-4">
			<img src="./images/5.png" class="ab-pic">
			<h3>Location</h3>
			<p>Enables convenient access to various tourist attractions such as the Philippine Eagle breeding camp, white water rafting, and one of the country's longest zip lines. It is also just an hour to the port from where boats depart for Samal Islands white sand beaches and diving spots, and a few hours away to the Philippines highest peak, Mt. Apo. <br>Chuchu Hotel interiors are sleek, clean and elegant, showcasing commissioned pieces from esteemed Philippine artists. Design accents also feature regional arts and crafts that are gaining an enviable niche in the fashion and interior design industry worldwide</p>
		</div>
		<div class="ab col-4">
			<img src="./images/7.png" class="ab-pic">
			<h3>Consistent</h3>
			<p>It's policy is to consistently provide quality service that meets or exceeds their customer's expectations. The staff of Chuchu Hotel strives to achieve excellence in the industry, and to continually improve the effectiveness of its' management system.      Therefore, to our guests, enjoy your stay, and if you need something that we missed, please let us know, and we will do our best. </p>
		</div>
		
	</div>
	<div id="port" class="clearfix col-12">
		<span class="header">GALLERY</span>
			<p class="header">A quality service that meets or exceeds your expectations.</p>
		<div class="wrap">
			<div class="container">
				<div class="inContainer">
					<img src="./images/OO.JPG">
				</div>
			</div>
				<div class="container">
					<div class="inContainer">
						<img src="./images/BB.JPG">
					</div>
				</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/CC.JPG">
				</div>
			</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/DD.JPG">
				</div>
			</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/EE.JPG">
				</div>
			</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/SS.JPG">
				</div>
			</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/JJ.JPG">
				</div>
			</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/HH.JPG">
				</div>
			</div>
			<div class="container">
				<div class="inContainer">
					<img src="./images/II.JPG">
				</div>
			</div>	
		</div>
	</div>
	<div id="exp" class="clearfix col-12">
		<span class="header">ROOM TYPES</span>
			<p class="exp">An inspiration to keep the property memories alive </span>
			<div class="ex col-3">
				<img src="./images/a.png">
				<h3>SUPERIOR ROOM</h3>
				<p><b>&nbspTriple Sharing</b><br/>
				&nbspOur Superior Rooms are furnished with either two or three single beds. These rooms are additionally equipped with an individually controlled air-conditioning, television set with more than 70-channel cable, large mirrors in the room and bathroom, hot and cold shower as well as wired and wireless internet access.
 </b><br/>
				<b>&Rate : Php 2,500.00</b></p>
			</div>
			<div class="ex col-3">
				<img src="./images/ba.png">
				<h3>Deluxe Room</h3>
				<p><b>&nbspTwin sharing</b><br/>
				&nbspOur Deluxe Rooms are located on the second floor of the hotel and is furnished with two single beds. It is equipped with a television set with more than 70-channel cable, large mirrors in the room and bathroom, hot and cold shower and has complimentary wifi internet access.</p>
				<b>&Rate : Php 2,000.00</b></p>
			</div>
			<div class="ex col-3">
				<img src="./images/c.png">
				<h3>Standard Double Room</h3>
				<p><b>&nbspThis room category is available in two set ups. The first is furnished with two single beds while the other has one queen size bed . This is a bigger room with comfort room, televion set and a wifi ready access.</b><br/></p>
				<b>Rate : Php 1,500.00</b></p>
			</div>
			<div class="ex col-3">
				<img src="./images/d.png">
				<h3>Standard Single Room</h3>
				<p><b>&nbspThis room furnished with single bed and are additionally equipped with an individually controlled air-conditioning, television set with more than 70-channel cable, large mirrors in the room and bathroom, hot and cold shower as well as wired and wireless internet access.</b><br/>
					<b>Rate : Php 1,000.00</b></p>
				
			</div>
	</div>
	<div id="footer" class="clearfix col-12">
		<div class="foot col-4">
			<div class="feet1">
				
				<span class="feet1">PET MALU HOTEL <br/> Select your destinations<br/></span>
				<p>Reinvigorate yourself with the Eagles Bar with its classic bar ambience proves just the place to unwind for a drink after a long day. PET MALU HOTEL  continues to prioritise the safety and security of all our guests and associates.<br>We are thankful that peace and order are observed in  Davao City, and it is business as usual.</p>
				
			</div>
		</div>
		<div class="foot col-4">
			<span class="contact">CONTACT</span>
			<p>Should you require any assistance please do not hesitate to contact the hotel’s Duty Manager on:  + ( 63 82) 221 0888 or am.dvo@petmaluhotels.com. </p>
			<div class="feet2">
				
				<h3 class="feet2"><b>TEL:</b><br/> (63 12) 221-0444</h3>
			</div>
			<div class="feet2">
				
				<h3 class="feet2"><b>FAX:</b><br/>(63 82) 225-0222<br/></h3>
			</div>
			
			<div class="feet2">
				
				<h3 class="feet2"><b>EMAIL:</b><br/>@PetmaluHotels.com<br/></h3>
			</div>
		</div>
		<div id="contact" class="contact col-4">
			<span>KEEP IN TOUCH</span>
			<p class="contact">If you have any questions, comments or concerns about our services, please don't hesitate to contact us. We ensure that we will make your stay here an enjoyable and pleasant experience.</p>
			<form>
				<input class="text" type="text" name="number" placeholder="Name"><br>
				<input class="text" type="text" name="number" placeholder="E-Mail"><br>
				<input class="textbig" type="text" name="number" placeholder="Comment"><br>
			</form>
			<form>
				<a href="#"><input class="buttonFoot" type="submit" value="Send"></a>
			</form>
		</div>
	</div>
	<div class="site-footer clearfix col-12">
			
			<nav>
				<ul>
				<li><a class="border" href="#">HOME</a></li>
				<li><a class="border" href="#about">ABOUT US</a></li>
				<li><a class="border" href="#port">GALLERY</a></li>
				<li><a class="border" href="#exp">ROOM TYPES</a></li>
				<li><a class="border" href="#contact">CONTACT US</a></li>
				<li><a class="border" href="log_in.php">LOG IN</a></li>
				</ul>
			</nav>
		</div>
</body>
</html>