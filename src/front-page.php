<?php get_header(); ?>
<section id="hottours" class="banner">
  <?php
    $args = array(
      'posts_per_page' => 3,
      'orderby' => 'rand',
      'category_name' => 'banner'
    );
    $query = new WP_query( $args );
    // The Loop
    if ( $query->have_posts() ) {
      echo '<ul>';
      while ( $query->have_posts() ) {
        $query->the_post();
        $more = 0;
        echo '<li>';
        echo '<figure class="banner-thumb">';
        the_post_thumbnail( 'banner-mug' );
        echo '</figure>';
        echo '<aside class="banner-text">';
        echo '<h3 class="banner-header">' . get_the_title() . '</h3>';
        echo '<div class="banner-excerpt">';
        the_excerpt('');
        echo '<a class="btn" href="' .  get_permalink( ) . '">Read more</a>';
        echo '</div>';
        echo '</aside>';
        echo '</li>';
      }
      echo '</ul>';
    }

    /* Restore original Post Data */
    wp_reset_postdata();
  ?>
</section><!--hottours-->
<section id="services">
  <div class="container">
    There will be loop with services pages.
  </div><!--container-->
</section><!--services-->
<section id="flightsearch">
  <div class="container">
    Aviasales
  </div><!--container-->
</section><!--flightsearch-->
<?php get_footer(); ?>