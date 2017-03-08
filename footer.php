    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3><?php echo ot_get_option( 'footer_left_title' ); ?></h3>
                        <?php echo ot_get_option( 'footer_left_text' ); ?>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3><?php echo ot_get_option( 'footer_center_title' ); ?></h3>
                        <ul class="list-inline">
                            <?php $fb = ot_get_option( 'footer_center_facebook' ); if(!empty($fb)): ?>
                            <li>
                                <a href="<?php echo $fb ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <?php endif ?>
                            
                            <?php $gplus = ot_get_option( 'footer_center_gplus' ); if(!empty($gplus)): ?>
                            <li>
                                <a href="<?php echo $gplus ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <?php endif ?>
                            
                            <?php $linkedin = ot_get_option( 'footer_center_linkedin' ); if(!empty($linkedin)): ?>
                            <li>
                                <a href="<?php echo $linkedin ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <?php endif ?>

                            <?php $wp = ot_get_option( 'footer_center_wordpress' ); if(!empty($wp)): ?>
                            <li>
                                <a href="<?php echo $wp ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-wordpress"></i></a>
                            </li>
                            <?php endif ?>

                            <?php $github = ot_get_option( 'footer_center_github' ); if(!empty($github)): ?>
                            <li>
                                <a href="<?php echo $github ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3><?php echo ot_get_option( 'footer_right_title' ); ?></h3>
                        <?php echo ot_get_option( 'footer_right_text' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php bloginfo( 'name' ); ?> 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <?php wp_footer(); ?>

</body>

</html>