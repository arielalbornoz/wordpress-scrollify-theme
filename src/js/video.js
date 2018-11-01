let videoFilm = document.getElementById("panel__video-film");
let videoTelevision = document.getElementById("panel__video-television");
let buttonFilm = document.getElementById('panel__video-film-play-pause');
let buttonTelevision = document.getElementById('panel__video-television-play-pause');
let seekBar = document.getElementById("seek_bar");
let volumeBar = document.getElementById("volume_bar");
let playIcon = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 79.5 89"><defs><style>.cls-1{fill:url(#New_Gradient_Swatch_6);}.cls-2{fill:#e6e6e6;}.cls-3{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:3px;}</style><linearGradient id="New_Gradient_Swatch_6" y1="44.5" x2="70" y2="44.5" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0090d4"/><stop offset="1" stop-color="#003d7f"/></linearGradient></defs><title>Asset 53</title><g id="Layer_2" data-name="Layer 2"><g id="Desktop-play"><circle class="cls-1" cx="35" cy="44.5" r="35"/><polygon class="cls-2" points="48.3 44.5 26.6 31.97 26.6 57.03 48.3 44.5"/><path class="cls-3" d="M35,87.5a43,43,0,0,0,0-86"/></g></g></svg>`;
let pauseIcon = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 79.5 89"><defs><style>.cls-1{fill:url(#New_Gradient_Swatch_6);}.cls-2{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:3px;}.cls-3{fill:#e6e6e6;}</style><linearGradient id="New_Gradient_Swatch_6" y1="44.5" x2="70" y2="44.5" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0090d4"/><stop offset="1" stop-color="#003d7f"/></linearGradient></defs><title>Asset 54</title><g id="Layer_2" data-name="Layer 2"><g id="Desktop-pause"><circle class="cls-1" cx="35" cy="44.5" r="35"/><path class="cls-2" d="M35,87.5a43,43,0,0,0,0-86"/><rect class="cls-3" x="21" y="31.5" width="11" height="26"/><rect class="cls-3" x="39" y="31.5" width="11" height="26"/></g></g></svg>`

const header = document.querySelector('.header');

if (header) {
  
  buttonFilm.onclick = function() {
    if (videoFilm.paused) {
      videoFilm.play();
      buttonFilm.innerHTML = pauseIcon;
    } else {
      videoFilm.pause();
      buttonFilm.innerHTML = playIcon;
    }
  };

  videoFilm.onplay = function() {
    buttonFilm.innerHTML = pauseIcon;
  };

  buttonTelevision.onclick = function() {
      if (videoTelevision.paused) {
        videoTelevision.play();
        buttonTelevision.innerHTML = pauseIcon;
      } else {
        videoTelevision.pause();
        buttonTelevision.innerHTML = playIcon;
      }
    };
    
    videoTelevision.onplay = function() {
      buttonTelevision.innerHTML = pauseIcon;
    };

  // // Event listener for the seek bar
  // seekBar.addEventListener("change", function() {
  //     // Calculate the new time
  //     var time = video.duration * (seekBar.value / 100);
    
  //     // Update the video time
  //     video.currentTime = time;
  // });

  // // Event listener for the volume bar
  // volumeBar.addEventListener("change", function() {
  //     // Update the video volume
  //     video.volume = volumeBar.value;
  // });

  // video.ontimeupdate = function(){
  //   var percentage = ( video.currentTime / video.duration ) * 100;
  //   $("#custom-seekbar span").css("width", percentage+"%");
  // };
    
  // $("#custom-seekbar").on("click", function(e){
  //     var offset = $(this).offset();
  //     var left = (e.pageX - offset.left);
  //     var totalWidth = $("#custom-seekbar").width();
  //     var percentage = ( left / totalWidth );
  //     var videoTime = video.duration * percentage;
  //     video.currentTime = videoTime;
  // });
}