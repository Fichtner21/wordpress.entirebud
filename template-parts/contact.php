<?php 
/*
Template Name: Kontakt
*/
get_header();
?>

<div class="contact">
  <div class="contact__left desaturate">
    <h2>KONTAKT</h2>
    <div class="what__contact--list">           
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
  <div class="contact__right">
    <div class="what__contact">
      <div class="what__contact--form">
        <h3>Napisz do Nas!</h3>
        <?php echo do_shortcode( get_field('contact_form') ); ?>
      </div>      
    </div>
  </div>
</div>

<?php
get_footer();