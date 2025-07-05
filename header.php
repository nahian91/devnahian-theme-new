<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package devnahian
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-adsense-account" content="ca-pub-5810116187271532">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Paste your Google Analytics code here -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-F2ER1G9M45"></script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());
   gtag('config', 'G-F2ER1G9M45');
   </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	
		<!-- Start Header -->
		<header id="navigation">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3 left-col align-self-center">
						<div class="site-logo">
							<a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.svg" alt="Edumon"></a>
						</div>
					</div><!-- End Col -->			

					<div class="col-md-6 justify-content-center d-flex align-self-center">
    <nav id="main-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'menu_class'     => '', // You can add your custom class here
            'depth'          => 2,  // Supports submenu
            'fallback_cb'    => false,
        ));
        ?>
    </nav>
</div>
	

					<div class="col-md-3 right-col align-self-center text-end">						
						<?php if ( is_user_logged_in() ) : 
    $current_user = wp_get_current_user();
    $avatar_url = get_avatar_url( $current_user->ID );
    $profile_url = get_edit_user_link(); 
    $logout_url = wp_logout_url( home_url() );
?>
    <div class="tutor-user-info" style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
        <img src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $current_user->display_name ); ?>" style="width: 50px; height: 50px; border-radius: 50%;" />
        <div>
            <p style="margin: 0; font-weight: bold;"><?php echo esc_html( $current_user->display_name ); ?></p>
            <a href="<?php echo esc_url( $profile_url ); ?>">Edit Profile</a> | 
            <a href="<?php echo esc_url( $logout_url ); ?>">Logout</a>
        </div>
    </div>

<?php else : 
    $login_url = wp_login_url(); // Or use custom login page URL
    $register_url = wp_registration_url(); // Or use custom register page
?>
    <div class="tutor-login-buttons" style="margin-bottom: 20px;">
        <a href="<?php echo esc_url( $login_url ); ?>" class="btn btn-primary" style="margin-right: 10px;">Login</a>
        <a href="<?php echo esc_url( $register_url ); ?>" class="btn btn-outline-primary">Register</a>
    </div>
<?php endif; ?>

					</div><!-- End Col -->
					
					<ul class='mobile_menu'>
						<li class="menu-item-has-children">
							<a href="#">Home</a>
							<ul class="sub-menu">
								<li><a href="index.html">Home One</a></li>
								<li><a href="index-2.html">Home Two</a></li>
							</ul>
						</li>	

						<li class="menu-item-has-children">
							<a href="#">Courses</a>
							<ul class="sub-menu">
								<li><a href="courses.html">Course Style1</a></li>
								<li><a href="courses-2.html">Course Style2</a></li>
								<li><a href="course-details.html">Course Details</a></li>
							</ul>
						</li>							
						
						<li class="menu-item-has-children">
							<a href="#">Pages</a>
							<ul class="sub-menu">
								<li><a href="grid-blog.html">Grid Blog</a></li>
								<li><a href="standard-blog.html">Standard Blog</a></li>
								<li><a href="blog-details.html">Blog Details</a></li>
								<li><a href="cart.html">Cart</a></li>
								<li><a href="checkout.html">Checkout</a></li>
								<li><a href="login.html">Login</a></li>
								<li><a href="register.html">Register</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="instructors.html">Instructors</a></li>
								<li><a href="404.html">404</a></li>
							</ul>
						</li>		

						<li>
							<a href="standard-blog.html">Blog</a>
						</li>

						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>	
				</div>
			</div>
			
			<!-- Start Drawer -->
			<div id="mini_cart" class="min_cart_wrapper">
				<div class="cart_drawer">
					<div class="cart_top">
						<a href="#" class="cart_close"><i class='bx bx-x'></i></a>
						<h3 class="title">Courses List</h3>
						<span class="cart_number">
							3
						</span>
					</div>
					
					<div class="mini_cart_list">
						<ul>
							<li class="d-flex">
								<div class="thumb_img_cartmini">
									<a href="course-details.html" class="mc_img">
										<img src="<?php echo get_template_directory_uri();?>/assets/img/mcart/1.jpg" alt="Product Name" >
									</a>
								</div>	
								
								<div class="product-detail">
									<h3 class="product_name_mini">
										 <a href="course-details.html">
											Photography Crash Course
										</a>
									</h3>
									<div class="product_info">
										<div class="product_quanity">QTY : 1 </div>
										<div class="product_price">
											<span class="price_sale">$25.00</span>
										</div>
									</div>
								</div>
								
								<div class="produc_remove">
									<a href="#" class="remove-product">
										<i class='bx bx-trash'></i>
									</a>              
								</div>
							</li>					
							
							<li class="d-flex">
								<div class="thumb_img_cartmini">
									<a href="course-details.html" class="mc_img">
										<img src="<?php echo get_template_directory_uri();?>/assets/img/mcart/2.jpg" alt="Product Name" >
									</a>
								</div>	
								
								<div class="product-detail">
									<h3 class="product_name_mini">
										 <a href="course-details.html">
											Photography Crash Course
										</a>
									</h3>
									<div class="product_info">
										<div class="product_quanity">QTY : 1 </div>
										<div class="product_price">
											<span class="price_sale">$25.00</span>
										</div>
									</div>
								</div>
								
								<div class="produc_remove">
									<a href="#" class="remove-product">
										<i class='bx bx-trash'></i>
									</a>              
								</div>
							</li>					
							
							<li class="d-flex">
								<div class="thumb_img_cartmini">
									<a href="course-details.html" class="mc_img">
										<img src="<?php echo get_template_directory_uri();?>/assets/img/mcart/3.jpg" alt="Product Name" >
									</a>
								</div>	
								
								<div class="product-detail">
									<h3 class="product_name_mini">
										 <a href="course-details.html">
											Photography Crash Course
										</a>
									</h3>
									<div class="product_info">
										<div class="product_quanity">QTY : 1 </div>
										<div class="product_price">
											<span class="price_sale">$25.00</span>
										</div>
									</div>
								</div>
								
								<div class="produc_remove">
									<a href="#" class="remove-product">
										<i class='bx bx-trash'></i>
									</a>              
								</div>
							</li>
						</ul>
					</div>
					
					<div class="cart_drawer_btnm">
						<div class="sub-total">
							<span class="total-title float-start">Total:</span>
							<span class="total-price float-end">$75.00</span>
						</div>
						
						<div class="bottom_group">
							<a href="cart.html" class="button-viewcart">
								<span>View Cart</span>
							</a>
							<a href="checkout.html" class="button-checkout">
								<span>Checkout</span>
							</a>
						</div>
					</div>
				</div>				
			</div>
			<!-- End Drawer -->
		</header>
		<!-- End Header -->