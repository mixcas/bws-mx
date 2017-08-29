<?php
get_header();
?>

<main id="main-content">
  <section id="posts">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $event_cats = wp_get_post_terms($post->ID, 'event_cat');
    $event_artists = get_post_artists($post->ID);
    $event_date_location = event_date_location($post->ID);
?>

      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <div class="container">
          <div class="grid-row margin-bottom-basic">
            <div class="grid-item item-s-12 item-l-6">
<?php
      if (!empty($event_cats)) {
?>
              <div class="font-sans margin-bottom-basic"><?php echo $event_cats[0]->name; ?></div>
<?php
      }
?>

              <h1 class="font-serif font-italic"><?php echo get_the_title($post->ID); ?></h1>

<?php
      if (!empty($event_artists)) {
?>
              <div class="font-serif"><?php echo $event_artists; ?></div>
<?php
      }

      if (!empty($event_date_location)) {
?>
              <div class="font-sans margin-top-small"><?php _e($event_date_location); ?></div>
<?php
      }
?>
            </div>
          </div>

          <div class="grid-row margin-bottom-basic">
            <div class="grid-item item-s-12 text-columns text-columns-s-1 text-columns-m-2 text-columns-l-3">
              <?php the_content(); ?>
            </div>
          </div>
        </div>

        <?php render_gallery($post->ID); ?>

        <?php
          if (!empty($event_artists)) {
            render_related_by_artist(get_artist_slug_array($post->ID));
          }
        ?>

      </article>

<?php
  }
}
?>

  </section>
</main>

<?php
get_footer();
?>