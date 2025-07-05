<?php get_header(); ?>

<section class="main-banner" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/bg/banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 text-center">
				<h2>Grid Blog</h2>
			</div>
		</div>				
	</div>	
</section>

<!-- Start Blog -->
<section class="blog bstyle-2 section-padding">
	<div class="container">
		<div class="row">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<div class="col-xl-4 col-md-6 col-12 wow fadeIn">
						<div class="blog-item">
							<div class="blog-image">
								<a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('medium');
									} else {
										echo '<img src="' . get_template_directory_uri() . '/assets/img/blog/default.jpg" alt="default image">';
									} ?>
								</a>
							</div>
							
							<div class="blog-content">
								<div class="bmeta">
									<span>
										<i class="bx bx-time-five"></i> <?php echo get_the_date(); ?>
									</span>	

									<span class="bcat">
										<?php the_category(', '); ?>
									</span>
								</div>
								
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								<a href="<?php the_permalink(); ?>" class="bbtn">Explore More</a>
							</div>
						</div>
					</div><!-- End Col -->
				<?php endwhile; ?>

				<!-- Pagination -->
				<div class="col-12 text-center">
					<div class="post_pagination">
						<?php
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => '<i class="fa-solid fa-arrow-left-long"></i>',
							'next_text' => '<i class="fa-solid fa-arrow-right-long"></i>',
							'before_page_number' => '<li>',
							'after_page_number'  => '</li>',
						) );
						?>
					</div>
				</div>
			<?php else : ?>
				<p><?php esc_html_e( 'No posts found.', 'textdomain' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- End Blog -->

<?php get_footer(); ?>
