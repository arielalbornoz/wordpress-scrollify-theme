<?php
$hero_heading = get_field('hero_heading');
$hero_cta = get_field('hero_cta');
$hero_image = get_field('hero_image')['url'];
$hero_mobile_image = get_field('hero_mobile_image')['url'];
?>
<section class="panel home panel__home" data-section-name="home" style="background-image: url(<?php echo esc_url($hero_image); ?>)">
	<div class="inner">
		<div class="vertical-center">
			<div class="heading--hero panel__heading-home" data-aos="fade-up"><?php echo $hero_heading; ?></div>
			<a href="#about" class="button button__home button__scroll-nav"><span><?php echo $hero_cta; ?><div class="button__tail"></div></span></a>
		</div>
	</div>
</section>