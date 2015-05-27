      </div>
      <div id="wrap-footer" class="wrap-footer">
        <footer id="colophon" class="site-footer" role="contentinfo">
         <div class="site-info">
           <p>&copy; <?php echo date("Y"); ?> Туристическое агентство &laquo;Макалу&raquo;</p>
         </div>
          <nav id="site-footer-navigation" role="navigation">
            <?php wp_nav_menu( array( 
  'theme_location'  => 'footer',
  'menu_id'         => 'menu-social',
  'menu_class'      => 'menu-social',
  'link_before'     => '<span class="screen-reader-text">',
  'link_after'      => '</span>',
) ); ?>
          </nav>
        </footer>
      </div>
    </div>
  <?php wp_footer(); ?>
  </body>
</html>


