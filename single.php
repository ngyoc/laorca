<?php get_header(); ?>

<div class="single-header">

    <div class="single-type">
        <?php $title_args = [
            'title_slag'    => 'blog',
            'page_title'    => 'BLOG',
            'page_subtitle' => 'ブログ',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div>

</div>


<section class="section--single ">
    <div class="section--inner">

        <div class="post-about">

            <div class="post-title">
                <h1><?php the_title(); ?></h1>
            </div><!-- /.single-title -->

            <div class="post-category">
                <?php $taxonomy_args = [
                    'taxonomy_slag' => 'works-cat',
                    'flag_link' => false,
                    'cat_or_tag' => 'cat'
                ]
                ?>

                <p>カテゴリー：<?php get_template_part('template/echo_post_taxonomy', null, $taxonomy_args); ?></p>

            </div><!-- /.single-category -->

            <div class="post-tag">
                <?php $taxonomy_args = [
                    'taxonomy_slag' => 'works-tag',
                    'flag_link' => false,
                    'cat_or_tag' => 'tag'
                ]
                ?>

                <p>タグ：<?php get_template_part('template/echo_post_taxonomy', null, $taxonomy_args); ?></p>

            </div><!-- /.post-tag -->

        </div><!-- /.single-about -->

        <div class="post-content">
            <?php the_content(); ?>
        </div><!-- /.post-content -->

        <?php get_template_part('template/link_post_nextprev') ?>

    </div>
</section>

<?php get_footer(); ?>
