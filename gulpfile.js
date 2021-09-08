(() => {
    'use strict';
    /**************** gulpfile.js configuration ****************/
    const
      // development or production
      devBuild  = ((process.env.NODE_ENV || 'development').trim().toLowerCase() === 'development'),
      // directory locations
      dir = {
          src         : './',
          build       : 'assets/',
          bower       : 'bower_components/'
      },
      // modules
      gulp          = require('gulp'),
      env           = require('gulp-env'),
      noop          = require('gulp-noop'),
      newer         = require('gulp-newer'),
      size          = require('gulp-size'),
      imagemin      = require('gulp-imagemin'),
      sass          = require('gulp-sass'),
      postcss       = require('gulp-postcss'),
      concat        = require('gulp-concat'),
      rename        = require('gulp-rename'),
      uglify        = require('gulp-uglify-es').default,
      sourcemaps    = devBuild ? require('gulp-sourcemaps') : null,
      browsersync   = devBuild ? require('browser-sync').create() : null;
    console.log('Gulp', devBuild ? 'development' : 'production', 'build');
    /**************** images task ****************/
    const imgConfig = {
        src           : dir.src + 'img/**/*',
        build         : dir.build + 'img/',
        minOpts: {
            optimizationLevel: 5
        }
    };
    function images() {
        return gulp.src(imgConfig.src)
          .pipe(newer(imgConfig.build))
          .pipe(imagemin(imgConfig.minOpts))
          .pipe(size({ showFiles:true }))
          .pipe(gulp.dest(imgConfig.build));
    }
    exports.images = images;
    /**************** CSS task ****************/
    const cssConfig = {
        src         : dir.src + 'css/style.scss',
        watch       : dir.src + 'css/**/*',
        build       : dir.build + 'css/',
        // build       : dir.src + 'css/',
        sassOpts: {
            sourceMap       : devBuild,
            imagePath       : '/images/',
            precision       : 3,
            errLogToConsole : true
        },
        postCSS: [
            // require('usedcss')({
            //     html: ['index.html']
            // }),
            // require('postcss-assets')({
            //     loadPaths: ['img/'],
            //     basePath: dir.build
            // }),
            require('autoprefixer')({
                browsers: ['> 1%']
            }),
            require("postcss-import")({ root: dir.src + '/css/style.scss'}),
            require('cssnano')
        ]
    };
    function css() {
        return gulp.src(cssConfig.src)
          .pipe(sourcemaps ? sourcemaps.init() : noop())
          .pipe(sass(cssConfig.sassOpts).on('error', sass.logError))
          .pipe(postcss(cssConfig.postCSS))
          .pipe(sourcemaps ? sourcemaps.write() : noop())
          .pipe(size({ showFiles: true }))
          .pipe(gulp.dest(cssConfig.build))
          .pipe(browsersync ? browsersync.reload({ stream: true }) : noop());
    }
    exports.css = gulp.series(images,  css);
    /*******************  js task ****************************/
    const jsTask = {
        jsFiles: [
            //dir.bower + 'jquery/dist/jquery.min.js',
            // assumption that here only used effects ( 237 kb saved then !!!)
            //dir.bower + 'jquery-ui/jquery-ui.min.js',
            dir.bower + 'jquery-ui/ui/effect.js',
            dir.bower + 'slick-carousel/slick/slick.min.js',
            dir.src + 'js/**/!(custom)*.js',
            dir.src + 'js/jquery-ui.min.js',
            dir.src + 'js/jquery.ui.touch-punch.min.js',
            dir.src + 'js/jquery.matchHeight.js',
            dir.src + 'js/jquery.multiselect.js',
            dir.src + 'js/isotope.pkgd.min.js',
            dir.src + 'js/custom.js',
        ],
        jsDest: dir.build + 'js'
    };
    function scripts(){
        env({
            file: '.env'
          });

        return gulp.src(jsTask.jsFiles)
          .pipe(size({ showFiles:true }))
          .pipe(concat('scripts.js'))
          .pipe(rename('scripts.min.js'))
          .pipe(uglify())
          .pipe(size({ showFiles:true }))
          .pipe(gulp.dest(jsTask.jsDest));
    }
    exports.scripts = gulp.series(scripts);
    /**************** server task (private) ****************/
    const syncConfig = {
        server: {
            baseDir   : './assets',
            index     : 'index.html'
        },
        port        : 8000,
        open        : false
    };
    // browser-sync
    function server(done) {
        if (browsersync) browsersync.init(syncConfig);
        done();
    }
    /**************** watch task (private) ****************/
    function watch(done) {
        // image changes
        gulp.watch(imgConfig.src, images);
        // CSS changes
        gulp.watch(cssConfig.watch, css);
        done();
    }
    /**************** default task ****************/
    exports.default = gulp.series(exports.css, scripts, watch, server);
})();
