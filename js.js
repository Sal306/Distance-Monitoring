document.addEventListener("DOMContentLoaded", function(event) {
  let emptyStar = document.querySelector(".imgempty1");
  let fullStar = document.querySelector(".imgfull1");

  // get images' container
  let starContainer = document.querySelector(".star_container1");

  if(starContainer){
    alert("exists!")
  }else{
    alert("Doesn't exist");
  }

  // while clicking, swap the disable class
  starContainer.addEventListener("click", function () {
    console.log(fullStar);
    emptyStar.classList.toggle("disable");
    fullStar.classList.toggle("disable");
  });
});
// get images elements
