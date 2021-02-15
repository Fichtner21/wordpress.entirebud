<?php
/*
Template Name: Usługi
*/
get_header();
?>

<div class="services">
  <div class="services__children">
    <?php
      $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => $post->ID,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
      );

      $parent = new WP_Query( $args );

      if ( $parent->have_posts() ) : 
        while ( $parent->have_posts() ) : $parent->the_post(); ?>
          <a class="child-page" href="<?php the_permalink(); ?>">
          <?php if(has_post_thumbnail()): ?>
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
							<?php else : ?>
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/app/public/images/JPG_RBG.png" title="<?php get_bloginfo('name'); ?>"/>
            <?php endif; ?>
            <div class="child-page__title"><?php the_title(); ?></div>
          </a>
        <?php
        endwhile;
      endif;
      ?>
  </div>
</div>

<?php
get_footer();
