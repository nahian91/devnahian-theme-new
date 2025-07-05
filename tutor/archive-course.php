<?php
get_header();
?>

<section class="main-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2>Courses</h2>
            </div>
        </div>              
    </div>  
</section>

<section class="course-archive section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <section class="courses">
                    <div class="container">
                        <div class="row">

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $course_id = get_the_ID();

        $thumbnail = get_the_post_thumbnail_url($course_id, 'large') ?: get_template_directory_uri() . '/assets/img/courses/default.jpg';

        $price = tutor_utils()->get_course_price($course_id);

        $rating_data = tutor_utils()->get_course_rating($course_id);
        $rating_avg = $rating_data->rating_avg ?? 0;
        $rating_count = $rating_data->rating_count ?? 0;

        $duration = tutor_utils()->get_course_duration_text($course_id);

        $enrolled = tutor_utils()->count_enrolled_users_by_course($course_id);

        $author_id = get_post_field('post_author', $course_id);
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_avatar = get_avatar_url($author_id, ['size' => 50]);

        $categories = get_the_terms($course_id, 'course-category');
        $category_name = '';
        $category_link = '';
        if (!empty($categories) && !is_wp_error($categories)) {
            $first_cat = $categories[0];
            $category_name = $first_cat->name;
            $category_link = get_term_link($first_cat);
        }
        ?>

        <div class="col-md-4">
            <div class="single-course">
                <div class="course-img">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </a>
                </div>
                
                <div class="course_content">
                    <div class="crating">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            $filled_stars = floor($rating_avg);
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $filled_stars) {
                                    echo '<i class="fas fa-star"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                            <span>(<?php echo intval($rating_count); ?>)</span>
                        </a>
                    </div>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="cmeta">
                        <div class="smeta">
                            <i class="fas fa-user"></i>
                            <?php echo intval($enrolled); ?> Students
                        </div>  

                        <div class="smeta">
    <i class="fas fa-clock"></i>
    <?php
    $duration = get_tutor_course_duration_context($course_id);
    echo $duration ? $duration : 'No Count';
    ?>
</div>
                    </div>
                    
                    <div class="course_btnm">
                        <div class="cauthor">
                            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
                                <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>">
                                <span><?php echo esc_html($author_name); ?></span>
                            </a>
                        </div>  

                        <div class="cprice">
    <?php
    $price_type = get_post_meta($course_id, '_tutor_course_price_type', true);
    $price = tutor_utils()->get_course_price($course_id);
    echo $price_type === 'free' ? 'FREE' : $price;
    ?>
</div>

                    </div>  
                </div>
            </div>
        </div>

                                <?php endwhile; ?>
                                <?php the_posts_pagination(); ?>
                            <?php else : ?>
                                <div class="col-12"><p>No courses found.</p></div>
                            <?php endif; ?>

                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</section>

<?php
tutor_utils()->tutor_custom_footer();
get_footer();
?>
