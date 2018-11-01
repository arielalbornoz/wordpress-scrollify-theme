<?php
$film_heading = get_field('film_heading');
$film_copy = get_field('film_copy');
$film_cta = get_field('film_cta');
$film_cta_link = get_field('film_cta_link');
$film_video = get_field('film_video')['url'];
$film_poster = get_field('film_poster')['url'];
$film_thumbnail = get_field('film_thumbnail')['url'];
?>

<section class="panel panel__film" data-section-name="film">
	<div class="panel__container">
		<div class="panel__container-copy">
			<div class="heading panel__heading"><?php echo $film_heading; ?></div>
			<div class="panel__copy"><?php echo $film_copy; ?></div>
			<a href="<?php echo $film_cta_link;?>" class="button button__scroll-nav"><span><?php echo $film_cta; ?><div class="button__tail"></div></span></a>
		</div>
		<div class="panel__container-hero" style="background-image: url(<?php echo $film_poster; ?>)">
			<div class="panel__thumbnail"><img src="<?php echo $film_thumbnail; ?>"></div>
			<video id="panel__video-film" class="panel__video" poster="<?php echo get_template_directory_uri(); ?>/img/homepage/transparent.png" loop muted playsinline>
				<source src="<?php echo $film_video; ?>" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="panel__video-controls">
				<button type="button" id="panel__video-film-play-pause"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 79.5 89"><defs><style>.cls-1{fill:url(#New_Gradient_Swatch_6);}.cls-2{fill:#e6e6e6;}.cls-3{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:3px;}</style><linearGradient id="New_Gradient_Swatch_6" y1="44.5" x2="70" y2="44.5" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0090d4"/><stop offset="1" stop-color="#003d7f"/></linearGradient></defs><title>Asset 53</title><g id="Layer_2" data-name="Layer 2"><g id="Desktop-film"><circle class="cls-1" cx="35" cy="44.5" r="35"/><polygon class="cls-2" points="48.3 44.5 26.6 31.97 26.6 57.03 48.3 44.5"/><path class="cls-3" d="M35,87.5a43,43,0,0,0,0-86"/></g></g></svg></button>
				<!-- <input type="range" id="seek_bar" value="0">
				<input type="range" id="volume_bar"value="1" min="1" max="10" oninput="volume_display.value = volume_bar.value">
				<output id="volume_display"></output>

				<div id="custom-seekbar">
					<span></span>
				</div> -->
			</div>
		</div>
	</div>
</section>