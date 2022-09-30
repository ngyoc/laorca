<?php get_header(); ?>

<div class="works-header page-header">

    <?php echo '<img src=' . get_option('page_header_image_work') . '>'; ?>

    <div class="page-type">
        <?php $title_args = [
            'title_slag'    => 'works',
            'page_title'    => 'WORKS',
            'page_subtitle' => '実績',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div>

</div>


<section class="section--content section--works">
    <div class="section--inner">

        <?php
        $args = [
            'taxonomy_type'  => 'works',
        ];

        get_template_part('template/post_works', null, $args);
        ?>

    </div>
</section>

<?php get_footer(); ?>
