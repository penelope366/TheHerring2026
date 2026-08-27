<?php get_header(); ?>

<div class="container-fluid px-0" style="width: 85%; margin-left: auto; margin-right: auto;">
  
  <!-- MAIN HERO SECTION --> 
  <br>
  <section class="row g-4 align-items-start">
  <?php
  $hero_query = new WP_Query( array( 'posts_per_page' => 5 ) );
  $post_count = 0;

  if ( $hero_query->have_posts() ) :
    while ( $hero_query->have_posts() ) : $hero_query->the_post();
      $post_count++;
      $categories = get_the_category();
        $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
        $category_link = ! empty( $categories ) ? esc_url( get_category_link( $categories[0]->term_id ) ) : '#';

      // Article 1
      if ( $post_count === 1 ) :
  ?>
        <article class="col-md-6 border-end-md pe-md-4">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'large', array( 'class' => 'a4-landscape-img img-fluid w-100 mb-2' ) );
            } else {
              echo '<img src="' . get_template_directory_uri() . '/logo.png" class="a4-landscape-img img-fluid w-100 mb-2">';
            }
            ?>
          </a>
          <p class="mb-1 text-uppercase medium text-muted fw-bold">
          <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
        </p>
          <h2 class="h3 mb-2 text-dark">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <?php the_excerpt(); ?>
          <p class="h6 fw-bold text-muted">
            By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?>
          </p>
        </article>

        <!-- Open First Sidebar Column -->
        <aside class="col-md-3 ps-md-4 d-flex flex-column gap-4">

  <?php 
      elseif ( $post_count === 2 || $post_count === 3 ) : 
  ?>
        <article class="row g-1 align-items-start">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100' ) );
            }
            ?>
          </a>
          <p class="text-uppercase small text-muted fw-bold mb-1 mt-1">
          <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
          </p>
          <h3 class="h5 mt-0 mb-1">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>

  <?php 
        if ( $post_count === 3 ) : 
  ?>
        </aside>
        <aside class="col-md-3 ps-md-4 d-flex flex-column gap-4">
  <?php 
        endif;

      else : 
  ?>
        <article class="row g-1 align-items-start">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100' ) );
            }
            ?>
          </a>
          <p class="text-uppercase small text-muted fw-bold mb-1 mt-1">
          <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
          </p>
          <h3 class="h5 mt-0 mb-1">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>
  <?php 
      endif;
    endwhile;
    wp_reset_postdata();
  ?>
        </aside>
  <?php endif; ?>
  </section>

  <hr class="my-4">

  <!-- INFORMATIVE SECTION -->
  <h2 class="h3 mb-4">Informative</h2>
  <div class="row g-4 mb-3">
  <?php
  $informative_query = new WP_Query( array( 
    'category_name'  => 'informative', 
    'posts_per_page' => 4
  ) );
  if ( $informative_query->have_posts() ) :
    while ( $informative_query->have_posts() ) : $informative_query->the_post();
        $categories = get_the_category();
        $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
        $category_link = ! empty( $categories ) ? esc_url( get_category_link( $categories[0]->term_id ) ) : '#';
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
        <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?></p>
      </div>
  <?php 
    endwhile;
    wp_reset_postdata();
  endif; 
  ?>
  </div>

  <section class="my-4">
    <a href="#footer" class="promo-banner mb-2">
      <p class="banner-heading">Enjoying the Herring so far? Sign up for our newsletter to read more!</p>
    </a>
  </section>

  <!-- CULTURE SECTION -->
  <div style="display: flex; align-items: center; gap: 1rem;">
    <h2 class="h2 mb-3 mt-2">Culture</h2>
    <hr style="flex-grow: 1; border: none; border-top: 1px solid black;">
  </div>

  <section class="row g-4 align-items-start mb-4">
  <?php
  $culture_query = new WP_Query( array( 
    'category_name'  => 'culture',
    'posts_per_page' => 5
  ) );
  $culture_count = 0;

  if ( $culture_query->have_posts() ) :
    while ( $culture_query->have_posts() ) : $culture_query->the_post();
      $culture_count++;
      $categories = get_the_category();
        $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
        $category_link = ! empty( $categories ) ? esc_url( get_category_link( $categories[0]->term_id ) ) : '#';

      if ( $culture_count === 1 ) :
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
          <p class="mb-1 text-uppercase medium text-muted fw-bold">
          <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
        </p>
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
            <p class="mb-1 text-uppercase small text-muted fw-bold">
            <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
            </p>
            <h3 class="h5 mb-1">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
          </div>
        </article>
  <?php 
      endif;
    endwhile;
    wp_reset_postdata();
  ?>
      </aside>
  <?php endif; ?>
  </section>


  <!-- POLITICS SECTION -->
  <div style="display: flex; align-items: center; gap: 1rem;">
   <hr style="flex-grow: 1; border: none; border-top: 1px solid black;">
  <h2 class="h2 mb-3 mt-2">Politics</h2>

  </div>

  <section class="row g-4 align-items-start mb-4">
  <?php
  $politics_query = new WP_Query( array( 
    'category_name'  => 'politics',
    'posts_per_page' => 5
  ) );
  $politics_count = 0;

  if ( $politics_query->have_posts() ) :
    while ( $politics_query->have_posts() ) : $politics_query->the_post();
      $politics_count++;
      $categories = get_the_category();
        $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
        $category_link = ! empty( $categories ) ? esc_url( get_category_link( $categories[0]->term_id ) ) : '#';
      

      if ( $politics_count === 1 ) :
  ?>
        <aside class="col-md-3 pe-md-4 d-flex flex-column gap-4">
  <?php endif; ?>

  <?php if ( $politics_count === 1 || $politics_count === 2 ) : ?>
        <article class="row g-1 align-items-start">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100' ) );
            } else {
              echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100" alt="Article">';
            }
            ?>
          </a>
          <p class="mb-1 text-uppercase small text-muted fw-bold">
            <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
            </p>
          <h3 class="h5 mb-1">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>
  <?php endif; ?>

  <?php if ( $politics_count === 2 ) : ?>
        </aside>
        <aside class="col-md-3 pe-md-4 d-flex flex-column gap-4">
  <?php endif; ?>

  <?php if ( $politics_count === 3 || $politics_count === 4 ) : ?>
        <article class="row g-1 align-items-start">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'medium', array( 'class' => 'a4-landscape-img img-fluid w-100' ) );
            } else {
              echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100" alt="Article">';
            }
            ?>
          </a>
          <p class="mb-1 text-uppercase small text-muted fw-bold">
            <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
            </p>
          <h3 class="h5 mb-1">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>
  <?php endif; ?>

  <?php if ( $politics_count === 4 ) : ?>
        </aside>
  <?php endif; ?>

  <?php 
      if ( $politics_count === 5 ) : 
  ?>
        <article class="col-md-6 border-start-md ps-md-4">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'large', array( 'class' => 'a4-landscape-img img-fluid w-100 mb-2' ) );
            } else {
              echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100 mb-2" alt="Featured Article">';
            }
            ?>
          </a>
          <p class="mb-1 text-uppercase medium text-muted fw-bold">
            <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
            </p>
          <h2 class="h3 mb-2 text-dark">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <?php the_excerpt(); ?>
          <p class="h6 text-muted">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>
  <?php 
      endif;
    endwhile;
    wp_reset_postdata();
  endif; 
  ?>
  </section>

  <!-- OPINION SECTION -->
  <div style="display: flex; align-items: center; gap: 1rem;">
    <h2 class="h2 mb-3 mt-2">Opinion</h2>
    <hr style="flex-grow: 1; border: none; border-top: 1px solid black;">
  </div>

  <section class="row g-4 align-items-start mb-4">
  <?php
  $opinion_query = new WP_Query( array( 
    'category_name'  => 'opinion',
    'posts_per_page' => 5
  ) );
  $opinion_count = 0;

  if ( $opinion_query->have_posts() ) :
    while ( $opinion_query->have_posts() ) : $opinion_query->the_post();
      $opinion_count++;
      $categories = get_the_category();
        $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
        $category_link = ! empty( $categories ) ? esc_url( get_category_link( $categories[0]->term_id ) ) : '#';

      if ( $opinion_count === 1 ) :
  ?>
        <aside class="col-md-5 pe-md-4 d-flex flex-column gap-4">
  <?php endif; ?>

  <?php if ( $opinion_count >= 1 && $opinion_count <= 4 ) : ?>
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
          <p class="mb-1 text-uppercase small text-muted fw-bold">
            <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
            </p>
            <h3 class="h5 mb-1">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="text-muted small mb-0">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
          </div>
        </article>
  <?php endif; ?>

  <?php if ( $opinion_count === 4 ) : ?>
        </aside>
  <?php endif; ?>

  <?php 
      if ( $opinion_count === 5 ) : 
  ?>
        <article class="col-md-7 border-start-md ps-md-4">
          <a href="<?php the_permalink(); ?>">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'large', array( 'class' => 'a4-landscape-img img-fluid w-100 mb-2' ) );
            } else {
              echo '<img src="' . get_template_directory_uri() . '/images/smiley.jpeg" class="a4-landscape-img img-fluid w-100 mb-2" alt="Featured Article">';
            }
            ?>
          </a>
          <p class="mb-1 text-uppercase medium text-muted fw-bold">
            <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
            </p>
          <h2 class="h3 mb-2 text-dark">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <p class="h6 text-muted">By <?php the_author_posts_link(); ?> | <?php the_time( 'j F Y' ); ?></p>
        </article>
  <?php 
      endif;
    endwhile;
    wp_reset_postdata();
  endif; 
  ?>
  </section>

</div>

<hr>


<?php get_footer(); ?>