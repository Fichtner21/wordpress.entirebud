<?php
/*
Template Name: O nas
*/
get_header();
?>

<div class="template-about">
  <div class="template-about__top">
    <div class="template-about__top--left">
      <h2><?php the_title(); ?></h2>
      <div class="template-about__top--left--content">
        <?php $content = apply_filters( 'the_content', get_the_content() );
            echo $content; ?>
      </div>
    </div>
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
  </div>
  <div class="template-about__bottom">
    <div class="template-about__bottom--baner" style="background-image: url('<?php echo get_field('template_about_bg')['url'] ?>')">
      <div class="template-about__bottom-center">
        <div class=""><?php echo get_field('template_about_text'); ?></div>
        <a href="<?php echo get_field('template_about_link')['url'] ?>"><?php echo get_field('template_about_btn'); ?></a>
      </div>  
    </div> 
  </div>
</div>

<?php
get_footer();