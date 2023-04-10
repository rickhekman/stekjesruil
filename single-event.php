<?php
/*
Template Name: Event detail page
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

            <div class="single-event">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="single-event__feature-image has-global-padding">
                  <?php  the_post_thumbnail('post-thumbnail'); ?>
                </div>
              <?php endif; ?>
              <div class="single-event__container entry-content wp-block-post-content has-global-padding is-layout-constrained">
                <h1 class="single-event__title"><?php the_title() ?></h1>

                <div class="single-event__datetime">
                  <div class="single-event__date">
                    <p><?php the_field('dag'); ?> <?php
                      $eventDate = new DateTime(get_field('datum'));
                      echo $eventDate -> format('d F Y');
                     ?>
                    </p>
                  </div>

                  <div class="single-event__time">
                    <p><?php the_field('begintijd'); ?> - <?php the_field('eindtijd'); ?></p>
                  </div>
                </div>


                <div class="single-event__content">
                  <?php the_content(); ?>
                </div>

                <div class="single-event__data">
                  <p><?php the_field('dag'); ?> <?php
                      $eventDate = new DateTime(get_field('datum'));
                      echo $eventDate -> format('d F Y');
                     ?></p>
                  <p><?php the_field('begintijd'); ?> - <?php the_field('eindtijd'); ?></p>
                </div>

              </div>



            </div>

          </div>
        <!-- /wp:group -->

        </main>
        <!-- /wp:group -->

        <?php echo $block_footer ?>
      </div>
  </body>
</html>