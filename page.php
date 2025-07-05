<?php
get_header();
?>

<section class="main-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 text-center">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>				
	</div>	
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php
                                    the_content();

                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'devnahian' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    <?php endwhile;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
        </div>
    </div>
</div>

<?php
get_footer();
