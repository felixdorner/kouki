<?php
/**
 * Template Name: Home
 *
 * @package kouki
 */

get_header(); ?>



<?php
/**
 * Start module: Hero Message
 */
$message_data = of_get_option( 'kouki_message' );
/**
 * If there is data stored in the theme-options
 * we will trigger the section and display the message.
 */
if( $message_data ) : ?>

    <h1 class="pad-2 aligncenter">
      <?php echo $message_data; ?>
    </h1>

<?php endif; ?>



<?php
/**
 * Start module: Featured Portfolio Items
 */
$home_project_count = intval( of_get_option( 'kouki_home_project_count' ) );
/**
 * If there is a post-count set by theme-options greater than 0
 * we will trigger the section and display the data.
 */
if( $home_project_count > 0 ) : ?>

  <div class="projects js-masonry">

    <?php
    /**
     * First, let's see if we have the data in the cache already.
     */
    $portfolio = wp_cache_get( 'portfolio_home_query' );
    if( $portfolio == false ) {

      /**
       * Here we setup our query with the Jetpack Portfolio CPT.
       * We will only display items of tagged as 'featured'.
       */
      $args = array(
        'posts_per_page' => $home_project_count,
        'post_type' => 'jetpack-portfolio',
        'jetpack-portfolio-tag' => 'featured'
      );
      $portfolio = new WP_Query( $args );

      /**
       * Now, let's save the data to the cache.
       * In this case, we're telling the cache to expire the data after 300 seconds.
       */
      wp_cache_set( 'portfolio_home_query', $portfolio, '', 300 );

    }

    /**
     * Lets start our new query:
     */
    while ( $portfolio->have_posts() ) : $portfolio->the_post();

      get_template_part( 'content', 'portfolio-thumbs' );

    endwhile; ?>

  </div>

<?php endif; ?>



<?php
/**
 * Start module: Recent News
 */
$home_post_count = intval( of_get_option( 'kouki_home_post_count' ));
/**
 * If there is a post-count greater than 0 set via theme-options
 * we will trigger the whole section and display the data.
 */
if( $home_post_count > 0 ) : ?>

  <section class="blog pad-2-1 aligncenter">

    <h2 class="meta m-0-0-1 divider">

      <?php
      /**
       * Checking theme-options to echo the right title for this section.
       */
      $home_blog_title = of_get_option( 'kouki_home_blog_title' );
      echo $home_blog_title
      ?>

    </h2>

    <div class="js-masonry">

      <?php
      /**
       * First, let's see if we have the data in the cache already.
       */
      $news = wp_cache_get( 'news_home_query' );
      if( $news == false ) {

        /**
         * Here we setup a new query to display recent posts.
         */
        $args = array(
          'posts_per_page' => $home_post_count,
          'post_type' => 'post'
        );
        $news = new WP_Query( $args );

        /**
         * Now, let's save the data to the cache.
         * In this case, we're telling the cache to expire the data after 300 seconds.
         */
        wp_cache_set( 'news_home_query', $news, '', 300 );

      }

      /**
       * Lets start our new query:
       */
      while ( $news->have_posts() ) : $news->the_post(); ?>

        <article class="js-item col-6 pad-1">

          <?php if ( has_post_thumbnail() && of_get_option('kouki_home_post_show_featured_image') ) : ?>
            <div class="m-0-0-1 aligncenter">
              <a href="<?php the_permalink(); ?>">
                <?php echo get_the_post_thumbnail( $post->ID, 'kouki_thumb_medium' ) ?>
              </a>
            </div>
          <?php endif; ?>

          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <?php
          /**
           * Get the template for our meta-data.
           */
          get_template_part( 'content', 'post-meta' );
          ?>

          <hr>

        </article>

      <?php endwhile; ?>

    </div>

  </section>

<?php endif; ?>


<?php get_footer(); ?>