<?php get_header(); ?>

<main>
  <?php
  $author = get_queried_object();
  $author_id = $author->ID;
  $author_name = $author->display_name;
  $author_bio = get_the_author_meta( 'description', $author_id );
  $author_position = get_the_author_meta( 'author_position', $author_id );
  ?>

  <!-- Author Profile Header -->
  <header class="row py-4 mb-4 align-items-center">
    <div class="col-md-3 mb-3 mb-md-0">
      <?php echo get_avatar( $author_id, 120, '', $author_name, array( 'class' => 'img-fluid rounded' ) ); ?>
    </div>
    <div class="col-md-9">
      <h1 class="h4 fw-bold mb-1"><?php echo esc_html( $author_name ); ?></h1>
      
      <?php if ( ! empty( $author_position ) ) : ?>
        <p class="text-uppercase fw-bold text-secondary small mb-2"><?php echo esc_html( $author_position ); ?></p>
      <?php endif; ?>

      <?php if ( ! empty( $author_bio ) ) : ?>
        <p class="body-text text-muted mb-0"><?php echo esc_html( $author_bio ); ?></p>
      <?php else : ?>
        <p class="text-muted mb-0">Staff writer for The Herring.</p>
      <?php endif; ?>
    </div>
  </header>

  <h3 class="fw-bold mb-4 pb-2 border-bottom">Articles by <?php echo esc_html( $author_name ); ?></h3>

  <!-- Author's Article List -->
  <?php if ( have_posts() ) : ?>
    <div class="row g-4 mb-3">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-4">
          <article class="h-100">
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium', array( 
                  'class' => 'img-fluid w-100 mb-2 a4-landscape-img', 
                ) ); ?>
              </a>
            <?php endif; ?>
            <span class="text-uppercase small fw-bold text-muted mb-1 d-block"><?php the_category( ', ' ); ?></span>
            <h5 class="h5 fw-bold mb-1">
              <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none"><?php the_title(); ?></a>
            </h5>
            <p class="text-muted small mb-0"><?php echo get_the_date(); ?></p>
          </article>
        </div>
      <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-5">
      <?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => 'Previous', 'next_text' => 'Next' ) ); ?>
    </div>

  <?php else : ?>
    <p>No articles published by this author yet.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>