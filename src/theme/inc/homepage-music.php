<?php
$music_heading = get_field('music_heading');
$music_cta = get_field('music_cta');
$music_image = get_field('music_image')['url'];
$music_copy = get_field('music_copy');
?>
<section class="panel panel__music" data-section-name="music" style="background-image: url(<?php echo esc_url($music_image); ?>)">
	<div class="inner">
		<div class="vertical-center">
			<div class="heading panel__heading"><?php echo $music_heading; ?></div>
			<div class="panel__copy"><?php echo $music_copy; ?></div>
			<a href="#" class="button button__scroll-nav"><span><?php echo $music_cta; ?><div class="button__tail"></div></span></a>
		</div>
	</div>
</section>