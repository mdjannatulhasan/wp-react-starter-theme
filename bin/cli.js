#!/usr/bin/env node

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// Colors for console output
const colors = {
  green: '\x1b[32m',
  blue: '\x1b[34m',
  yellow: '\x1b[33m',
  red: '\x1b[31m',
  reset: '\x1b[0m',
  bold: '\x1b[1m'
};

function log(message, color = 'reset') {
  console.log(`${colors[color]}${message}${colors.reset}`);
}

function createDirectory(dirPath) {
  if (!fs.existsSync(dirPath)) {
    fs.mkdirSync(dirPath, { recursive: true });
  }
}

function copyTemplateFiles(sourceDir, targetDir) {
  const templateDir = path.join(__dirname, '..', 'templates');
  
  if (!fs.existsSync(templateDir)) {
    log('Template directory not found!', 'red');
    process.exit(1);
  }

  function copyRecursive(src, dest) {
    const stats = fs.statSync(src);
    
    if (stats.isDirectory()) {
      if (!fs.existsSync(dest)) {
        fs.mkdirSync(dest, { recursive: true });
      }
      
      const files = fs.readdirSync(src);
      files.forEach(file => {
        copyRecursive(path.join(src, file), path.join(dest, file));
      });
    } else {
      fs.copyFileSync(src, dest);
    }
  }

  copyRecursive(templateDir, targetDir);
}

function updatePackageJson(themeName, targetDir) {
  const packagePath = path.join(targetDir, 'package.json');
  const packageJson = JSON.parse(fs.readFileSync(packagePath, 'utf8'));
  
  packageJson.name = themeName;
  packageJson.description = `A React-based WordPress theme: ${themeName}`;
  
  fs.writeFileSync(packagePath, JSON.stringify(packageJson, null, 2));
}

function main() {
  const args = process.argv.slice(2);
  const themeName = args[0] || 'my-wp-react-theme';
  const forceOverwrite = args.includes('--force') || args.includes('-f');
  const wpThemesDir = args.find(arg => arg.startsWith('--wp-themes='))?.split('=')[1];
  
  log('🚀 Creating WordPress React Starter Theme...', 'blue');
  log(`Theme name: ${themeName}`, 'green');
  
  let targetDir;
  if (wpThemesDir) {
    targetDir = path.join(wpThemesDir, themeName);
    log(`📁 Installing to WordPress themes directory: ${wpThemesDir}`, 'blue');
  } else {
    targetDir = path.join(process.cwd(), themeName);
  }
  
  if (fs.existsSync(targetDir)) {
    if (forceOverwrite) {
      log(`⚠️  Directory "${themeName}" exists. Overwriting...`, 'yellow');
      fs.rmSync(targetDir, { recursive: true, force: true });
    } else {
      log(`❌ Directory "${themeName}" already exists!`, 'red');
      log('💡 Use --force or -f to overwrite existing theme', 'blue');
      log('   Example: wp-react-starter my-theme --force', 'blue');
      process.exit(1);
    }
  }
  
  try {
    // Create theme directory
    createDirectory(targetDir);
    
    // Copy template files
    copyTemplateFiles('templates', targetDir);
    
    // Update package.json with theme name
    updatePackageJson(themeName, targetDir);
    
    log('\n✅ WordPress React theme created successfully!', 'green');
    log('\n📋 Next steps:', 'blue');
    
    if (wpThemesDir) {
      log('   ✅ Theme installed directly to WordPress themes directory', 'green');
      log('   📝 Activate the theme in WordPress admin', 'yellow');
      log('   🔧 For development, run these commands:', 'blue');
      log(`      cd ${targetDir}`, 'yellow');
      log('      npm install', 'yellow');
      log('      npm run dev', 'yellow');
    } else {
      log(`   cd ${themeName}`, 'yellow');
      log('   npm install', 'yellow');
      log('   npm run build', 'yellow');
      log('   📝 Upload to WordPress themes directory', 'yellow');
      log('   📝 Activate the theme in WordPress admin', 'yellow');
    }
    
    log('\n💡 Pro tip: Use --wp-themes=PATH to install directly to WordPress', 'blue');
    log('   Example: wp-react-starter my-theme --wp-themes=/path/to/wp-content/themes', 'blue');
    log('\n🎉 Your theme is ready to use!', 'green');
    
  } catch (error) {
    log(`❌ Error creating theme: ${error.message}`, 'red');
    process.exit(1);
  }
}

main();
