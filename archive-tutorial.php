<?php
/*
Template Name: Template Tutorial
*/
get_header();
?>

<main id="primary" class="site-main">

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
                            'post_type'      => 'tutorial',
                            'posts_per_page' => 20,
                            'orderby' => 'rand',
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                ?>
                                <div class="col-lg-4 col-md-4">
                                    <div class="post-card">
                                        <div class="post-card-image">
                                            <?php
                                            $tutorial_image = get_field('tutorial_image');
                                            if ($tutorial_image) {
                                                echo '<img src="' . esc_url($tutorial_image['url']) . '" alt="' . esc_attr($tutorial_image['alt']) . '">';
                                            } else {
                                                echo '<img src="placeholder-image.jpg" alt="Placeholder Image">';
                                            }
                                            ?>
                                        </div>
                                        <div class="post-card-content">
                                            <?php
                                            $tutorial_categories = get_the_terms(get_the_ID(), 'tutorial_category');
                                            if ($tutorial_categories && !is_wp_error($tutorial_categories)) {
                                                $category_links = array();
                                                foreach ($tutorial_categories as $category) {
                                                    $category_links[] = '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                                                }
                                                echo '<span class="tutorial-categories">' . implode(', ', $category_links) . '</span>';
                                            }
                                            ?>
                                            <h5>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h5>
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

</main><!-- #main -->

<?php get_footer(); ?>
