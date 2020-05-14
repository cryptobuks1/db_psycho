let mix = require('laravel-mix');

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

if(mix.config.inProduction){
    mix.js('resources/assets/js/app.js', 'public/js')
        .babel('public/js/app.js', 'public/js/app.js') // IE11
        .js('resources/assets/js/login.js', 'public/js')
        .babel('public/js/login.js', 'public/js/login.js') // IE11
        .js('resources/assets/js/custom-vue.js', 'public/js')
        .babel('public/js/custom-vue.js', 'public/js/custom-vue.js') // IE11
        .minify()
        .sass('resources/assets/sass/app.scss', 'public/css')
        .sass('resources/assets/sass/login.scss', 'public/css')
}else{
    mix.js('resources/assets/js/app.js', 'public/js')
        .js('resources/assets/js/login.js', 'public/js')
        .js('resources/assets/js/custom-vue.js', 'public/js')
        .sass('resources/assets/sass/app.scss', 'public/css')
        .sass('resources/assets/sass/login.scss', 'public/css')
}

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.less(src, output);
// mix.stylus(src, output);
// mix.browserSync();
// mix.combine(files, destination);
// mix.babel('src/app.js', 'public/js/js');
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify('public/js/app.js');
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//     extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//     processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//     purifyCss: false, // Remove unused CSS selectors.
//     uglify: {
//         compress: false,
//     }, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//     postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
