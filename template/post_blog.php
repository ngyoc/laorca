<?php
$category_slag = $args['category_slag'];
$posts_per_page = $args['posts_per_page'];
?>

<?php echo '<ul class="' . $category_slag . '-list post-list">' ?>

<?php
$paged = get_query_var('paged');

$args_arr = array(
    'paged' => $paged,
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
);

$the_query = new WP_Query($args_arr);
if ($the_query->have_posts()) :
?>

    <?php global $previousday;
    while ($the_query->have_posts()) : $the_query->the_post();
        $previousday = '';

        $category = get_the_category();
        $cat = $category[0];

        //カテゴリー名
        $cat_name = $cat->name; ?>

        <li>
            <a href="<?php the_permalink(); ?>">
                <div class="blog-list-inner">

                    <div class="blog-topbar">
                        <p class="blog-cat"><?php echo $cat_name; ?></p>
                        <p class="blog-postdate"><?php the_time('Y/m/d') ?></p>
                    </div><!-- /.blog-topbar -->

                    <?php echo '<div class="blog-title post-title">' ?>
                    <span><?php echo wp_trim_words(get_the_title(), $num_words = 55, $more = null); ?></span>
                </div>

                <?php echo '<div class="' . $taxonomy_type . '-excerpt post-excerpt">' ?>
                <?php echo wp_trim_words(get_the_excerpt(), $num_words = 75, $more = null); ?>


                </div>

                </div><!-- /.blog-list-inner -->
            </a>
        </li>

    <?php endwhile; ?>

<?php wp_reset_postdata();
endif; ?>

</ul>

<?php if (!is_front_page()) : ?>

    <?php
    $pagenation_args = [
        'the_query'  => $the_query,
        'paged'     => $paged,
        'pagenation_type' => 'post'
    ];

    get_template_part('template/pagenation', null, $pagenation_args); ?>

<?php endif; ?>
