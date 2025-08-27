# Development Guide

This guide explains how to develop with your WordPress React theme.

## 🚀 **Development Workflow**

### **Option 1: WordPress Development Mode**

1. **Enable WordPress debug mode** in `wp-config.php`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```

2. **Start React development server**:
   ```bash
   cd your-theme-directory
   npm run dev
   ```

3. **Visit your WordPress site** - The React app will load from the dev server

### **Option 2: Production Mode**

1. **Build the React app**:
   ```bash
   npm run build
   ```

2. **Visit your WordPress site** - The React app will load from the built bundle

## 🔧 **Troubleshooting**

### **Common Issues**

#### **"React is not defined" Error**
- **Cause**: React app not loading properly
- **Solution**: 
  - Make sure you've run `npm install`
  - Run `npm run build` for production
  - Or run `npm run dev` for development
  - **Fixed in v1.0.3**: React and ReactDOM are now loaded from CDN

#### **Route Matching Errors**
- **Cause**: React Router can't match WordPress URLs
- **Solution**: The theme now includes a catch-all route that redirects to home
- **Fixed in v1.0.3**: Better URL handling and fallback routes

#### **CORS Errors in Development**
- **Cause**: WordPress and React dev server on different ports
- **Solution**: The webpack config now includes CORS headers

#### **"Cannot read properties of undefined"**
- **Cause**: WordPress plugins or themes conflicting
- **Solution**: 
  - Disable other plugins temporarily
  - Check browser console for specific errors
  - Ensure React app is loading before other scripts

### **Development Tips**

1. **Use Browser DevTools** to check:
   - Network tab: Is the React bundle loading?
   - Console tab: Any JavaScript errors?
   - Sources tab: Is the React app running?

2. **WordPress Debug Mode**:
   - Add to `wp-config.php`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   define('WP_DEBUG_DISPLAY', false);
   ```

3. **Check File Permissions**:
   - Ensure WordPress can read the theme files
   - Check that `dist/bundle.js` exists and is readable

4. **Clear Caches**:
   - Clear browser cache
   - Clear WordPress cache if using caching plugins
   - Restart development server

## 📁 **File Structure**

```
your-theme/
├── src/                    # React source files
│   ├── components/         # React components
│   ├── pages/             # Page components
│   ├── styles/            # CSS files
│   ├── App.js             # Main React app
│   └── index.js           # React entry point
├── dist/                  # Built files (generated)
├── style.css              # WordPress theme stylesheet
├── index.php              # Main WordPress template
├── functions.php          # WordPress functions
├── webpack.config.js      # Webpack configuration
└── package.json           # Dependencies and scripts
```

## 🎯 **Best Practices**

1. **Development**: Use `npm run dev` for hot reloading
2. **Production**: Use `npm run build` before deploying
3. **Testing**: Test in both development and production modes
4. **WordPress Integration**: Use WordPress hooks and functions when needed
5. **Performance**: Optimize React bundle size for production

## 🔄 **Workflow Summary**

### **For Development:**
```bash
# 1. Enable WordPress debug mode
# 2. Start React dev server
npm run dev

# 3. Visit WordPress site
# 4. Make changes to React code
# 5. See changes immediately
```

### **For Production:**
```bash
# 1. Build React app
npm run build

# 2. Upload to WordPress
# 3. Activate theme
# 4. Test functionality
```

## 🆘 **Getting Help**

If you encounter issues:

1. **Check the browser console** for JavaScript errors
2. **Check WordPress debug log** for PHP errors
3. **Verify file paths** and permissions
4. **Test in different browsers**
5. **Disable other plugins** to isolate issues

---

**Happy developing! 🚀**
