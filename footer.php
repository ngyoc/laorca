        </div><!-- /.content-wrap wrap -->
        </div><!-- /.content-container .container -->

        <footer id="footer">
            <div class="footer-inner flex">
                <nav id="nav-footer" class="nav-footer flex">

                    <?php wp_nav_menu(array(
                        'theme_location'  => 'global',
                        'menu_class' => '',
                        'container' => false
                    )); ?>

                </nav>
            </div>
        </footer>

        <script>
            new WOW().init();
        </script>

    <?php wp_footer(); ?>

    </body>
</html>
