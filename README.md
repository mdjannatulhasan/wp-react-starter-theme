# WP React Starter Theme

A modern, fast, and beautiful React-based WordPress theme starter package. Get started with WordPress theme development using React in seconds!

## 🚀 Features

- **Modern React 18** with hooks and functional components
- **Webpack 5** with hot reloading and optimization
- **Responsive Design** that works on all devices
- **Modern CSS** with CSS variables and flexbox/grid
- **SEO-friendly** structure
- **Accessibility focused** components
- **Easy customization** with modular components
- **Fast development** with hot reloading

## 📦 Installation

### Global Installation (Recommended)

```bash
npm install -g wp-react-starter-theme
```

### Create a New Theme

```bash
wp-react-starter my-awesome-theme
```

Or if you prefer npx:

```bash
npx wp-react-starter-theme my-awesome-theme
```

## 🛠️ Development

After creating your theme, navigate to the theme directory and install dependencies:

```bash
cd my-awesome-theme
npm install
```

### Available Scripts

- `npm run dev` - Start development server with hot reloading
- `npm run build` - Build for production
- `npm start` - Start development server and open browser

## 📁 Project Structure

```
my-awesome-theme/
├── src/
│   ├── components/     # Reusable React components
│   ├── pages/         # Page components
│   ├── styles/        # CSS files
│   ├── App.js         # Main App component
│   └── index.js       # Entry point
├── dist/              # Built files (generated)
├── webpack.config.js  # Webpack configuration
├── .babelrc          # Babel configuration
└── package.json      # Dependencies and scripts
```

## 🎨 Customization

### Colors and Styling

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
3. Add navigation link in `src/components/Header.js`

### Adding New Components

Create reusable components in `src/components/` and import them where needed.

## 🔧 WordPress Integration

This starter theme is designed to be easily integrated with WordPress. To connect with WordPress:

1. **Set up WordPress REST API endpoints**
2. **Create PHP templates** that load the React app
3. **Configure WordPress to serve the built React app**

Example `index.php` for WordPress:

```php
<?php get_header(); ?>

<div id="root"></div>
<script src="<?php echo get_template_directory_uri(); ?>/dist/bundle.js"></script>

<?php get_footer(); ?>
```

## 📱 Responsive Design

The theme is built with a mobile-first approach and includes:

- Responsive navigation with hamburger menu
- Flexible grid layouts
- Optimized typography for all screen sizes
- Touch-friendly interactions

## 🚀 Performance

- **Code splitting** with React Router
- **Optimized builds** with Webpack
- **Minified CSS and JavaScript** for production
- **Fast loading** with optimized assets

## 🤝 Contributing

We welcome contributions! Please feel free to submit a Pull Request.

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
- Icons from [Emoji](https://emojipedia.org/)

---

Made with ❤️ for the WordPress community
