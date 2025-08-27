<?php
/**
 * The main template file
 *
 * @package WP_React_Starter_Theme
 */

get_header(); ?>

<div id="root" class="react-app-loading">
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
            document.getElementById('root').innerHTML = '<div style="text-align: center; padding: 50px;"><h1>Welcome to WordPress React Theme</h1><p>The React app is being built. Please run <code>npm run build</code> in your theme directory.</p></div>';
        }
    }, 10000);
});
</script>

<?php get_footer(); ?>
