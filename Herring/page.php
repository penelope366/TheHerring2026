<?php get_header(); ?>

<main>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <article id="page-<?php the_ID(); ?>" <?php post_class( 'mx-auto' ); ?>>

      <!-- Page Title -->
      <h1 class="h1 bold mb-4 mt-3"><?php the_title(); ?></h1>

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image mb-4">
          <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid w-100 h-auto' ) ); ?>
        </div>
      <?php endif; ?>

      <!-- Page Content -->
      <div class="body-text">
        <?php the_content(); ?>
      </div>

    </article>

  <?php endwhile; endif; ?>
</main>

<br>

<hr>

<?php get_footer(); ?>