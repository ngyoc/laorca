<?php get_header(); ?>

<div class="page-header">

    <?php echo '<img src=' . get_option('page_header_image_blog') . '>'; ?>

    <div class="page-type">
        <?php $title_args = [
            'taxonomy_type' => 'blog',
            'page_title'    => 'BLOG',
            'page_subtitle' => 'ブログ',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div><!-- /.works-title -->

</div><!-- /.works-header -->


<section class="section--content section--blog">
    <div class="section--inner">

        <?php
        $args = [
            'category_slag'  => 'blog',
            'posts_per_page' => 12,
        ];

        get_template_part('template/post_blog', null, $args);
        ?>

    </div>
</section>

<?php get_footer(); ?>
