<?php global $jellythemes; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo strip_tags($jellythemes['blogname']) ?> <?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <link rel="icon" href="<?php echo $jellythemes['favicon']['url'] ?>">
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
        <?php wp_head(); ?>
    </head>

<body <?php body_class($jellythemes['color'] . ' ' . $jellythemes['layout']); ?>>
<div id="mask">
    <div class="loader">
      <img src="<?php echo get_template_directory_uri(); ?>/img/icons/loading.gif" alt='loading'>
    </div>
</div>

<header class="full-wrapper header">
    <div class="main-logo">
        <?php if (!empty($jellythemes['logo']['url'])) : ?>
            <a class="symbol" href="#"><img src="<?php echo $jellythemes['logo']['url']; ?> " alt="<?php echo strip_tags($jellythemes['blogname']); ?>"></a>
        <?php else : ?>
           <a class="symbol" href="#"><?php echo $jellythemes['blogname']; ?></a>
        <?php endif; ?>
    </div>
    <?php wp_nav_menu(array('container' => 'nav', 'container_id' => 'nav2', 'items_wrap' => '<a class="jump-menu" title="Show navigation">Show navigation</a><ul id="%1$s" class="%2$s">%3$s</ul>' ,'theme_location' => 'main', 'walker' => new jellythemes_walker_nav_menu)); ?>
    <?php wp_nav_menu(array('container' => 'nav', 'container_id' => '','menu_id' => 'nav', 'container_class' => 'main-menu', 'theme_location' => 'main', 'walker' => new jellythemes_walker_nav_menu)); ?>
</header>
