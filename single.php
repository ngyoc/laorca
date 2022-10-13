<?php get_header(); ?>

<div class="single-header">

    <?php echo '<img src=' . get_option('page_header_image_blog') . '>'; ?>

    <div class="single-type">
        <?php $title_args = [
            'title_slag'    => 'blog',
            'page_title'    => 'BLOG',
            'page_subtitle' => 'ブログ',
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

        <?php get_template_part('template/link_post_nextprev') ?>

    </div>
</section>

<?php get_footer(); ?>
