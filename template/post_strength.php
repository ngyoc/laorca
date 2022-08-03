<?php
$taxonomy_type = $args['taxonomy_type'];
$page_title = $args['page_title'];
?>

<?php echo '<div class="section--' . $taxonomy_type . '-title-wrap section-title-wrap">' ?>
       <!-- <div class="section--strength-title-wrap section-title-wrap"> -->

    <?php echo '<div class="section--' . $taxonomy_type . '-title section-title">' ?>
       <!-- <div class="section--strength--title section-title"> -->
        <h2><p>STRENGTH</p></h2>
    </div><!-- /.section--strength--title -->

    <?php echo '<div class="section--' . $taxonomy_type . '-subtitle section-subtitle">' ?>
    <!-- <div class="section--strength--subtitle section-subtitle"> -->
        <p>私達の強み</p>
    </div><!-- /.section--strength--subtitle -->

</div><!-- /.section--strength-title-wrap -->

<?php echo '<ul class="' . $taxonomy_type . '-list">' ?>

    <?php
    $paged = get_query_var('paged');
    $args_arr = array(
        'paged' => $paged,
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
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

        <div class="post_thumbnail">
            <!-- <?php the_post_thumbnail(); ?> -->
        </div>

        <?php echo '<div class="' . $taxonomy_type . '-title post-title">' ?>
            <!-- <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> -->
            <span><?php the_title(); ?></span>
        </div>

        <?php echo '<div class="' . $taxonomy_type . '-excerpt post-excerpt">' ?>
                <?php echo mb_substr(get_the_excerpt(), 0, 100); ?>
        </div>

        <?php echo '<div class="' . $taxonomy_type . '-viewmore post-viewmore">' ?>
            <a href="<?php the_permalink(); ?>">詳しく見る</a>
        </div>

    </li>

    <?php endwhile; ?>

<?php wp_reset_postdata();
endif; ?>

</ul>
