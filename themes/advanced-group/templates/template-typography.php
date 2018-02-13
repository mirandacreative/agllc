<?php
/**
 * Template Name: Typography Page
 */
get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--HOME PAGE SLIDER-->
                <?php echo home_slider_template(); ?>
                <!--END of HOME PAGE SLIDER-->
            </div>
        </div>
    </div>

    <div class="container">
        <!-- BEGIN of main content -->
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                        <a href="" class="site-btn site-btn--red">
                            red button
                        </a>
                        <a href="" class="site-btn site-btn--yellow">
                            yellow button
                        </a>
                        <a href="" class="site-btn site-btn--grey">
                            grey button
                        </a>
                        <a href="" class="site-btn site-btn--invert">
                            invert button
                        </a>
                        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </h1>
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </h2>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </h3>
                        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </h4>
                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </h5>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- END of main content -->
    </div>

<?php get_footer(); ?>
