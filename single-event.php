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
          <div class="wp-block-group entry-content wp-block-post-content has-global-padding is-layout-constrained">

            <div class="event">

              <?php if ( has_post_thumbnail() ) : ?>
                <div class="event__image">
                  <?php  the_post_thumbnail('post-thumbnail'); ?>
                </div>
              <?php endif; ?>

              <div class="event__date">
                <p><?php the_field('dag'); ?></p>
                <p><?php the_field('datum'); ?></p>
              </div>

              <div class="event__time">
                <p><?php the_field('start_evenement'); ?></p>
                <p><?php the_field('einde_evenement'); ?></p>
              </div>

              <div class="event__content">
                <?php the_content(); ?>
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