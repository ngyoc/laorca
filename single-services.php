<?php get_header(); ?>

<div class="single-header">

    <?php echo '<img src=' . get_option('page_header_image_service') . '>'; ?>

    <div class="single-type">
        <?php $title_args = [
            'title_slag'    => 'services',
            'page_title'    => 'SERVICES',
            'page_subtitle' => '事業内容',
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
            </div>

        </div>

        <div class="post-content">
            <?php the_content(); ?>
        </div </div>
</section>

<?php get_footer(); ?>
