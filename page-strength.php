<?php get_header(); ?>

<div class="strength-header page-header">

    <div class="page-type">
        <?php $title_args = [
            'title_slag'  => 'strength',
            'page_subtitle'  => '実績',
            'page_title'     => 'STRENGTH',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div><!-- /.works-title -->

</div><!-- /.works-header -->


<section class="section--content section--strength">
    <div class="section--inner">

        <?php
        $args = [
            'taxonomy_type'  => 'strength',
        ];

        get_template_part('template/post_strength', null, $args);
        ?>

    </div>
</section>

<?php get_footer(); ?>
