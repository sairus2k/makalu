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
        echo '<a class="btn" href="' .  get_permalink( ) . '" title="Learn more about ' . get_the_title() . '">Подробнее</a>';
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
  <div class="wrap-content">
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
          echo '<li class="service-item">';
          echo '<figure>';
          the_post_thumbnail();
          echo '</figure>';
          echo '<article class="service-article">';
          echo '<a href="' . get_permalink() . '" title="Узнать больше про ' . get_the_title() . '">';
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

<section id="flightsearch" class="flightsearch">
  <div class="container">
   <h2 class="section-title">Найти билеты</h2>
    <?php if (wp_is_mobile()) {
      echo '<!--mobile form--><iframe scrolling="no" width="280" height="291" frameborder="0" src="//www.travelpayouts.com/widgets/9878df137cb667a5d280915bfb8b53b6.html?v=468"></iframe>';
    } else {
      echo '<!--desktop form--><iframe scrolling="no" width="940" height="252" frameborder="0" src="//www.travelpayouts.com/widgets/76de386357c8f97062487c1f35df872d.html?v=468"></iframe>';
    }?>


  </div><!--container-->
</section><!--flightsearch-->
<?php get_footer(); ?>