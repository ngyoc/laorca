<?php get_header(); ?>

<div class="page-header">

    <?php echo '<img src=' . get_option('page_header_image_service') . '>'; ?>

    <div class="page-type">
        <?php $title_args = [
            'taxonomy_type' => 'service',
            'page_title'    => 'SERVICE',
            'page_subtitle' => 'サービス',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div>
</div>


<section class="section--content section--services">
    <div class="section--inner">

        <?php
        $args = [
            'taxonomy_type'  => 'services',
        ];

        get_template_part('template/post_services', null, $args);
        ?>

    </div>
</section>

<?php get_footer(); ?>
