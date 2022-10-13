<?php get_header(); ?>

<div class="single-header">

    <?php echo '<img src=' . get_option('page_header_image_strength') . '>'; ?>

    <div class="single-type">
        <?php $title_args = [
            'title_slag'    => 'strength',
            'page_title'    => 'STRENGTH',
            'page_subtitle' => '我が社の強み',
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

        </div><!-- /.single-about -->

        <div class="post-content">
            <?php the_content(); ?>
        </div><!-- /.post-content -->


    </div>
</section>

<?php get_footer(); ?>
