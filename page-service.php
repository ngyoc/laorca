<?php get_header(); ?>

<div class="page-header">
    <div class="page-type">

        <?php echo '<img src=' . get_option('page_header_image_service') . '>'; ?>

        <?php
        $title_args = [
            'taxonomy_type'  => 'service',
            'page_title'     => 'SERVICE',
            'page_subtitle' => 'サービス',
        ];

        get_template_part('template/echo_section_title', null, $title_args);

        ?>
    </div>
</div>


<section class="section--content section--services">
    <div class="section--inner">

        <!-- <p>作成中</p> -->
        <?php
        $args = [
            'taxonomy_type'  => 'services',
            'page_title'     => 'SERVICES',
        ];

        get_template_part('template/post_services', null, $args);
        ?>



    </div>
</section>

<?php get_footer(); ?>
