const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
  mode:process.env.NODE_ENV,
  entry:  __dirname + "/js/app.js",
  output: {
    path: __dirname,
    filename: "bundle.js"
  },

  module: {
    rules: [
      {
        test: /\.ts$/,
        exclude: /node_modules/,
        loader: 'ts-loader'
      }
    ]
  },
  plugins: [
    new UglifyJSPlugin()
  ],

  resolve:{ 
      extensions:['.js','.ts']
  },
  watchOptions: {
      poll: true
  }
}