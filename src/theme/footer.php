<?php
$copyright = get_field('copyright');
?>
<footer class="footer" data-section-name="footer">
  <div class="footer__container">
    <div class="footer__home-link">
      <img src="<?php echo get_template_directory_uri(); ?>/img/header/mceg-logo@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/header/mceg-logo@2x.png 2x">
      <div class="footer__copyright"><?php //echo $copyright; ?>© 2018 Morgan Creek, LLC. All Rights Reserved.</div>
    </div>
    <nav class="footer__nav">
      <ul class="footer__menu">
        <?php print_menu('footer-menu', 'footer__menu'); ?>
      </ul>
    </nav>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>