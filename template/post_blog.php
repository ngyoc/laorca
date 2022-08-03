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
    ?>

    <li>

        <div class="post_thumbnail">
            <!-- <?php the_post_thumbnail(); ?> -->
        </div>

        <?php echo '<div class="blog-title post-title">' ?>
            <span><?php the_title(); ?></span>
        </div>

        <?php echo '<div class="blog-viewmore post-viewmore">' ?>
            <a href="<?php the_permalink(); ?>">詳しく見る</a>
        </div>

    </li>

    <?php endwhile; ?>

<?php wp_reset_postdata();
endif; ?>

</ul>
