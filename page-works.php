<?php get_header(); ?>

<div class="works-header">

    <div class="works-type">
        <?php $title_args = [
            'taxonomy_type'  => 'works',
            'page_title'     => 'WORKS',
        ];
        get_template_part('template/echo-single-type', null, $title_args); ?>
    </div><!-- /.works-title -->

</div><!-- /.works-header -->


<section class="section--works page-works">
    <div class="section--inner">

        <!-- <p>作成中</p> -->

        <?php
        $title_args = [
            'taxonomy_type'  => 'works',
            'page_title'     => 'WORKS',
        ];
        get_template_part('template/echo-post-category', null, $title_args);


        $args = [
            'taxonomy_type'  => 'works',
            'page_title'     => 'WORKS',
        ];
        get_template_part('template/post_works', null, $args);
        ?>

    </div>
</section>

<?php get_footer(); ?>
