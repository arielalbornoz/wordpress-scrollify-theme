<?php
$about_heading = get_field('about_heading');
$about_copy = get_field('about_copy');
$about_image = get_field('about_image')['url'];
?>
<section class="panel panel__about" data-section-name="about" style="background-image: url(<?php echo esc_url($about_image); ?>)">
	<div class="inner">
		<div class="vertical-center">
			<h2 class="heading panel__heading"><?php echo $about_heading; ?></h2>
			<div class="panel__copy"><?php echo $about_copy; ?></div>
		</div>
	</div>
</section>