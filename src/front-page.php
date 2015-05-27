<?php get_header(); ?>
<section id="hottours" class="banner">
  <?php
    $args = array(
      'posts_per_page' => 3,
//      'orderby' => 'rand',
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
        echo '<a class="btn" href="' .  get_permalink( ) . '" title="Learn more about ' . get_the_title() . '">Read more</a>';
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
<section id="services" class="services">
  <div class="container">
    <?php 
      $query = new WP_Query( 'pagename=services' );
      $services_id = $query->queried_object->ID;

      // The Loop for title
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $more = 0;
          echo '<h2 class="section-title">' . get_the_title() . '</h2>';
          echo '<div class="entry-content">';
          the_content('');
          echo '</div>';
        }
      }

      /* Restore original Post Data */
      wp_reset_postdata();
      /*Get the children of the services page*/
      $args = array(
        'posts_per_page' => 4,
        'post_type' => 'page',
//        'orderby' => 'rand',
        'post_parent' => $services_id
      );
      $services_query = new WP_query( $args );
      // The Loop for articles
      if ($services_query->have_posts() ) {

        add_filter( 'excerpt_more', 'new_excerpt_more' );
        add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
        echo '<ul class="services-list">';
        while ( $services_query->have_posts() ) {
          $services_query->the_post();
          echo '<li>';
          echo '<figure>';
          the_post_thumbnail();
          echo '</figure>';
          echo '<article class="service-article">';
          echo '<a href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
          echo '<h3 class="services-title">' . get_the_title() . '</h3>';
          echo '</a>';
          echo '<div class="services-text">';
//          the_content('Read more');
          the_excerpt();

          
          echo '</div>';
          echo '</article>';
          echo '</li>';
        }
        echo '</ul>';
      }
      /* Restore original Post Data */
      wp_reset_postdata();
    ?>
  </div><!-- .indent -->
</section><!-- #services -->

<section id="flightsearch">
  <div class="container">
    Aviasales
  </div><!--container-->
</section><!--flightsearch-->
<?php get_footer(); ?>