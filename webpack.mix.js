const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/vendor.scss', 'public/css')
    .options({
        postCss: [
            require('postcss-normalize')()
        ]
    })
    .postCss('resources/css/app.css', 'public/css', [
        //require('postcss-normalize')()
    ])
    .copy('node_modules/ckeditor4/ckeditor.js', 'public/js/ckeditor/ckeditor.js')
    .copy('node_modules/ckeditor4/config.js', 'public/js/ckeditor/config.js')
    .copy('node_modules/ckeditor4/styles.js', 'public/js/ckeditor/styles.js')
    .copy('node_modules/ckeditor4/contents.css', 'public/js/ckeditor/contents.css')
    .copyDirectory('node_modules/ckeditor4/skins', 'public/js/ckeditor/skins')
    .copyDirectory('node_modules/ckeditor4/lang', 'public/js/ckeditor/lang')
    .copyDirectory('node_modules/ckeditor4/plugins', 'public/js/ckeditor/plugins')
    .extract(['bootstrap', '@popperjs/core'])
    .version();
