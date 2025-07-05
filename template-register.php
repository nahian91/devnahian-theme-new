<?php
/*
Template Name: Custom Register
*/

get_header();

if ( is_user_logged_in() ) {
    wp_redirect( site_url('/dashboard') ); // Redirect logged-in users away
    exit;
}

$register_errors = [];
$register_success = false;

if ( isset($_POST['register_submit']) ) {
    $username = sanitize_user( $_POST['username'] ?? '' );
    $email = sanitize_email( $_POST['email'] ?? '' );
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // Basic validation
    if ( empty($username) ) {
        $register_errors[] = 'Username is required.';
    } elseif ( username_exists($username) ) {
        $register_errors[] = 'Username already exists.';
    }

    if ( empty($email) ) {
        $register_errors[] = 'Email is required.';
    } elseif ( !is_email($email) ) {
        $register_errors[] = 'Invalid email address.';
    } elseif ( email_exists($email) ) {
        $register_errors[] = 'Email is already registered.';
    }

    if ( empty($password) ) {
        $register_errors[] = 'Password is required.';
    } elseif ( $password !== $password_confirm ) {
        $register_errors[] = 'Passwords do not match.';
    }

    if ( empty($register_errors) ) {
        $user_id = wp_create_user( $username, $password, $email );
        if ( is_wp_error($user_id) ) {
            $register_errors[] = 'Registration failed. Please try again.';
        } else {
            // Set user role to student if needed (Tutor LMS default)
            $user = new WP_User($user_id);
            $user->set_role('subscriber'); // or 'student' if Tutor LMS uses that role

            // Optional: log user in automatically
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);

            $register_success = true;
        }
    }
}
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

<section class="main-banner" style="background:#f7f7f7; padding: 40px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <h2 class="text-center mb-4">Create a New Account</h2>

                <?php if ( $register_success ) : ?>
                    <div style="padding:15px; background:#d4edda; color:#155724; border-radius: 4px; margin-bottom: 20px;">
                        Registration successful! Redirecting to dashboard...
                    </div>
                    <?php
                    // Redirect after 3 seconds
                    echo '<script>setTimeout(function(){ window.location.href = "'. esc_url(site_url('/dashboard')) .'"; }, 3000);</script>';
                    ?>
                <?php else : ?>
                    <?php if ( !empty($register_errors) ) : ?>
                        <div style="padding:15px; background:#f8d7da; color:#721c24; border-radius: 4px; margin-bottom: 20px;">
                            <ul style="margin:0; padding-left: 20px;">
                                <?php foreach ( $register_errors as $error ) : ?>
                                    <li><?php echo esc_html($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="" class="custom-register-form" style="background:#fff; padding:30px; border-radius:8px; box-shadow:0 0 8px rgba(0,0,0,0.1);">
                        <div class="form-group mb-3">
                            <label for="username">Username <span style="color:red;">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" required value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email Address <span style="color:red;">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" required value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password <span style="color:red;">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" required />
                        </div>

                        <div class="form-group mb-4">
                            <label for="password_confirm">Confirm Password <span style="color:red;">*</span></label>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" required />
                        </div>

                        <button type="submit" name="register_submit" class="btn btn-primary w-100">Register</button>
                    </form>

                    <p class="text-center mt-3">Already have an account? <a href="<?php echo esc_url(site_url('/login')); ?>">Login here</a>.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
