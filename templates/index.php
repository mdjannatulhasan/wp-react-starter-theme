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
$is_dev_mode = defined('WP_DEBUG') && WP_DEBUG;
?>

<script>
// Show loading state
document.addEventListener('DOMContentLoaded', function() {
    // Add loading class to body
    document.body.classList.add('react-app-loading');
    
    <?php if ($is_dev_mode): ?>
    // Development mode - load from dev server
    var script = document.createElement('script');
    script.src = 'http://localhost:3000/bundle.js';
    script.onload = function() {
        document.body.classList.remove('react-app-loading');
        document.body.classList.add('react-app-loaded');
    };
    script.onerror = function() {
        // Fallback to built bundle
        loadProductionBundle();
    };
    document.head.appendChild(script);
    <?php else: ?>
    // Production mode - load built bundle
    loadProductionBundle();
    <?php endif; ?>
    
    function loadProductionBundle() {
        var script = document.createElement('script');
        script.src = '<?php echo esc_url($react_bundle_path); ?>';
        script.onload = function() {
            document.body.classList.remove('react-app-loading');
            document.body.classList.add('react-app-loaded');
        };
        script.onerror = function() {
            // Show fallback content if React app fails to load
            document.getElementById('root').innerHTML = '<div style="text-align: center; padding: 50px;"><h1>Welcome to WordPress React Theme</h1><p>The React app is being built. Please run <code>npm run build</code> in your theme directory.</p></div>';
        };
        document.head.appendChild(script);
    }
});
</script>

<?php get_footer(); ?>
