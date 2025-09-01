<?php
/**
 * The front page template file
 *
 * This is the template for the front page of the site.
 * It integrates React components while maintaining WordPress functionality.
 *
 * @package WP_React_Professional_Theme
 */

get_header(); ?>

<div id="root">
    <!-- React app will be loaded here -->
    <div style="text-align: center; padding: 50px;">
        <h1>Loading React App...</h1>
        <p>Please wait while the application loads.</p>
    </div>
</div>

<script>
// Show loading state
document.addEventListener('DOMContentLoaded', function() {
    // Add loading class to body
    document.body.classList.add('react-app-loading');
    
    // Wait for React app to load
    function checkReactApp() {
        if (typeof ReactApp !== 'undefined') {
            // React app loaded successfully
            document.body.classList.remove('react-app-loading');
            document.body.classList.add('react-app-loaded');
            
            // Initialize the React app
            ReactApp.default();
        } else {
            // Check again in 100ms
            setTimeout(checkReactApp, 100);
        }
    }
    
    // Start checking for React app
    setTimeout(checkReactApp, 100);
    
    // Fallback after 10 seconds
    setTimeout(function() {
        if (document.body.classList.contains('react-app-loading')) {
            document.getElementById('root').innerHTML = `
                <div style="text-align: center; padding: 50px;">
                    <h1>Welcome to <?php echo get_bloginfo('name'); ?></h1>
                    <p>The React app is being built. Please run <code>npm run build</code> in your theme directory.</p>
                    <p>Or visit <a href="<?php echo home_url('/wp-admin/'); ?>">WordPress Admin</a> to manage your content.</p>
                </div>
            `;
        }
    }, 10000);
});
</script>

<?php get_footer(); ?>
