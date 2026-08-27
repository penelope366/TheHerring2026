<?php get_header(); ?>

<div class="container-fluid px-0" style="width: 85%; margin-left: auto; margin-right: auto;">
  <div style="display: flex; align-items: center; gap: 1rem; ">
    <h2 class="h2 mb-3 mt-2"><?php single_cat_title(); ?></h2>
    <hr style="flex-grow: 1; border: none; border-top: 1px solid black;">
  </div>

  <section class="row g-4 align-items-start mb-4">
  <?php
  $post_count = 0;
  
  if ( have_posts() ) :
    while ( have_posts() && $post_count < 5 ) : the_post();
      $post_count++;
      
      $categories    = get_the_category();
      $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
      $category_link = ! empty( $categories ) ? esc_url( get_category_link( $categories[0]->term_id ) ) : '#';
  
      if ( $post_count === 1 ) :
  ?>
        <article class="col-md-7 border-end-md pe-md-4">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'large', array( 'class' => 'a4-landscape-img img-fluid w-100 mb-2' ) );
            } else {
              echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100 mb-2" alt="Featured Article">';
            }
            ?>
          </a>
          <h2 class="h3 mb-2 text-dark">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <p class="h6 text-muted">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>
  
        <aside class="col-md-5 ps-md-4 d-flex flex-column gap-4">
  
  <?php 
      else : 
  ?>
        <article class="row g-3 align-items-start">
          <div class="col-4">
            <a href="<?php the_permalink(); ?>">
              <?php 
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100' ) );
              } else {
                echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100" alt="Article">';
              }
              ?>
            </a>
          </div>
          <div class="col-8">
            <h3 class="h5 mb-1">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
          </div>
        </article>
  <?php 
      endif;
    endwhile;
  
    if ( $post_count > 1 ) :
  ?>
        </aside>
  <?php 
    endif;
  else :
  ?>
    <p class="col-12">No articles found in this category.</p>
  <?php endif; ?>
  </section>

  <!-- INFORMATIVE SECTION -->
   <hr>
  <div class="row g-4 mb-3">
  <?php
  $cat_id = get_queried_object_id();
  $infinite_query = new WP_Query( array( 
    'cat'  => $cat_id, 
    'posts_per_page' => 4,
    'offset' => 5,
) );
  if ( $infinite_query->have_posts() ) :
    while ( $infinite_query->have_posts() ) : $infinite_query->the_post();
  ?>
      <div class="col-md-3">
        <a href="<?php the_permalink(); ?>">
          <?php 
          if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100 mb-2' ) );
          } else {
            echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100 mb-2" alt="' . esc_attr( get_the_title() ) . '">';
          }
          ?>
        </a>
        <p class="mb-1 text-uppercase small text-muted fw-bold">
          <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a> | <?php the_time( 'j F Y' ); ?>
        </p>
        <h3 class="h5 mb-1">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
      </div>
  <?php 
    endwhile;
    wp_reset_postdata();
  endif; 
  ?>
  </div>

  <section class="my-4">
    <a href="#" class="promo-banner mb-2">
      <p class="banner-heading">Enjoying the Herring so far? Sign up for our newsletter to read more!</p>
    </a>
  </section>

<!-- infinite scroll --> 
<div id="article-feed" class="container my-4">
  <?php
  $cat_id = get_queried_object_id();
  $infinite_query = new WP_Query( array( 
      'cat'    => $cat_id, 
      'offset' => 9,
  ) );

  if ( $infinite_query->have_posts() ) :
      
      while ( $infinite_query->have_posts() ) : $infinite_query->the_post();
  ?>
        <article class="row py-4 border-bottom align-items-center">
          <div class="col-md-3">
            <a href="<?php the_permalink(); ?>">
              <?php 
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'medium', array( 'class' => 'img-fluid a4-landscape-img' ) );
              } else {
                echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="img-fluid a4-landscape-img" alt="' . esc_attr( get_the_title() ) . '">';
              }
              ?>
            </a>
          </div>
          <div class="col-md-9">
            <h2 class="h4 mt-2 fw-bold">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="text-secondary"><?php the_excerpt(); ?></div>
            <p class="small text-uppercase mb-0">
              By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?>
            </p>
          </div>
        </article>
  <?php 
      endwhile; 
      wp_reset_postdata();

  else : 
  ?>
      <p class="text-muted">No additional articles found.</p>
  <?php 
  endif;
  ?>
</div>
</div>
<hr>
<?php get_footer(); ?>