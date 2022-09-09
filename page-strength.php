<?php get_header(); ?>

<div class="page-header">

    <div class="page-type">
        <?php $title_args = [
            'taxonomy_type'  => 'about',
            'page_title'     => 'ABOUT',
        ];
        get_template_part('template/echo-single-type', null, $title_args); ?>
    </div><!-- /.works-title -->

</div><!-- /.works-header -->


<section class="section--content">
    <div class="section--inner">

        <!-- <p>作成中</p> -->



    </div>
</section>

<?php get_footer(); ?>
