        </div><!-- /.content-wrap wrap -->
        </div><!-- /.content-container .container -->

        <footer id="footer" class="flex">
            <div class="footer-inner flex">
                <div class="footer-L">
                    <div class="footer-logo site-logo">
                            <h2><a href="<?php echo esc_url(home_url('/')); ?>" class="">LA ORCA</a></h2>
                    </div><!-- /.footer_logo -->

                    <div class="co-info">
                        <p>株式会社〇〇〇〇</p>
                        <p>〒000-0000 東京都世田谷区〇〇</p>
                    </div><!-- /.co_info -->
                </div><!-- /.footer_L -->

                <div class="footer-R">
                    <?php wp_nav_menu(array(
                        'theme_location'  => 'global',
                        'menu_class' => '',
                        'container' => false));
                    ?>
                </div><!-- /.footer_R -->
            </div>
        </footer>

    <script></script>

    <?php wp_footer(); ?>

    </body>
</html>
