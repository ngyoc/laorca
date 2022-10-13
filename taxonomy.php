<?php get_header(); ?>

<?php
$term_object = get_queried_object(); // タームオブジェクトを取得
$term_slug   = $term_object->slug; // タームスラッグ
?>

<div class="archives-header page-header">

    <?php echo '<img src=' . get_option('page_header_image_work') . '>'; ?>

    <!-- <?php echo $taxonomy; ?> -->

    <div class="archives-type">
        <?php $title_args = [
            'title_slag'    => 'works',
            'page_title'    => urldecode($term),
            'page_subtitle' => '実績',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div><!-- /.archives-title -->

</div><!-- /.single-header -->

<section class="section--archives">
    <div class="section--inner">

        <p>This is taxonomy.php</p>

        <!-- <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
            <?php endwhile;
                else : ?>
            <p>記事はありません</p>
        <?php endif; ?> -->

        <?php

        $args = array(
            'post_type' => 'works',
            'taxonomy' => 'works-cat',
            'term' => $term_slug,
            'posts_per_page' => -1 // -1にすると全件表示
        );
        $custom_query = new WP_Query($args); ?>
        <ul class="post-list">
            <?php
            /* Start the Loop */
            if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) :
                    $custom_query->the_post();
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

    <?php echo '<div class="' . $taxonomy_type . '-viewmore post-viewmore">' ?>
    <!-- <a href="<?php the_permalink(); ?>">詳しく見る</a> -->
    <p>詳しく見る</p>
    </div>
    </a>
    </li>
<?php endwhile; ?>
</ul>
<?php endif; ?>


<?php if (!is_front_page()) : ?>

    <?php
    $pagenation_args = [
        'the_query'  => $the_query,
        'paged'     => $paged,
        'pagenation_type' => 'post'
    ];

    get_template_part('template/pagenation', null, $pagenation_args);

    ?>
<?php endif; ?>

</div>
</section>

<?php get_footer(); ?>
