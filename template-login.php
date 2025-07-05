<?php
/*
Template Name: Template Login
*/

// Redirect logged-in users immediately
if ( is_user_logged_in() ) {
    wp_redirect( site_url('/dashboard') ); // Change to your dashboard URL
    exit;
}

$login_error = '';

if ( isset($_POST['submit']) ) {
    $creds = [
        'user_login'    => sanitize_text_field($_POST['username']),
        'user_password' => $_POST['password'],
        'remember'      => isset($_POST['rememberme']),
    ];

    $user = wp_signon( $creds, false );

    if ( is_wp_error($user) ) {
        $login_error = $user->get_error_message();
    } else {
        wp_redirect( site_url('/dashboard') ); // Redirect after successful login
        exit;
    }
}

get_header();
?>

<section class="main-banner" style="background-image: url(assets/img/bg/banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2>Login</h2>
                <p>
                    <a href="<?php echo site_url(); ?>">Home</a> <i class="bx bx-chevrons-right"></i> Login
                </p>
            </div>
        </div>				
    </div>			
</section>

<section class="login_register section-padding">
    <div class="container">
        <div class="row">				
            <div class="col-lg-6 offset-lg-3 col-xs-12 wow fadeIn">
                <div class="login">
                    <h4 class="login_register_title">Already a member? Sign in:</h4>

                    <?php if ( $login_error ) : ?>
                        <div style="color: red; margin-bottom: 15px;"><?php echo esc_html($login_error); ?></div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" placeholder="Enter Username" class="form-control" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Enter Password" id="password" class="form-control" name="password" required>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input id="rememberme" class="form-check-input" type="checkbox" name="rememberme">
                            <label class="form-check-label" for="rememberme">
                                Remember Me
                            </label>
                        </div>

                        <div class="form-group col-lg-12">
                            <button class="bg_btn bt" type="submit" name="submit">Login</button>
                        </div>
                    </form>

                    <p>Don't have an account? <a href="<?php echo site_url('/register'); ?>">Register Now</a></p>
                </div>
            </div><!--- END COL -->	
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</section>

<?php get_footer(); ?>
