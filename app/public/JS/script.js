// gestion video accueil
var video = document.getElementById("accueil-video");

video.addEventListener("mouseover", function () {
  video.play();
});

video.addEventListener("mouseout", function () {
  video.pause();
  video.currentTime = 0;
});
