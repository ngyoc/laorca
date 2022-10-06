<?php get_header(); ?>

<!-- body -->

<body>


    <section class="section--hero">
        <div class="section--inner">

            <?php get_template_part('template/section_hero', null, $args); ?>


        </div><!-- /.section--inner -->
    </section><!-- /.hero -->


    <section class="section--strength">
        <div class="section--inner">

            <?php
            $title_args = [
                'title_slag'  => 'strength',
                'page_title'     => 'STRENGTH',
                'page_subtitle'  => '私達の強み',
            ];

            $args = [
                'taxonomy_type'  => 'strength',
            ];

            get_template_part('template/echo_section_title', null, $title_args);
            get_template_part('template/post_strength', null, $args);
            ?>

            <div class="strength-viewmore-wrap viewmore-wrap">
                <a href="<?php echo get_option('strength_btn_url'); ?>" class="btn-box-black"><?php echo get_option('strength_btn_text'); ?></a>
            </div><!-- /.strength-viewmore-wrap -->

        </div><!-- /.section--inner -->
    </section><!-- /.section--strength -->


    <section class="section--services">
        <div class="section--inner">

            <?php
            $title_args = [
                'title_slag'    => 'services',
                'page_title'    => 'SERVICES',
                'page_subtitle' => '提供サービス',
            ];

            $args = [
                'taxonomy_type'  => 'services',
                'page_title'     => 'SERVICES',
            ];

            get_template_part('template/echo_section_title', null, $title_args);
            get_template_part('template/post_services', null, $args);
            ?>


            <div class="services-contact">
                <a href="<?php echo get_option('service_btn_url'); ?>" class="btn-box-black"><?php echo get_option('service_btn_text'); ?></a>
            </div><!-- /.service-contact-wrap -->


        </div><!-- /.section--inner -->
    </section><!-- /.section--services -->


    <section id="works" class="section--works">
        <div class="section--inner">

            <?php
            $title_args = [
                'title_slag'  => 'works',
                'page_title'     => 'WORKS',
                'page_subtitle'     => '実績',
            ];

            $args = [
                'taxonomy_type'  => 'works',
            ];

            get_template_part('template/echo_section_title', null, $title_args);
            get_template_part('template/post_works', null, $args);
            ?>

            <div class="works-viewmore-wrap viewmore-wrap">
                <!-- <a href="#" class="btn-box-black">実績一覧</a> -->
                <a href="<?php echo get_option('works_btn_url'); ?>" class="btn-box-black"><?php echo get_option('works_btn_text'); ?></a>
            </div><!-- /.works-viewmore-wrap -->


        </div><!-- /.section--inner -->
    </section><!-- /.section--works -->


    <section class="section--about">
        <div class="section--inner">

            <?php
            $title_args = [
                'taxonomy_type' => 'about',
                'page_title'    => 'ABOUT',
                'page_subtitle' => '会社概要',
            ];

            $args = [
                'page_title'     => 'ABOUT',
            ];

            get_template_part('template/echo_section_title', null, $title_args);
            get_template_part('template/section_about', null, $args);
            ?>

        </div><!-- /.section--inner -->
    </section><!-- /.section--about -->


    <section class="section--blog">
        <div class="section--inner">

            <?php
            $title_args = [
                'title_slag'    => 'blog',
                'page_title'    => 'Our Contents',
                'page_subtitle' => 'ブログ',
            ];

            $args = [
                'category_slag'  => 'blog',
                'posts_per_page' => 7,
            ];

            get_template_part('template/echo_section_title', null, $title_args);
            get_template_part('template/post_blog', null, $args);
            ?>


            <div class="blog-viewmore-wrap viewmore-wrap">
                <a href="#" class="btn-box-black">ブログ一覧</a>
            </div><!-- /.blog-viewmore-wrap -->

        </div><!-- /.section--inner -->
    </section><!-- /.section--blog -->


    <section class="section--contact">
        <div class="section--inner">

            <div class="contact-wrap">

                <div class="contact-title">
                    <h2>お問い合わせ・サービス相談</h2>
                    <p>CONTACT</p>
                </div><!-- /.contact-title -->

                <div class="contact-item">
                    <div class="tell">

                        <p class="num">
                            <a href=""><?php echo get_option('contact_tell_num'); ?></a>
                        </p><!-- /.num -->

                        <p class="txt"><?php echo get_option('contact_tell_text'); ?></p><!-- /.txt -->
                    </div><!-- /.tell -->

                    <div class="mail-wrap">
                        <a href="<?php echo get_option('contact_btn_url'); ?>" class="btn-contact"><?php echo get_option('contact_btn_text'); ?></a>
                    </div><!-- /.mail -->
                </div><!-- /.contact-item -->

            </div><!-- /.contact-wrap -->

        </div><!-- /.section--inner -->
    </section><!-- /.section--contact -->

</body>


<?php get_footer(); ?>
