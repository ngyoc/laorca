<div class="hero-wrap">

    <div class="hero-image" style="background-image: url(<?php echo get_option('top_hero_image'); ?>)"></div>
    <!-- /.hero-image -->

    <div class="hero-box">

        <div class="hero-subtext">
            <?php echo get_option('top_hero_sub_text'); ?>
        </div><!-- /.hero-subtext -->

        <div class="hero-main">
            <?php echo get_option('top_hero_main_text'); ?>
        </div><!-- /.hero-title -->

        <div class="hero-description">
            <?php echo get_option('top_hero_desc_text'); ?>
        </div><!-- /.hero-description -->

        <div class="hero-contact-wrap flex">
            <a href="<?php echo get_option('top_hero_contact_url'); ?>" class="hero-btn btn-box-black"><?php echo get_option('top_hero_contact_text'); ?></a>
        </div><!-- /.hero-contact-wrap -->

    </div><!-- /.hero-box -->
</div><!-- /.hero-wrap -->
