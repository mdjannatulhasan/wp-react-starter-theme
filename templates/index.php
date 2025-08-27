<?php
/**
 * The main template file
 *
 * @package WP_React_Starter_Theme
 */

get_header(); ?>

<div id="root" class="react-app-loading">
    <!-- React app will be loaded here -->
</div>

<?php
// Load the React app bundle
$react_bundle_path = get_template_directory_uri() . '/dist/bundle.js';
?>

<script>
// Show loading state
document.addEventListener('DOMContentLoaded', function() {
    // Add loading class to body
    document.body.classList.add('react-app-loading');
    
    // Load React app
    var script = document.createElement('script');
    script.src = '<?php echo esc_url($react_bundle_path); ?>';
    script.onload = function() {
        // Remove loading state when React app loads
        document.body.classList.remove('react-app-loading');
        document.body.classList.add('react-app-loaded');
    };
    script.onerror = function() {
        // Show fallback content if React app fails to load
        document.getElementById('root').innerHTML = '<div style="text-align: center; padding: 50px;"><h1>Welcome to WordPress React Theme</h1><p>The React app is being built. Please run <code>npm run build</code> in your theme directory.</p></div>';
    };
    document.head.appendChild(script);
});
</script>

<?php get_footer(); ?>
