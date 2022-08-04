<?php get_header(); ?>

<!-- body -->
<section class="section--hero">

    <div class="hero-wrapper">
        <div class="hero-image"></div><!-- /.hero-image -->
        <div class="hero-box">
            <div class="hero-subtext">Web Production</div><!-- /.hero-subtext -->
            <div class="hero-title">LA ORCA</div><!-- /.hero-title -->
            <div class="hero-description">
                <p>BtoBには特有のマーケティング、採用、プロダクトの課題があります。<br>BtoBの勝ちパターンを網羅した180項目におよぶ独自のメソッドと140項目に及ぶ独自の制作ワークフローを駆使しながらマーケティング、デザイン、テクノロジーを組み合わせてBtoB企業の経営課題を丁寧に解決します。</p>
            </div><!-- /.hero-description -->

            <div class="hero-contact-wrap flex">
                <div class="hero-contact">
                    <a href="#" class="hero-btn btn-box-black">制作について問い合わせる</a>
                </div><!-- /.hero-contact -->
            </div><!-- /.hero-contact-wrap -->

        </div><!-- /.hero-box -->
    </div><!-- /.hero-wrapper -->

</section><!-- /.hero -->

<section class="section--strength">
    <div class="section--inner">

        <?php
            $args = [
                'taxonomy_type'  => 'strength',
                'page_title'     => 'STRENGTH',
            ];

            get_template_part('template/post_strength', null, $args);
        ?>

    </div><!-- /.section--inner -->
</section><!-- /.section--strength -->


<section class="section--services">
    <div class="section--inner">

    <?php
        $args = [
            'taxonomy_type'  => 'services',
            'page_title'     => 'SERVICES',
        ];

        get_template_part('template/post_services', null, $args);
    ?>


        <div class="services-contact">
                <a href="#" class="btn-box-black">サービスについて問い合わせ</a>
        </div><!-- /.service-contact-wrap -->


    </div><!-- /.section--inner -->
</section><!-- /.section--services -->


<section class="section--works">
    <div class="section--inner">

    <?php
        $args = [
            'taxonomy_type'  => 'works',
            'page_title'     => 'WORKS',
        ];

        get_template_part('template/post_works', null, $args);
    ?>

    <div class="works-viewmore-wrap viewmore-wrap">
            <a href="#" class="btn-box-black">実績一覧</a>
    </div><!-- /.works-viewmore-wrap -->



    </div><!-- /.section--inner -->
</section><!-- /.section--works -->


<section class="section--about">
    <div class="section--inner">


<?php
    $args = [
        'taxonomy_type'  => 'works',
        'page_title'     => 'WORKS',
    ];

    get_template_part('template/section_about', null, $args);
?>

    </div><!-- /.section--inner -->
</section><!-- /.section--about -->


<section class="section--blog">
        <div class="section--inner">

        <?php
        $args = [
            'category_slag'  => 'blog',
            'posts_per_page' => 7,
            'page_title'     => 'Our Contents',
        ];

        get_template_part('template/post_blog', null, $args);
        ?>

    <div class="blog-viewmore-wrap viewmore-wrap">
            <a href="#" class="btn-box-black">ブログ一覧</a>
    </div><!-- /.blog-viewmore-wrap -->





        </div><!-- /.section--inner -->
</section><!-- /.section--blog -->





<?php get_footer(); ?>
