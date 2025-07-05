<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="main-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 text-center">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>				
	</div>	
</section>

<!-- START Blog Details -->
<section class="blog-details section-padding">			
	<div class="container">	
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-12 col-12 wow fadeIn">
				<div class="post-inner">
					<div class="post-image">
						<?php the_post_thumbnail(); ?>
					</div>	
					
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					
					<div class="post-nav pnavigation d-flex justify-content-between">
						<div class="prev-pro">
							<?php previous_post_link('%link', '← Previous Post'); ?>
						</div>
						<div class="next-pro">
							<?php next_post_link('%link', 'Next Post →'); ?>
						</div>
					</div>
				</div>	
			</div><!-- END Col -->	

			<div class="col-xl-4 col-lg-4 col-12 sidebar">
				<!-- Search Widget -->
				<div class="widget search-widget wow fadeIn">
					<div class="search-form">
						<form action="#" method="post">
							<input type="text" class="search-control" placeholder="Search Query">
							<button type="submit" class="search-btn">
								<i class="ti-search"></i>
							</button>
						</form>
					</div>
				</div>

				<!-- Category Widget -->
				<div class="widget category-widget wow fadeIn">
					<h3 class="widget-title">Categories</h3>
					<ul>
						<?php 
						$categories = get_categories();
						foreach ( $categories as $category ) {
							echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
						}
						?>
					</ul>
				</div>

				<!-- Popular Posts Widget -->
				<div class="widget popular-posts-widget wow fadeIn">
					<h3 class="widget-title">Recent Posts</h3>
					<ul>
						<?php
						$recent_posts = new WP_Query([
							'posts_per_page' => 3,
							'post_status' => 'publish',
						]);
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="float-start ppimage">
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'thumbnail' );
										} ?>
									</div>
									<div class="ppcontent">
										<h4><?php the_title(); ?></h4>
										<span><?php echo get_the_date(); ?></span>
									</div>
								</a>
							</li>
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
				</div>

				<!-- Tags Widget -->
				<div class="widget popular-posts-widget wow fadeIn">
					<h3 class="widget-title">Tags</h3>
					<div class="tags_clouds">
						<?php
						$tags = get_tags();
						foreach ( $tags as $tag ) {
							echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
						}
						?>
					</div>
				</div>							
			</div><!-- End Sidebar Col -->			
		</div>
	</div>			
</section>
<!-- END Blog Details -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
