const path = require('path');
const FileManagerPlugin = require('filemanager-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

const themeDirectoryName = 'morgancreek';

const config = {
  entry: {
    'js/script.js': './src/index.js'
  },
  output: {
    path: path.resolve(
      __dirname,
      `dist/wp-content/themes/${themeDirectoryName}`
    ),
    filename: '[name]'
  },
  resolve: {
    extensions: ['.js', '.php', '.css']
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader'
        }
      },
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
              options: { importLoaders: 1, minimize: true }
            },
            'postcss-loader'
          ]
        })
      },
      {
        test: /\.(woff|woff2|)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 8912,
              name: 'fonts/[name].[ext]',
              publicPath: '../'
            }
          }
        ]
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              limit: 8912,
              context: 'src/theme',
              name: '[path][name].[ext]',
              publicPath: '../'
            }
          }
          // {
          //   loader: 'image-webpack-loader',
          //   options: {
          //     bypassOnDebug: true,

          //   }
          // }
        ]
      }
    ]
  },
  plugins: [
    new FileManagerPlugin({
      onStart: [
        // {
        // delete: [
        // path.resolve(
        //   __dirname,
        //   `dist/wp-content/themes/${themeDirectoryName}/**/*.php`
        // // )
        // path.resolve(
        //   __dirname,
        //   `dist/wp-content/themes/${themeDirectoryName}/img`
        // )
        // ]
        // },
        {
          copy: [
            {
              source: path.resolve(__dirname, 'src/theme/**/*'),
              destination: path.resolve(
                __dirname,
                `dist/wp-content/themes/${themeDirectoryName}`
              )
            }
          ]
        }
      ]
    }),
    new CopyWebpackPlugin([
      {
        from: 'src/theme/',
        toType: 'dir'
      }
    ]),
    new ExtractTextPlugin({
      filename: 'css/style.css'
    })
  ]
};

module.exports = config;
