<?php get_header(); ?>

<main class="container my-5">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mx-auto' ); ?> style="max-width: 800px;">

      <h1 class="fw-bold"><?php the_title(); ?></h1>
      <h5 class="meta-text">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?> | <?php the_category( ' ' ); ?></h5>    

      <!-- Article Body -->
      <div class="body-text">
        <?php the_content(); ?>
      </div>

      <!-- Article Footer / Tags -->
      <p class="meta-text">
        <?php the_tags( '<span class="me-2">Tags:</span>', ', ', '' ); ?>
      </p>

      <!-- Related Section -->
      <?php
      $categories = wp_get_post_categories( get_the_ID() );

      if ( ! empty( $categories ) ) :
          $related_args = array(
              'category__in'   => $categories,
              'post__not_in'   => array( get_the_ID() ),
              'posts_per_page' => 3,
              'orderby'        => 'rand',
          );

          $related_query = new WP_Query( $related_args );

          if ( $related_query->have_posts() ) : ?>
              <section class="my-4 pt-2 border-top">
                  <h4 class="mb-4 mt-4">Related</h4>
                  <div class="row g-4 mb-3">
                      <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                          <div class="col-md-4">
                              <?php if ( has_post_thumbnail() ) : ?>
                                  <a href="<?php the_permalink(); ?>">
                                      <?php the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100 mb-2' ) ); ?>
                                  </a>
                              <?php endif; ?>
                              <h3 class="h5 fw-bold mb-1">
                                  <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                      <?php the_title(); ?>
                                  </a>
                              </h3>
                              <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?></p>
                          </div>
                      <?php endwhile; ?>
                  </div>
              </section>
          <?php 
          endif;
          wp_reset_postdata();
      endif; 
      ?>

    </article>

  <?php endwhile; endif; ?>
</main>

<hr>
<?php get_footer(); ?>