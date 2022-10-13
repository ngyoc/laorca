<?php get_header(); ?>

<div class="page-header">

    <?php echo '<img src=' . get_option('page_header_image_about') . '>'; ?>

    <div class="page-type">
        <?php $title_args = [
            'taxonomy_type' => 'about',
            'page_title'    => 'ABOUT',
            'page_subtitle' => '会社概要',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>
    </div>

</div>


<section class="section--content section--about">
    <div class="section--inner">

        <div class="post-content">
            <?php the_content(); ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>
