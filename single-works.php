<?php get_header(); ?>

<div class="works-header single-header">

    <?php echo '<img src=' . get_option('page_header_image_work') . '>'; ?>

    <div class="works-type">
        <?php $title_args = [
            'title_slag'    => 'works',
            'page_title'    => 'WORKS',
            'page_subtitle' => '実績',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div>

</div>

<section class="section--single section--works">
    <div class="section--inner">

        <div class="post-about">
            <div class="post-title">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>

        <?php if (has_post_thumbnail()) : ?>

            <div class="post-thumbnail single-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>

        <?php endif; ?>

        <div class="post-content">
            <?php the_content(); ?>
        </div>


        <div class="post-category">
            <?php $taxonomy_args = [
                'taxonomy_slag' => 'works-cat',
                'flag_link' => true,
                'cat_or_tag' => 'cat'
            ]
            ?>

            <p>カテゴリー：<?php get_template_part('template/echo_post_taxonomy', null, $taxonomy_args); ?></p>
        </div>

        <div class="post-tag">
            <?php $taxonomy_args = [
                'taxonomy_slag' => 'works-tag',
                'flag_link' => true,
                'cat_or_tag' => 'tag'
            ]
            ?>

            <!-- <p>タグ：<?php get_template_part('template/echo_post_taxonomy', null, $taxonomy_args); ?></p> -->
        </div>

        <?php get_template_part('template/link_post_nextprev') ?>

        <div class="link--post-tag">

        </div>


    </div>
</section>

<?php get_footer(); ?>
