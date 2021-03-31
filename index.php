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
															 			"<div class='star_container" + id + "'>" +
																					"<img src='img/star_full.png' class='imgfull" + id + " disable'>" +
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
								let emptyStar = document.querySelector(".imgempty1");
								let fullStar = document.querySelector(".imgfull1");

								// get images' container
								document.getElementsByClassName("star_container");

								if(starContainer){
									alert("exists!");
									starContainer.addEventListener("click", function () {
										console.log(fullStar);
										emptyStar.classList.toggle("disable");
										fullStar.classList.toggle("disable");
									});
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
