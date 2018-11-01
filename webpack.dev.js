const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const merge = require('webpack-merge');
const common = require('./webpack.common.js');

const devUrl = 'http://morgancreek.local';

module.exports = merge(common, {
  mode: 'development',
  watch: true,
  devtool: 'cheap-module-source-map',
  plugins: [
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 4000,
      proxy: devUrl,
      snippetOptions: {
        ignorePaths: ['wp-admin/**']
      },
      files: [
        {
          match: 'src/**/*.php'
        }
      ]
    })
  ]
});
