<?php
/*
Template Name: Archive events
*/
?>

<!doctype html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php

    $block_header = do_blocks( '
    <!-- wp:template-part {"slug":"header","theme":"stekjesruil"} /-->
    '
    );

    $block_footer = do_blocks( '
    <!-- wp:template-part {"slug":"footer","theme":"stekjesruil"} /-->
    '
    );

    ?>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
      <div class="wp-site-blocks">
        <?php echo $block_header ?>
        <!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
        <main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70)">
          <!-- wp:group {"layout":{"type":"constrained"}} -->
          <div class="wp-block-group">

            <div class="events-query">
              <ul class="events">
                <?php
                  $allEvents = new WP_Query(array(
                    'post_per_page' => 6,
                    'post_type' => 'event'
                  ));

                  while($allEvents -> have_posts()) {
                    $allEvents -> the_post(); ?>
                      <li class="event__item">
                        <figure class="event__image">
                            <?php the_post_thumbnail( 'large' );  ?>
                        </figure>
                        <div class="event__description">
                          <?php the_title( sprintf( '<h2 class="event__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                          <?php the_excerpt(); ?>
                        </div>
                        <div>
                        <p><?php
                              $eventDate = new DateTime(get_field('datum'));
                              setlocale(LC_TIME, 'NL_nl');
                              setlocale(LC_ALL, 'nl_NL');
                              echo $eventDate -> format('l d F Y');
                            ?></p>
                        </div>
                      </li>
                  <?php }
                ?>
              </ul>
            </div>

          </div>
          <!-- /wp:group -->

        </main>
        <!-- /wp:group -->

        <?php echo $block_footer ?>
      </div>
  </body>
</html>