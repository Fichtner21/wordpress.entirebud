<?php
/*
Template Name: Usługi typ
*/
get_header();
?>

<div class="services services-type">
  <h2><?php the_title(); ?></h2>
  <div class="services-types">
  <?php 
    if(have_rows('services')):
      while(have_rows('services')) : the_row(); ?>
      <div class="services-item">
        <div class="serv-item">
          <img src="<?php echo get_sub_field('services_img')['url'] ?>"/>
          <div class="services-item__desc">
            <?php echo get_sub_field('services_desc'); ?>
          </div>        
        </div>
        <div class="services-item__title">
          <?php echo get_sub_field('services_title'); ?>
        </div>
      </div>
      <?php
      endwhile;
    endif;
  ?>
  </div>  
</div>

<div class="template-about__bottom">
  <div class="template-about__bottom--baner" style="background-image: url('<?php echo get_field('template_services_bg', 'option')['url'] ?>')">
  <?php  var_dump(get_field('template_services_text','option')); ?>
    <div class="template-about__bottom-center">
      <div class="text-gray"><?php echo get_field('template_services_gray','option'); ?></div>
      <div class="text-black"><?php echo get_field('template_services_text','option'); ?></div>
      <a href="<?php echo get_field('template_services_link','option')['url'] ?>"><?php echo get_field('template_services_btn','option'); ?></a>
    </div>  
  </div>    
</div>


<?php
get_footer();