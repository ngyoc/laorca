<?php
$page_title = $args['page_title'];
$posts_per_page = $args['posts_per_page'];
?>

<?php echo '<div class="section--blog-title-wrap section-title-wrap">' ?>

    <?php echo '<div class="section--blog-title section-title">' ?>
        <?php echo ' <h2><p>' . $page_title . '</p></h2>' ?>
    </div><!-- /.section--strength--title -->

    <?php echo '<div class="section--blog-subtitle section-subtitle">' ?>
        <p>ブログ</p>
    </div><!-- /.section--strength--subtitle -->

</div><!-- /.section--strength-title-wrap -->

<?php echo '<ul class="blog-list post-list">' ?>

    <?php
    $args_arr = array(
        'posts_per_page' => $posts_per_page,
        'category_name' => $category_slag,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC'
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
        $cat_name = $cat->name;?>

    <li>
        <a href="<?php the_permalink(); ?>">
            <div class="blog-list-inner">

                <div class="blog-topbar">
                    <p class="blog-cat"><?php echo $cat_name; ?></p>
                    <p class="blog-postdate"><?php the_time('Y/m/d') ?></p>
                </div><!-- /.blog-topbar -->

                <?php echo '<div class="blog-title post-title">' ?>
                    <span><?php the_title(); ?></span>
                </div>

                <?php echo '<div class="' . $taxonomy_type . '-excerpt post-excerpt">' ?>
                    <?php echo mb_substr(get_the_excerpt(), 0, 100); ?>
                </div>

            </div><!-- /.blog-list-inner -->
        </a>
    </li>

    <?php endwhile; ?>

<?php wp_reset_postdata();
endif; ?>

</ul>
