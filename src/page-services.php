<?php get_header(); ?>
 <section id="services" class="page-services">
  <div class="wrap-content">
    <?php 
      $query = new WP_Query( 'pagename=services' );
      $services_id = $query->queried_object->ID;
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

//        add_filter( 'excerpt_more', 'new_excerpt_more' );
//        add_filter( 'excerpt_length', 'custom_excerpt_length_100', 999 );
        echo '<ul class="services-list">';
        while ( $services_query->have_posts() ) {
          $services_query->the_post();
          echo '<li>';
          echo '<figure>';
          the_post_thumbnail();
          echo '</figure>';
          echo '<article class="service-article">';
          echo '<a href="' . get_permalink() . '" title="Узнать больше про ' . get_the_title() . '">';
          echo '<h3 class="services-title">' . get_the_title() . '</h3>';
          echo '</a>';
          echo '<div class="services-text">';
          the_content('Read more');
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
<?php get_footer(); ?>