<?php
  get_header();
  the_post();
?>

<div class="container">
  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
</div>

<?php get_footer(); ?>
