# WP React Professional Theme

A professional WordPress theme with React integration, featuring modern design, WordPress Customizer support, multiple menu locations, and seamless React component integration. Perfect for developers who want the power of React with WordPress's content management capabilities.

## 🚀 Features

### WordPress Integration
- **Multiple Menu Locations**: Primary, Footer, and Mobile menus
- **Widget Areas**: Sidebar and 4 footer widget areas
- **WordPress Customizer**: Easy theme customization
- **Custom Logo Support**: Upload your logo through WordPress admin
- **Featured Images**: Multiple image sizes for optimal performance
- **SEO Optimized**: Proper WordPress hooks and meta tags
- **Translation Ready**: Full internationalization support

### React Features
- **Modern React 18** with hooks and functional components
- **Webpack 5** with hot reloading and optimization
- **WordPress Menu Integration**: React components automatically use WordPress menus
- **Responsive Design**: Mobile-first approach with professional styling
- **Component-Based Architecture**: Modular and reusable components
- **Development & Production Modes**: Separate configurations for different environments

### Professional Design
- **Modern CSS Variables**: Easy customization with CSS custom properties
- **Professional Typography**: Optimized font stacks and spacing
- **Accessibility Focused**: WCAG compliant with proper ARIA labels
- **Mobile-First Responsive**: Works perfectly on all devices
- **Performance Optimized**: Fast loading with optimized assets

## 📦 Installation

### Global Installation (Recommended)

```bash
npm install -g wp-react-starter-theme
```

### Create a New Theme

```bash
# Basic usage
wp-react-starter my-professional-theme

# Overwrite existing theme
wp-react-starter my-professional-theme --force

# Install directly to WordPress themes directory
wp-react-starter my-professional-theme --wp-themes=/path/to/wp-content/themes

# Combine options
wp-react-starter my-professional-theme --wp-themes=/path/to/wp-content/themes --force
```

Or if you prefer npx:

```bash
npx wp-react-starter-theme my-professional-theme
```

## 🛠️ Development

### Option 1: Standard Installation

After creating your theme, navigate to the theme directory and install dependencies:

```bash
cd my-professional-theme
npm install
npm run build
```

### Option 2: Direct WordPress Installation

Install directly to your WordPress themes directory to avoid manual uploads:

```bash
# Install to WordPress themes directory
wp-react-starter my-professional-theme --wp-themes=/Applications/XAMPP/xamppfiles/htdocs/wordpress-test/wp-content/themes

# Navigate to theme directory
cd /Applications/XAMPP/xamppfiles/htdocs/wordpress-test/wp-content/themes/my-professional-theme

# Install dependencies and start development
npm install
npm run dev
```

### Available Scripts

- `npm run dev` - Start development server with hot reloading
- `npm run build` - Build for production (required for WordPress)
- `npm start` - Start development server and open browser

## 📁 Project Structure

```
my-professional-theme/
├── src/
│   ├── components/     # Reusable React components
│   │   ├── Header.js   # WordPress menu integration
│   │   └── Footer.js   # WordPress footer integration
│   ├── pages/         # Page components
│   ├── styles/        # CSS files
│   ├── App.js         # Main App component
│   └── index.js       # Entry point
├── template-parts/    # WordPress template parts
├── dist/              # Built files (generated)
├── js/                # WordPress JavaScript files
├── style.css          # WordPress theme stylesheet
├── functions.php      # WordPress functions and features
├── header.php         # WordPress header template
├── footer.php         # WordPress footer template
├── index.php          # Main WordPress template
├── front-page.php     # Homepage with React integration
├── webpack.config.js  # Webpack configuration
└── package.json       # Dependencies and scripts
```

## 🎨 Customization

### WordPress Admin Customization

1. **Menus**: Go to Appearance → Menus to create and manage navigation menus
2. **Widgets**: Go to Appearance → Widgets to add content to sidebar and footer areas
3. **Customizer**: Go to Appearance → Customize to modify theme settings
4. **Logo**: Upload your logo through Appearance → Customize → Site Identity

### React Component Customization

The theme uses CSS variables for easy customization. Edit `src/styles/main.css` to change colors, fonts, and other design tokens:

```css
:root {
  --primary-color: #2563eb;
  --secondary-color: #64748b;
  --accent-color: #f59e0b;
  /* ... more variables */
}
```

### Adding New Pages

1. Create a new component in `src/pages/`
2. Add the route in `src/App.js`
3. The navigation will automatically update when you add menu items in WordPress admin

### Adding New Components

Create reusable components in `src/components/` and import them where needed.

## 🔧 WordPress Integration

This is a **complete WordPress theme** that works out of the box! The theme includes:

- ✅ **Complete WordPress theme files** (style.css, index.php, functions.php, etc.)
- ✅ **React app integration** that loads automatically on the homepage
- ✅ **WordPress admin compatibility** (customizer, menus, widgets)
- ✅ **SEO-friendly structure** with proper WordPress hooks
- ✅ **Responsive design** that works on all devices

### How It Works

1. **Install and activate** the theme in WordPress admin
2. **Build the React app** with `npm run build`
3. **Your React app loads** automatically on the homepage
4. **WordPress handles** the backend (admin, content management)
5. **Menus created in WordPress admin** automatically appear in React components

The theme seamlessly combines WordPress's content management with React's modern frontend capabilities.

## 📱 Responsive Design

The theme is built with a mobile-first approach and includes:

- Responsive navigation with hamburger menu
- Flexible grid layouts
- Optimized typography for all screen sizes
- Touch-friendly interactions
- Professional mobile menu functionality

## 🚀 Performance

- **Code splitting** with React Router
- **Optimized builds** with Webpack
- **Minified CSS and JavaScript** for production
- **Fast loading** with optimized assets
- **WordPress menu caching** for better performance

## 🎯 Best Practices

### WordPress Development
- Follows WordPress coding standards
- Proper use of WordPress hooks and filters
- SEO-optimized structure
- Accessibility compliant
- Translation ready

### React Development
- Modern React patterns with hooks
- Component-based architecture
- Proper state management
- Performance optimized
- Clean and maintainable code

## 🤝 Contributing

We welcome contributions! Please feel free to submit a Pull Request.

### Development Guidelines
1. Follow WordPress coding standards for PHP files
2. Use modern React patterns and hooks
3. Ensure accessibility compliance
4. Test on multiple devices and browsers
5. Update documentation as needed

## 📄 License

MIT License - feel free to use this theme for any project.

## 🆘 Support

If you have any questions or need help:

1. Check the [documentation](https://github.com/mdjannatulhasan/wp-react-starter-theme)
2. Open an [issue](https://github.com/mdjannatulhasan/wp-react-starter-theme/issues)

## 🙏 Acknowledgments

- Built with [React](https://reactjs.org/)
- Bundled with [Webpack](https://webpack.js.org/)
- Styled with modern CSS
- WordPress integration following best practices

---

Made with ❤️ for the WordPress and React communities
