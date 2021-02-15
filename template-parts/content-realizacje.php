<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package entirebud
 */

?>
<div class="single-realization">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h4>Realizacje</h4>
    <h2><?php the_title(); ?></h2>
    <div class="realization__item">
      <img src="<?php echo get_template_directory_uri(); ?>/app/public/images/pin.svg"/>
      <div class="realization__item--desc">
        <div class="realization__item--desc--title">Adres realizacji:</div>
        <div class=""><?php echo get_field('real_address'); ?></div>
      </div>
    </div>
    <div class="realization__item">
      <img src="<?php echo get_template_directory_uri(); ?>/app/public/images/hammer.svg"/>
      <div class="realization__item--desc">
        <div class="realization__item--desc--title">Wykonywane czynności:</div>
        <div class=""><?php echo get_field('real_activities'); ?></div>
      </div>
    </div>
    <div class="realization__item">
      <img src="<?php echo get_template_directory_uri(); ?>/app/public/images/zoom.svg"/>
      <div class="realization__item--desc">
        <div class="realization__item--desc--title">Galeria realizacji:</div>
      </div>
    </div>
    <?php the_content(); ?>
    <?php
			 the_post_navigation(
			 	array(
			 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Poprzednia realizacja', 'entirebud' ) . '</span> <span class="nav-title"></span>',
			 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Kolejna realizacja', 'entirebud' ) . '</span> <span class="nav-title"></span>',
			 	)
       );

      // %title jeśli ma być dodany title w pliku do prev/next
      ?>
  </article><!-- #post-<?php the_ID(); ?> -->
  <div class="template-about__bottom">
    <div class="template-about__bottom--baner" style="background-image: url('<?php echo get_field('template_real_bg', 'option')['url'] ?>')">
    <?php  var_dump(get_field('template_real_text','option')); ?>
      <div class="template-about__bottom-center">
        <div class=""><?php echo get_field('template_real_text','option'); ?></div>
        <a href="<?php echo get_field('template_real_link','option')['url'] ?>"><?php echo get_field('template_real_btn','option'); ?></a>
      </div>  
    </div>    
  </div>
</div>