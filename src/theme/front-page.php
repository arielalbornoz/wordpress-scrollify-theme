<?php
get_header();
get_sidebar('social sidebar');
if ( have_posts() ) : while ( have_posts() ) : the_post();
  get_template_part('inc/homepage', 'home');
  get_template_part('inc/homepage', 'film');
  get_template_part('inc/homepage', 'television');
  get_template_part('inc/homepage', 'music');
  get_template_part('inc/homepage', 'about');
endwhile; endif;

get_footer();
?>
