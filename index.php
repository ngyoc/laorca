<?php get_header(); ?>

<!-- body -->
<section class="section--hero">

    <div class="hero-wrapper">
        <div class="hero-box">
            <div class="hero-subtext"></div><!-- /.hero-subtext -->
            <div class="hero-title"></div><!-- /.hero-title -->
            <div class="hero-description">
                <p>BtoBには特有のマーケティング、採用、プロダクトの課題があります</p>
                <p>BtoBの勝ちパターンを網羅した180項目におよぶ独自のメソッドと140項目に及ぶ独自の制作ワークフローを駆使しながらマーケティング、デザイン、テクノロジーを組み合わせてBtoB企業の経営課題を丁寧に解決します。</p>
            </div><!-- /.hero-description -->
            <a href="#" class="hero-btn">制作について問い合わせる</a>
        </div><!-- /.hero-box -->
    </div><!-- /.hero-wrapper -->

</section><!-- /.hero -->

<section class="section--strength">
    <div class="section--inner">

    <?php
    $args = [
        'category_slag'  => 'マークアップ',
        'page_title'     => 'STRENGTH',
        'posts_per_page' => 4,
        'is_scrollanime' => false
    ];

    // get_template_part('template/post_section', null, $args);

    $category_slag = $args['category_slag'];
    $page_title = $args['page_title'];
    $posts_per_page = $args['posts_per_page'];
    $is_scrollanime = $args['is_scrollanime'];
    ?>

    <div class="section--strength-title-wrap section-title-wrap flex">
        <div class="section--strength--title section-title">
            <h2><p>STRENGTH</p></h2>
            <p>私達の強み</p>
        </div><!-- /.section--strength--title -->
    </div><!-- /.section--strength-title-wrap -->

    <?php echo '<ul class="' . $category_slag . '-list">' ?>

    <?php
        $paged = get_query_var('paged');
        $args_arr = array(
            'paged' => $paged,
            'posts_per_page' => $posts_per_page,
            'category_name' => $category_slag,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $the_query = new WP_Query($args_arr);
        if ($the_query->have_posts()) :
    ?>

    <?php global $previousday;
    while ($the_query->have_posts()) : $the_query->the_post();
        $previousday = '';
    ?>


    <li>
        <div class="post-detail-wrap">
            <?php echo '<div class="' . $category_slag . '-category-date  post-date">' ?>
                <span><?php the_time('Y/m/d') ?></span>
            </div>

            <?php echo '<div class="' . $category_slag . '-category-tag post-category-tag">' ?>
                <span>
                    <?php
                    get_template_part('template/echo_post_tag');
                    ?>
                </span>
            </div>

        </div>

        <?php echo '<div class="' . $category_slag . '-title post-title">' ?>
            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
        </div>
    </li>

            <?php endwhile; ?>

            <?php wp_reset_postdata();
            endif; ?>

        </ul>



    </div><!-- /.section--inner -->
</section><!-- /.section--strength -->


<section class="section--services">
    <div class="section--inner">


<?php
    $args = [
        'category_slag'  => '投稿フォーマット',
        'page_title'     => 'SERVICE',
        'posts_per_page' => 8,
        'is_scrollanime' => false
    ];

    // get_template_part('template/post_section', null, $args);

    $category_slag = $args['category_slag'];
    $page_title = $args['page_title'];
    $posts_per_page = $args['posts_per_page'];
    $is_scrollanime = $args['is_scrollanime'];
    ?>

    <div class="section--strength-title-wrap section-title-wrap flex">
        <div class="section--strength--title section-title">
            <h2><p>SERVICE</p></h2>
            <p>提供サービス</p>
        </div><!-- /.section--strength--title -->
    </div><!-- /.section--strength-title-wrap -->

    <?php echo '<ul class="' . $category_slag . '-list">' ?>

    <?php
        $paged = get_query_var('paged');
        $args_arr = array(
            'paged' => $paged,
            'posts_per_page' => $posts_per_page,
            'category_name' => $category_slag,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $the_query = new WP_Query($args_arr);
        if ($the_query->have_posts()) :
    ?>

    <?php global $previousday;
    while ($the_query->have_posts()) : $the_query->the_post();
        $previousday = '';
    ?>


    <li>
        <div class="post-detail-wrap">
            <?php echo '<div class="' . $category_slag . '-category-tag post-category-tag">' ?>
                <span>
                    <?php
                    get_template_part('template/echo_post_tag');
                    ?>
                </span>
            </div>

        </div>

        <?php echo '<div class="' . $category_slag . '-title post-title">' ?>
            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
        </div>
    </li>

            <?php endwhile; ?>

            <?php wp_reset_postdata();
            endif; ?>

        </ul>




    </div><!-- /.section--inner -->
</section><!-- /.section--services -->







<?php get_footer(); ?>
