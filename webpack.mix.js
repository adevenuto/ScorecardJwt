const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.webpackConfig({
       watchOptions: {
         aggregateTimeout: 2000,
         poll: 2000,
         ignored: /node_modules/
       },
       resolve: {
          alias: {
            '@': path.resolve('resources/assets/sass')
          }
        } 
   	})
	.options({
		processCssUrls: false
	});
mix.browserSync({
	proxy: 'http://scorecard.tony',
	browser: 'chrome',
	open: false,
	notify: false,
	files: [
       'app/**/*',
       'public/**/*',
       'resources/views/**/*',
       'resources/lang/**/*',
       'routes/**/*'
    ]
});