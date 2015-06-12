<?php global $jellythemes; ?>
<div class="clear"></div>

<section class="social-footer">
    <h1><?php _e('Social Networks', 'jellythemes'); ?></h1>
    <div class="spacer"></div>
    <div class="footer-container">
        <?php if ($jellythemes['facebook']) : ?> <a href="<?php echo $jellythemes['facebook']; ?>" target="_blank" class="social-ico s-facebook"></a><?php endif; ?>
        <?php if ($jellythemes['youtube']) : ?><a href="<?php echo $jellythemes['youtube']; ?>" target="_blank" class="social-ico s-youtube"></a><?php endif; ?>
        <?php if ($jellythemes['gplus']) : ?><a href="<?php echo $jellythemes['gplus']; ?>" target="_blank" class="social-ico s-plus"></a><?php endif; ?>
        <?php if ($jellythemes['twitter']) : ?><a href="<?php echo $jellythemes['twitter']; ?>" target="_blank" class="social-ico s-twitter"></a><?php endif; ?>
        <?php if ($jellythemes['soundcloud']) : ?><a href="<?php echo $jellythemes['soundcloud']; ?>" target="_blank" class="social-ico s-soundcloud"></a><?php endif; ?>
    </div>
    <div class="clear"></div>
    <a href="#home" class="" id="scrolltop"><?php _e('Scroll to top', 'jellythemes') ?></a>
</section>

        <?php wp_footer(); ?>
    </body>
</html>