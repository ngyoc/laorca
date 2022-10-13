<?php
$taxonomy_type = $args['taxonomy_type'];
?>

<?php echo '<ul class="' . $taxonomy_type . '-list post-list">' ?>

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args_arr = array(
    'paged' => $paged,
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'post_type' => $taxonomy_type,
    'orderby' => 'date',
    'order' => 'DESC'
);

$the_query = new WP_Query($args_arr);
if ($the_query->have_posts()) :
?>

    <?php global $previousday;
    while ($the_query->have_posts()) : $the_query->the_post();
        $previousday = '';
    ?>

        <li>
            <a href="<?php the_permalink(); ?>">

                <div class="post-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('post-thumbnail', array('alt' => get_the_title(),)); ?>
                    <?php else : ?>
                        <img src="<?php echo get_option('default_thumbnail'); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>

                <?php echo '<div class="' . $taxonomy_type . '-title post-title">' ?>
                <span><?php the_title(); ?></span>
                </div>

                <?php echo '<div class="' . $taxonomy_type . '-excerpt post-excerpt">' ?>
                <?php echo mb_substr(get_the_excerpt(), 0, 100); ?>
                </div>

                <?php echo '<div class="' . $taxonomy_type . '-viewmore post-viewmore">' ?>
                <p>詳しく見る</p>
                </div>

            </a>
        </li>

    <?php endwhile; ?>

<?php wp_reset_postdata();
endif; ?>

</ul>
