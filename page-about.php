<?php get_header(); ?>

<div class="page-header">

    <div class="page-type">
        <?php $title_args = [
            'taxonomy_type' => 'about',
            'page_title'    => 'ABOUT',
            'page_subtitle' => '会社概要',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>
    </div><!-- /.works-title -->

</div><!-- /.works-header -->


<section class="section--content section--about">
    <div class="section--inner">


    </div>
</section>

<?php get_footer(); ?>
