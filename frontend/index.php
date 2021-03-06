<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AUIS Monitoring System</title>
	<link rel="stylesheet" type="text/css" href="/css/ss.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://github.com/TixieBorg/Ethereum-panel/blob/6797e8e7aef50453b1e1236414c31300f7abf37f/css/design.css">
</head>
<body>

	<header class="header">
		<div class="container" >
			<div class="header__dash">
				<h1 class="header__dashName">Administation Monitoring</h1>
				<div class="header__dashIp">AUIS </div>
			</div>
			<div class="header__stat">
				<h2 class="header__statName">Social Distancing</h2>
				<div>
					<div>
						<span class="header__headerbox"></span>
						<span class="header__statUnit"> Keep Your 2 meters distance</span>
					</div>
					<div>
						<span class="header__headerbox"></span>
						<span class="header__statUnit"> </span>
					</div>
				</div>
			</div>
			<div class="header__stat">
				<h2 class="header__statName">Safety Guidlines</h2>
				<div>
					<span class="header__headerbox"></span>
					<span class="header__statUnit"></span>
				</div>
			</div>
		</div>

		<div class="col-12">
		<ul class="nav">
  <li class="nav-item">
    <a class="nav-link " href="/frontend/favorite.html">Favorites</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/frontend/chart.html">Chart</a>
  </li>
  
</ul>
<span class="input-group input-daterange right col-10">
	<label for="date" class="m-1"  > Select Dates Between: </label>
    <input type="date" class="form-control m-1" id="startDate" onchange="disableButton()">
    <div class="input-group-addon">to</div>
    <input type="date" class="form-control m-1" id="endDate" onchange="disableButton()">
	<button class="btn btn-primary m-1" id="dataSelector" onclick="sendData()" > Show In This Range</button>
</span>
		</div>
	</header>
	<main>
		<div class="container1" id='con1'>
		</div>
	</main>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	disableButton();
	var ID, img1, img2;
	img1 = "";
	img2 = "";

$.ajax({

            url: '/backend/api-display.php',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
					img1 = "false";
					img2 = "";
                    id = response[i].id;
                    hum = response[i].humidity;
                  	temp = response[i].temp;
                    distance = response[i].distance/100;
					fav = response[i].fav;
					date = response[i].date;
					if(distance < 1.5){
						console.log(distance);
						check = '&#10060;';
					}else{
						console.log(distance);
						check = '&#9679;';
					}

					if(fav==true){
						 img2 = "false";
						 img1 = "";
					}
					
  var tr_str = "<section>" +

										"<header class='dash__head'>" +
													 "<div>"  +
													 			"<span class= 'dash__status dash__status--up'>" +
																			check +
																 "</span>"	+
																 "<h3 class='dash__name'> "  +

																	"</h3>" +
													 "</div>" +

													 "<div class='dasher__ip'>"  +
													 			"<span>" +
															 			"<div class='star_container'  id='" + id +  "' >" +
																					"<img src='/img/star_full.png' class='imgfull" + id + " " + img1 + " ' id='" + id +  "'>" +
																					"<img src='/img/star_empty.png' class='imgempty" + id + " " + img2 +  "'>" +
																		"</div>" +
																		  date +
																"</span>" +
													  "</div>" +
										 "</header>" +
							 "<article class='dash__gpu'>" +
							 	"<div class='dash__grid-3'>" +
							 	"	<div class='dash__mod'>" +
							 		"	<div class='dash__modLabel dash__modLabel--red'>"+
							 				"Distance" +
							 			"</div>"+
							 		"	<div class='dash__modNumber'>"
							 			 + distance +"<label class='dash__modUnit'>M</label>" +
							 		"	</div>"+
							 	"	</div>" +

							 	"	<div class='dash__mod'>" +
							 		"	<div class='dash__modLabel dash__modLabel--green'>" +
							 				"Temperature: " +
							 			"</div>" +
							 			"<div class='dash__modNumber'>" +
							 				temp + "<label class='dash__modUnit'>&deg;C</label>" +
							 		"	</div>"+
							 		"</div>"+

							 	"	<div class='dash__mod'>"+
							 			"<div class='dash__modLabel dash__modLabel--yellow'>"+
							 				"Hum"+
							 			"</div>"+
							 			"<div class='dash__modNumber'>" + hum + 
							 				"<label class='dash__modUnit'></label>" +
							 		"	</div>"+
							 		"</div>"+


							 	"</div>"+
							 "</article>"  +
							"</section>";
                    $(".container1").append(tr_str);
                }

								// get images' container
							let	starContainer =Array.from(document.getElementsByClassName("star_container"));

								if(starContainer){
									for(let i =0; i<starContainer.length; i++){
									starContainer[i].addEventListener("click", function () {
										ID = starContainer[i].id
										let emptyStar = document.querySelector(`.imgempty${ID}`);
										let fullStar = document.querySelector(`.imgfull${ID}`);
										emptyStar.classList.toggle("false");
										fullStar.classList.toggle("false");
										let clas = Array.from(fullStar.classList);

										if(clas.includes("false")){
												obj = {
													"fav": 'false',
													"id": ID
												};
											}else{
												obj = {
													"fav": 'true',
													"id": ID
												};
											}

												var json = JSON.stringify(obj);

												var xp = new XMLHttpRequest();
												xp.onreadystatechange = function() {
												            if (this.readyState == 4 && this.status == 201) {
																console.log("Change was made");
												            }
												        }

												        xp.open("PUT", "/backend/api-fav.php" , true);
												        xp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
												        xp.send(json);
																return;

									});
								}
								}else{
									alert("Doesn't exist");
								}
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    });

	function disableButton() {
        var d1 = document.getElementById('startDate').value;
        var d2 = document.getElementById('endDate').value;
        const btn = document.getElementById('dataSelector');

        if(!d1 || !d2){
             btn.disabled = true;
        }
        else{
            btn.disabled = false;
        }             
    }

	function sendData() {
        document.getElementById('con1').innerHTML= ' ';
		var d1 = document.getElementById('startDate').value;
        var d2 = document.getElementById('endDate').value;

		obj = {'d1': d1, 'd2': d2};
					var json1 = JSON.stringify(obj);				
					  var options = {
            url: "/backend/api-displayBetweenDates.php",
            dataType: "json",
            type: "PUT",
			data: json1,

            success: function(response) {
				var len = response.length;
                for (var i = 0; i < len; i++) {
					img1 = "false";
					img2 = "";
                    id = response[i].id;
                    hum = response[i].humidity;
                  	temp = response[i].temp;
                    distance = response[i].distance/100;
					fav = response[i].fav;
					date = response[i].date;
					if(distance > 1.5){
						console.log(distance);
						check = '&#10060;';
					}else{
						console.log(distance);
						check = '&#9679;';
					}

					if(fav==true){
						 img2 = "false";
						 img1 = "";
					}
					
  var tr_str = "<section>" +

										"<header class='dash__head'>" +
													 "<div>"  +
													 			"<span class= 'dash__status dash__status--up'>" +
																			check +
																 "</span>"	+
																 "<h3 class='dash__name'> "  +

																	"</h3>" +
													 "</div>" +

													 "<div class='dasher__ip'>"  +
													 			"<span>" +
															 			"<div class='star_container'  id='" + id +  "' >" +
																					"<img src='/img/star_full.png' class='imgfull" + id + " " + img1 + " ' id='" + id +  "'>" +
																					"<img src='/img/star_empty.png' class='imgempty" + id + " " + img2 +  "'>" +
																		"</div>" +
																		  date +
																"</span>" +
													  "</div>" +
										 "</header>" +
							 "<article class='dash__gpu'>" +
							 	"<div class='dash__grid-3'>" +
							 	"	<div class='dash__mod'>" +
							 		"	<div class='dash__modLabel dash__modLabel--red'>"+
							 				"Distance" +
							 			"</div>"+
							 		"	<div class='dash__modNumber'>"
							 			 + distance +"<label class='dash__modUnit'>M</label>" +
							 		"	</div>"+
							 	"	</div>" +

							 	"	<div class='dash__mod'>" +
							 		"	<div class='dash__modLabel dash__modLabel--green'>" +
							 				"Temperature: " +
							 			"</div>" +
							 			"<div class='dash__modNumber'>" +
							 				temp + "<label class='dash__modUnit'>&deg;C</label>" +
							 		"	</div>"+
							 		"</div>"+

							 	"	<div class='dash__mod'>"+
							 			"<div class='dash__modLabel dash__modLabel--yellow'>"+
							 				"Hum"+
							 			"</div>"+
							 			"<div class='dash__modNumber'>" + hum + 
							 				"<label class='dash__modUnit'></label>" +
							 		"	</div>"+
							 		"</div>"+


							 	"</div>"+
							 "</article>"  +
							"</section>";
                    $(".container1").append(tr_str);
                }
				}, error: function(xhr, status, error) {
                alert(error);
            }
									         
        };
        $.ajax(options);
							
	}

	
</script>
</html>
