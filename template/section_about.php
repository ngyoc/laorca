<?php
$page_title = $args['page_title'];
?>


<div class="about-wrap">

    <div class="about-image-wrap">
        <!-- <div class="about-image"></div>/.about-image -->
        <?php echo '<img class="about-image" src=' . get_option('about_image') . '>'; ?>

    </div><!-- /.about-image-wrap -->

    <div class="about-detail-box">

        <div class="about-text">
            <!-- <p>ここに会社概要が入ります</p> -->
            <!-- <p>ここに会社概要が入ります</p> -->
            <!-- <p>ここに会社概要が入ります</p> -->
            <?php echo get_option('about_desc_text') ?>
        </div><!-- /.about-text -->

        <div class="about-readmore-wrap">
            <!-- <a href="#" class="btn-box-white-s">READ MORE</a> -->
            <a href="<?php echo get_option('contact_btn_url') ?>" class="btn-box-black"><?php echo get_option('about_btn_text') ?></a>

        </div><!-- /.about-readmore-wrap -->

    </div><!-- /.about-detail-wrap -->

</div><!-- /.about-wrap -->
