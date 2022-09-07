<?php get_header(); ?>

<div class="single-header">

    <div class="single-type">
        <?php $title_args = [
            'taxonomy_type'  => 'works',
            'page_title'     => 'WORKS',
        ];
        get_template_part('template/echo-single-type', null, $title_args); ?>
    </div><!-- /.single-title -->


</div><!-- /.single-header -->

<section class="section--single section--works">
    <div class="section--inner">

        <!-- <p>This is single works page.</p> -->

        <div class="post-about">

            <div class="post-title">
                <h1><?php the_title(); ?></h1>
            </div><!-- /.single-title -->

            <div class="post-category">
                <!-- <p>カテゴリー：<?php get_template_part('template/echo_post_category'); ?></p> -->
                <p>カテゴリー：
                    <?php
                    $term = get_the_terms($post->ID, 'works-cat');
                    echo $term[0]->name;
                    ?>
                </p>
            </div><!-- /.single-category -->

            <div class="post-tag">
                <!-- <p>タグ：<?php get_template_part('template/echo_post_tag'); ?></p> -->
                <p>タグ：
                    <?php
                    $terms = get_the_terms($post->ID, 'works-tag');
                    foreach ((array)$terms as $term) {
                    ?>
                        <span><?php echo $term->name; ?></span>
                    <?php
                    }
                    ?>
                </p>
            </div><!-- /.post-tag -->

        </div><!-- /.single-about -->

        <?php if (has_post_thumbnail()) : ?>

            <div class="post-thumbnail single-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>

        <?php endif; ?>

        <div class="post-content">
            <?php the_content(); ?>
        </div><!-- /.post-content -->

        <?php get_template_part('template/link_post_nextprev') ?>


    </div>
</section>

<?php get_footer(); ?>
