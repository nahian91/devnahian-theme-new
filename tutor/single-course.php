<?php
/**
 * Template for displaying single course
 *
 * @package Tutor\Templates
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

$course_id     = get_the_ID();
$course_rating = tutor_utils()->get_course_rating( $course_id );
$is_enrolled   = tutor_utils()->is_enrolled( $course_id, get_current_user_id() );

// Prepare the nav items.
$course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), $course_id );
$is_public       = \TUTOR\Course_List::is_public( $course_id );
$is_mobile       = wp_is_mobile();

$enrollment_box_position = tutor_utils()->get_option( 'enrollment_box_position_in_mobile', 'bottom' );
if ( '-1' === $enrollment_box_position ) {
	$enrollment_box_position = 'bottom';
}
$student_must_login_to_view_course = tutor_utils()->get_option( 'student_must_login_to_view_course' );

tutor_utils()->tutor_custom_header();

if ( ! is_user_logged_in() && ! $is_public && $student_must_login_to_view_course ) {
	tutor_load_template( 'login' );
	tutor_utils()->tutor_custom_footer();
	return;
}
$has_video = apply_filters( 'tutor_course_has_video', tutor_utils()->has_video_in_single(), $course_id );
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

<?php do_action( 'tutor_course/single/before/wrap' ); ?>
<div <?php tutor_post_class( 'tutor-full-width-course-top tutor-course-top-info tutor-page-wrap tutor-wrap-parent' ); ?>>
	<div class="tutor-course-details-page tutor-container py-5">
		<?php ( isset( $is_enrolled ) && $is_enrolled ) ? tutor_course_enrolled_lead_info() : tutor_course_lead_info(); ?>
		<div class="tutor-row tutor-gx-xl-5">
			<main class="tutor-col-xl-8">
				<?php $has_video ? tutor_course_video() : get_tutor_course_thumbnail(); ?>
				<?php do_action( 'tutor_course/single/before/inner-wrap' ); ?>

				<?php if ( $is_mobile && 'top' === $enrollment_box_position ) : ?>
					<div class="tutor-mt-32">
						<?php tutor_load_template( 'single.course.course-entry-box' ); ?>
					</div>
				<?php endif; ?>


				<?php
				use TUTOR\Input;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $authordata, $course_rating;

$course_id         = Input::post( 'course_id', get_the_ID(), Input::TYPE_INT );
$profile_url       = tutor_utils()->profile_url( $authordata->ID, true );
$show_author       = tutor_utils()->get_option( 'enable_course_author' );
$course_categories = get_tutor_course_categories();
$disable_reviews   = ! get_tutor_option( 'enable_course_review' );
$is_wish_listed    = tutor_utils()->is_wishlisted( $post->ID, get_current_user_id() );

/**
 * Global $course_rating get null for third party
 * who only include this file without single-course.php file.
 *
 * @since 2.1.9
 */
if ( is_null( $course_rating ) ) {
	$course_rating = tutor_utils()->get_course_rating( $course_id );
}
?>
<header class="tutor-course-details-header tutor-mb-44">

	<h1 class="tutor-course-details-title tutor-fs-4 tutor-fw-bold tutor-color-black tutor-mt-12 tutor-mb-0">
		<?php do_action( 'tutor_course/single/title/before' ); ?>
		<span><?php the_title(); ?></span>
	</h1>
</header>


				<div class="scourse_meta">
    <?php
    $course_id = get_the_ID();
    $author_id = get_post_field('post_author', $course_id);
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_avatar = get_avatar_url($author_id, ['size' => 80]);

    $categories = get_the_terms($course_id, 'course-category');
    $category_name = !empty($categories) && !is_wp_error($categories) ? $categories[0]->name : 'Uncategorized';

    $last_updated = get_the_modified_time('j F, Y', $course_id);

    $rating_data = tutor_utils()->get_course_rating($course_id);
    $rating_avg = round($rating_data->rating_avg ?? 0, 2);
    ?>
    
    <!-- Instructor -->
    <div class="smeta">
        <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>">
        <div class="smeta_text">
            <span>Instructor:</span>
            <p>
                <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
                    <?php echo esc_html($author_name); ?>
                </a>
            </p>
        </div>	
    </div>

    <!-- Category -->
    <div class="smeta">
        <span>Category:</span>
        <p>
            <?php echo esc_html($category_name); ?>
        </p>			
    </div>

    <!-- Last Update -->
    <div class="smeta">
        <span>Last Update:</span>
        <p>
            <?php echo esc_html($last_updated); ?>
        </p>
    </div>

    <!-- Review -->
    <div class="smeta">
    <span>Review:</span>
    <p>
        <a href="#nav-review">
            <span class="rev_icons">
                <?php
                $filled = floor($rating_avg);
                for ( $i = 1; $i <= 5; $i++ ) {
                    echo $i <= $filled
                        ? '<i class="fas fa-star"></i>'
                        : '<i class="far fa-star"></i>';
                }
                ?>
            </span>
            <span class="rev_content">
                (<?php echo number_format($rating_avg, 2); ?>)
            </span>
        </a>
    </p>
</div>

</div>


				<div class="tutor-course-details-tab tutor-mt-32">
					<?php if ( is_array( $course_nav_item ) && count( $course_nav_item ) > 1 ) : ?>
						<div class="tutor-is-sticky">
							<?php tutor_load_template( 'single.course.enrolled.nav', array( 'course_nav_item' => $course_nav_item ) ); ?>
						</div>
					<?php endif; ?>
					<div class="tutor-tab tutor-pt-24">
						<?php foreach ( $course_nav_item as $key => $subpage ) : ?>
							<div id="tutor-course-details-tab-<?php echo esc_attr( $key ); ?>" class="tutor-tab-item<?php echo 'info' == $key ? ' is-active' : ''; ?>">
								<?php
									do_action( 'tutor_course/single/tab/' . $key . '/before' );

									$method = $subpage['method'];
								if ( is_string( $method ) ) {
									$method();
								} else {
									$_object = $method[0];
									$_method = $method[1];
									$_object->$_method( get_the_ID() );
								}

									do_action( 'tutor_course/single/tab/' . $key . '/after' );
								?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php do_action( 'tutor_course/single/after/inner-wrap' ); ?>
			</main>

			<aside class="tutor-col-xl-4">
				<?php $sidebar_attr = apply_filters( 'tutor_course_details_sidebar_attr', '' ); ?>
				<div class="tutor-single-course-sidebar tutor-mt-40 tutor-mt-xl-0" <?php echo esc_attr( $sidebar_attr ); ?> >
					<?php do_action( 'tutor_course/single/before/sidebar' ); ?>

					<?php if ( ( $is_mobile && 'bottom' === $enrollment_box_position ) || ! $is_mobile ) : ?>
						<?php tutor_load_template( 'single.course.course-entry-box' ); ?>
					<?php endif ?>

					<div class="tutor-single-course-sidebar-more tutor-mt-24">
						<?php tutor_course_instructors_html(); ?>
						<?php tutor_course_requirements_html(); ?>
						<?php tutor_course_tags_html(); ?>
						<?php tutor_course_target_audience_html(); ?>
					</div>
					<?php do_action( 'tutor_course/single/after/sidebar' ); ?>
				</div>
			</aside>
		</div>
	</div>
</div>

<?php do_action( 'tutor_course/single/after/wrap' ); ?>

<?php
tutor_utils()->tutor_custom_footer();
