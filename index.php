<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GPU Info</title>
	<link rel="stylesheet" type="text/css" href="ss.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/TixieBorg/Ethereum-panel/blob/6797e8e7aef50453b1e1236414c31300f7abf37f/css/design.css">
</head>
<body>

	<header class="header">
		<div class="container">
			<div class="header__serv">
				<h1 class="header__servName">Administation Monitoring</h1>
				<div class="header__servIp">AUIS </div>
			</div>
			<div class="header__stat">
				<h2 class="header__statName">Social Distancing</h2>
				<div>
					<div>
						<span class="header__statNumber"></span>
						<span class="header__statUnit"> Keep Your 1 meter distance</span>
					</div>
					<div>
						<span class="header__statNumber"></span>
						<span class="header__statUnit"> </span>
					</div>
				</div>
			</div>
			<div class="header__stat">
				<h2 class="header__statName">Safety Guidlines</h2>
				<div>
					<span class="header__statNumber"></span>
					<span class="header__statUnit"></span>
				</div>
			</div>
		</div>
	</header>

	<main>


		<div class="container1">



		</div>
	</main>

</body>
<script src="js.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">
$(document).ready(function() {


$.ajax({

            url: 'api-display.php',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    id = response[i].id;
                    loc = response[i].location;
                  	temp = response[i].temp;
                    distance = response[i].distance;
					fav = response[i].fav;


  var tr_str = "<section>" +
										"<header class='serv__head'>" +
													 "<div>"  +
													 			"<span class= 'serv__status serv__status--up'>" +
																			"&#9679;" +
																 "</span>"	+
																 "<h3 class='serv__name'> " + 	loc +

																	"</h3>" +
													 "</div>" +

													 "<div class='server__ip'>"  +
													 			"<span>" +
															 			"<div class='star_container'>" +
																					"<img src='img/star_full.png' class='imgfull" + id + " " + fav + "'>" +
																					"<img src='img/star_empty.png' class='imgempty" + id + "'>" +
																		"</div>" +
																		"DateValue" +
																"</span>" +
													  "</div>" +
										 "</header>" +
							 "<article class='serv__gpu'>" +
							 	"<div class='serv__grid-3'>" +
							 	"	<div class='serv__mod'>" +
							 		"	<div class='serv__modLabel serv__modLabel--red'>"+
							 				"Distance" +
							 			"</div>"+
							 		"	<div class='serv__modNumber'>"
							 			 + distance +"<label class='serv__modUnit'>M</label>" +
							 		"	</div>"+
							 	"	</div>" +

							 	"	<div class='serv__mod'>" +
							 		"	<div class='serv__modLabel serv__modLabel--green'>" +
							 				"Temperature: " +
							 			"</div>" +
							 			"<div class='serv__modNumber'>" +
							 				temp + "<label class='serv__modUnit'>&deg;C</label>" +
							 		"	</div>"+
							 		"</div>"+

							 	"	<div class='serv__mod'>"+
							 			"<div class='serv__modLabel serv__modLabel--yellow'>"+
							 				"Time"+
							 			"</div>"+
							 			"<div class='serv__modNumber'>" +
							 				"TimeValue<label class='serv__modUnit'></label>" +
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

										let emptyStar = document.querySelector(`.imgempty${i+1}`);
										let fullStar = document.querySelector(`.imgfull${i+1}`);
										emptyStar.classList.toggle("false");
										fullStar.classList.toggle("false");
										let clas = Array.from(fullStar.classList);

										if(clas.includes("false")){
												obj = {
													"fav": false,
													"id": i+1
												};
											}else{
												obj = {
													"fav": true,
													"id": i+1
												};
											}

												var json = JSON.stringify(obj);
												alert(json);

												var xp = new XMLHttpRequest();
												xp.onreadystatechange = function() {
												            if (this.readyState == 4 && this.status == 201) {
												                alert("Added to favorites!");
												            }
												        }

												        xp.open("PUT", "/api-fav.php" , true);
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



</script>
</html>
