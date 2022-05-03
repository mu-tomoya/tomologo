module.exports = {
  mode:process.env.NODE_ENV,
  entry:  __dirname + "/js/app.js",
  watch:true,
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

  resolve:{ 
      extensions:['.js','.ts']
  },
  watchOptions: {
      poll: true
  }
}