const webpack = require('webpack');
const PROD = JSON.parse(process.env.PROD_ENV || '0');

module.exports = {
    entry: {
        index: './src/scripts/index.js',
        twitterwall: './src/scripts/twitterwall.js',
    },
    output: {
        path: __dirname + '/wp/wp-content/themes/sysart/scripts',
        filename: '[name].min.js'
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel', // 'babel-loader' is also a valid name to reference
                query: {
                    presets: ['es2015']
                }
            }
        ]
    },

    plugins: PROD ? [
        new webpack.optimize.UglifyJsPlugin({minimize: true})
    ] : []
}
