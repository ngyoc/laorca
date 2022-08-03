<?php get_header(); ?>

<!-- body -->
<section class="section--hero">

    <div class="hero-wrapper">
        <div class="hero-image"></div><!-- /.hero-image -->
        <div class="hero-box">
            <div class="hero-subtext">Web Production</div><!-- /.hero-subtext -->
            <div class="hero-title">LA ORCA</div><!-- /.hero-title -->
            <div class="hero-description">
                <p>BtoBには特有のマーケティング、採用、プロダクトの課題があります</p>
                <p>BtoBの勝ちパターンを網羅した180項目におよぶ独自のメソッドと140項目に及ぶ独自の制作ワークフローを駆使しながらマーケティング、デザイン、テクノロジーを組み合わせてBtoB企業の経営課題を丁寧に解決します。</p>
            </div><!-- /.hero-description -->

            <div class="hero-contact-wrap flex">
                <div class="hero-contact">
                    <a href="#" class="hero-btn">制作について問い合わせる</a>
                </div><!-- /.hero-contact -->
            </div><!-- /.hero-contact-wrap -->
        </div><!-- /.hero-box -->
    </div><!-- /.hero-wrapper -->

</section><!-- /.hero -->

<section class="section--strength">
    <div class="section--inner">


<?php
    // $args = [
    //     'taxonomy_type'  => 'strength',
    //     'page_title'     => 'STRENGTH',
    // ];

    // get_template_part('template/post_strength', null, $args);
    ?>


    <?php
    $args = [
        'category_slag'  => 'markup',
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

    <div class="section--strength-title-wrap section-title-wrap">

        <div class="section--strength--title section-title">
            <h2><p>STRENGTH</p></h2>
        </div><!-- /.section--strength--title -->

        <div class="section--strength--subtitle section-subtitle">
            <p>私達の強み</p>
        </div><!-- /.section--strength--subtitle -->

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

                <div class="post_thumbnail">
                    <!-- <?php the_post_thumbnail(); ?> -->
                </div>

                <?php echo '<div class="' . $category_slag . '-title post-title">' ?>
                    <!-- <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> -->
                    <span><?php the_title(); ?></span>
                </div>

                <?php echo '<div class="' . $category_slag . '-excerpt post-excerpt">' ?>
                        <?php echo mb_substr(get_the_excerpt(), 0, 100); ?>
                </div>

                <?php echo '<div class="' . $category_slag . '-viewmore post-viewmore">' ?>
                    <a href="<?php the_permalink(); ?>">詳しく見る</a>
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
            'category_slag'  => 'postformat',
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

        <div class="section--service-title-wrap section-title-wrap">

            <div class="section--service--title section-title">
                <h2><p>SERVICE</p></h2>
            </div><!-- /.section--service--title -->

            <div class="section--service--subtitle section-subtitle">
                <p>提供サービス</p>
            </div><!-- /.section--service--subtitle -->

        </div><!-- /.section--service-title-wrap -->

        <?php echo '<ul class="' . $category_slag . '-list flex">' ?>

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
            <div class="post_thumbnail">
                <!-- <?php the_post_thumbnail(); ?> -->
            </div>

            <?php echo '<div class="' . $category_slag . '-title post-title">' ?>
                <!-- <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> -->
                <span><?php the_title(); ?></span>
            </div>

            <?php echo '<div class="' . $category_slag . '-excerpt post-excerpt">' ?>
                    <?php echo mb_substr(get_the_excerpt(), 0, 100); ?>
            </div>

            <?php echo '<div class="' . $category_slag . '-viewmore post-viewmore">' ?>
                <a href="<?php the_permalink(); ?>">READ MORE</a>
            </div>
        </li>

                <?php endwhile; ?>

                <?php
                    wp_reset_postdata();
                    endif;
                ?>

        </ul>

        <div class="service-contact-wrap flex">
            <div class="service-contact">
                <a href="#" class="service-btn">サービスについて問い合わせ</a>
            </div><!-- /.service-contact -->
        </div><!-- /.service-contact-wrap -->


    </div><!-- /.section--inner -->
</section><!-- /.section--services -->


<section class="section--works">
    <div class="section--inner">

    <?php
        $args = [
            'category_slag'  => 'works',
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

        <div class="section--service-title-wrap section-title-wrap">

            <div class="section--service--title section-title">
                <h2><p>Works</p></h2>
            </div><!-- /.section--service--title -->

            <div class="section--service--subtitle section-subtitle">
                <p>実績</p>
            </div><!-- /.section--service--subtitle -->

        </div><!-- /.section--service-title-wrap -->

        <?php echo '<ul class="' . $category_slag . '-list flex">' ?>

        <?php
            $paged = get_query_var('paged');
            $args_arr = array(
                'paged' => $paged,
                'posts_per_page' => $posts_per_page,
                'category_name' => $category_slag,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC'
            );

            $the_query = new WP_Query($args_arr);
            if ($the_query->have_posts()) :
        ?>

        <?php global $previousday;
        while ($the_query->have_posts()) : $the_query->the_post();
            $previousday = '';
        ?>

        <li>
            <div class="post_thumbnail">
                <!-- <?php the_post_thumbnail(); ?> -->
            </div>

            <?php echo '<div class="' . $category_slag . '-title post-title">' ?>
                <span><?php the_title(); ?></span>
            </div>

            <?php echo '<div class="' . $category_slag . '-viewmore post-viewmore">' ?>
                <a href="<?php the_permalink(); ?>">READ MORE</a>
            </div>
        </li>

                <?php endwhile; ?>

                <?php
                    wp_reset_postdata();
                    endif;
                ?>

        </ul>

    </div><!-- /.section--inner -->
</section><!-- /.section--works -->


<?php get_footer(); ?>
