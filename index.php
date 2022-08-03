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

        get_template_part('template/post_strength', null, $args);
    ?>


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
            'taxonomy_type'  => 'works',
            'page_title'     => 'WORKS',
        ];

        get_template_part('template/post_works', null, $args);
    ?>

    </div><!-- /.section--inner -->
</section><!-- /.section--works -->


<?php get_footer(); ?>
