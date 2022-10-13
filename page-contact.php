<?php get_header(); ?>

<div class="works-header page-header">

    <?php echo '<img src=' . get_option('page_header_image_contact') . '>'; ?>

    <div class="page-type">
        <?php $title_args = [
            'title_slag'    => 'contact',
            'page_title'    => 'CONTACT',
            'page_subtitle' => '問い合わせ',
        ];

        get_template_part('template/echo_section_title', null, $title_args);
        ?>

    </div>
</div>


<section class="section--content section--works">
    <div class="section--inner">

        <div class="post-content">
            <?php the_content(); ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>
