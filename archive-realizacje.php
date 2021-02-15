<?php
get_header();
?>

<div class="archive-realization">
  <h2>Realizacje</h2>
  <div class="realization-grid">
    <?php
      $realizations = new WP_Query(array(
        'post_type' => 'realizacje',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
      ));
      while($realizations->have_posts( ) ) : $realizations->the_post(); ?>
      <div class="realization-cont">
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
        </a>
        <div class="realization-cont__title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
      </div>
      <?php
      endwhile;
      wp_reset_postdata(  );
    ?>
  </div>
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

<?php
get_footer();