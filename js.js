// get images elements
let emptyStar = document.querySelector(".imgempty ");
let fullStar = document.querySelector(".imgfull");

// get images' container
let starContainer = document.querySelector(".star_container");

// while clicking, swap the disable class 
starContainer.addEventListener("click", function () {
  emptyStar.classList.toggle("disable");
  fullStar.classList.toggle("disable");
});
