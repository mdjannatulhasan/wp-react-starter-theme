const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require('webpack');

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === 'development';
  
  return {
    entry: './src/index.js',
    output: {
      path: path.resolve(__dirname, 'dist'),
      filename: 'bundle.js',
      clean: true,
      publicPath: isDevelopment ? 'http://localhost:3000/' : '/wp-content/themes/my-awesome-theme/dist/',
      library: 'ReactApp',
      libraryTarget: 'umd',
      globalObject: 'this',
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env', '@babel/preset-react'],
            },
          },
        },
        {
          test: /\.css$/,
          use: ['style-loader', 'css-loader'],
        },
      ],
    },
    resolve: {
      extensions: ['.js', '.jsx'],
    },
    externals: {
      'react': 'React',
      'react-dom': 'ReactDOM',
    },
    plugins: [
      new HtmlWebpackPlugin({
        template: './src/index.html',
      }),
      new webpack.DefinePlugin({
        'process.env.REACT_APP_IS_WORDPRESS': JSON.stringify('true'),
        'process.env.REACT_APP_DEV_MODE': JSON.stringify(isDevelopment ? 'true' : 'false'),
        'process.env.REACT_APP_THEME_NAME': JSON.stringify('WP React Starter Theme'),
      }),
    ],
    devServer: {
      static: {
        directory: path.join(__dirname, 'dist'),
      },
      compress: true,
      port: 3000,
      hot: true,
      headers: {
        'Access-Control-Allow-Origin': '*',
      },
    },
    devtool: isDevelopment ? 'eval-source-map' : false,
  };
};
