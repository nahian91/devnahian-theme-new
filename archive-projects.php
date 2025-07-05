<?php
/*
Template Name: Template Projects
*/
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

    <section class="blog-grid section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-30">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type'      => 'project',
                            'posts_per_page' => 20,
                            'orderby' => 'rand',
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $project_link = get_field('project_link');
                                ?>
                                <div class="col-lg-4">
                                    <div class="post-card">
                                        <div class="post-card-image">
                                            <div class="post-card-image-hover">
                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium large'); ?>" 
                                                alt="<?php echo esc_attr(get_the_title()); ?>"     loading="lazy">
                                            </div>
                                        </div>
                                        <div class="post-card-content">
                                            <h5><?php the_title(); ?></h5>
                                            <a href="<?php echo esc_url($project_link);?>" target="_blank">Live Preview</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        wp_reset_postdata();
                        ?>
                        <div class="pagination-main">
                            <?php
                            the_posts_pagination(array(
                                'prev_text' => __('Previous', 'devnahian'),
                                'next_text' => __('Next', 'devnahian'),
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/-->

<?php get_footer(); ?>
