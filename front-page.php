<?php
get_header();

?>
<main>
  <!-- SLIDER -->
  <section class="slider">
    <?php
      if(have_rows('slider') ): ?>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php
            while(have_rows('slider') ) : the_row();

            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="swiper-slide">
              <div class="slide-cont">
                <div class="slide-left">
                  <div class="slide-title"><?php echo $title; ?></div>
                  <div class="slide-text"><?php echo $text; ?></div>
                  
                </div>
                <div class="slide-right">              
                  <img class="" src="<?php echo $image['url'] ?>" alt="<?php echo $title ?>">
                </div>
              </div>
            </div>          
          <?php
          endwhile; ?>
        </div>
        
       
        <div class="pagination"></div>
          
      </div>
      <?php
    else :
      //
    endif;
    
    ?>
  </section>
  <!-- SLIDER  -->
  <!-- CO ROBIMY  -->
  <section class="what">
    <div class="what-cont">
      <div class="what__left">
        <img src="<?php echo get_template_directory_uri() ?>/app/public/images/E.svg">
        <div class="what__left--title">Co robimy?</div>
      </div>
      <div class="what__right">
        <?php 
          if(have_rows('what_we_do')):
            while(have_rows('what_we_do') ) : the_row(); 
            $image_what = get_sub_field('image_what');
            $title_gray = get_sub_field('title_gray');
            $title_black = get_sub_field('title_black');
            $link_what = get_sub_field('link_what');
            
            ?>
              <div class="what-box">
                <a href="<?php echo $link_what['url']; ?>" title="<?php echo $title_gray . ' ' . $title_black; ?>">  
                  <img src="<?php echo $image_what['url']; ?>">
                </a>
                <div class="what-box__gray"><?php echo $title_gray ?></div>
                <div class="what-box__black"><?php echo $title_black ?></div>
              </div>
            <?php
          endwhile;
          else :
            //
          endif;
        ?>
      </div>
    </div>
  </section>
  <!-- CO ROBIMY  -->
  <!-- O NAS  -->
  <section class="about">
    <?php
      if(have_rows('about')):
        while(have_rows('about')) : the_row();
        $title_about = get_sub_field('title_about');
        $exceprt_about = get_sub_field('exceprt_about');
        $link_about = get_sub_field('link_about');
        $image_about = get_sub_field('image_about');
    ?>
    <div class="about-cont desaturate" style="background-image: url('<?php echo $image_about['url'] ?>')">
        <div class="about-title"><?php echo $title_about; ?></div>
        <div class="about-excerpt"><?php echo $exceprt_about; ?></div>
        <a href="<?php $link_about['url']; ?>" title="<?php echo $title_about; ?>">Więcej</a>
    </div>
      <?php
        endwhile;
      endif;
    ?>
  </section>
  <!-- O NAS  -->
  <!-- REALIZACJE  -->
  <section class="what">
    <div class="what-cont">
      <div class="what__left">
        <img src="<?php echo get_template_directory_uri() ?>/app/public/images/E.svg">
        <div class="what__left--title">Realizacje</div>
      </div>
      <div class="what__right">
        <?php 
          $realization = get_field('realizacje');          
          if($realization):
            foreach($realization as $realize):
              $permalink = get_permalink( $realize->ID );
              $thumbnail = get_the_post_thumbnail( $realize->ID, 'full' );
              $title = get_the_title( $realize->ID );
             ?>
              <div class="what-box">
                <a href="<?php echo $permalink; ?>">
                  <?php echo $thumbnail; ?>
                  <div class="what-box-title"><span><?php echo $title; ?></span></div>
                </a>
              </div>
              <?php
            endforeach;
          endif;
        ?>
      </div>
    </div>
  </section>
  <!-- REALIZACJE  -->
  <!-- BANER  -->
  <section class="baner">
    <?php
    if(have_rows('baner')):
      while(have_rows('baner')) : the_row(); ?>
    <div class="baner__image" style="background-image: url('<?php echo get_sub_field('baner_image')['url'] ?>')">
    <div class="baner__title"><?php echo get_sub_field('baner_title'); ?></div>
      <?php
      endwhile;
    endif; 
    ?>
  </div>
  </section>
  <!-- BANER  -->
  <!-- KONTAKT -->
  <section class="what">
    <div class="what-cont">
      <div class="what__left">
        <img src="<?php echo get_template_directory_uri() ?>/app/public/images/E.svg">
        <div class="what__left--title">Kontakt</div>
      </div>
      <div class="what__contact">
        <div class="what__contact--form">
          <h3>Napisz do Nas!</h3>
          <?php echo do_shortcode( get_field('contact_form') ); ?>
        </div>
        <div class="what__contact--list">    
          <img src="<?php echo get_template_directory_uri() ?>/app/public/images/E_reverse.svg">    
          <div class="what__contact--list-cont">
            
            <div class="what__contact--item">
              <h4>Telefon:</h4>
              <div><?php echo get_field('telefon'); ?></div>
            </div>
            <div class="what__contact--item">
              <h4>E-mail:</h4>
              <div><?php echo get_field('email'); ?></div>
            </div>
            <div class="what__contact--item">
              <h4>Dostępność:</h4>
              <div><?php echo get_field('open_hours'); ?></div>
            </div>
            <div class="what__contact--item">
              <h4>Lokalizacja:</h4>
              <div><?php echo get_field('localize'); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- KONTAKT  -->
</main>

<?php
get_footer(); ?>