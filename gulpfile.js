// Dependencies
var gulp = require('gulp'),
    // CSS stuff
    sass = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    minify = require('gulp-minify-css'),
    // Javascript stuff
    uglify = require('gulp-uglify'),
    strip = require('gulp-strip-debug'),
    concat = require('gulp-concat'),
    // Images
    imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    // Other
    clean = require('gulp-rimraf'),
    notify = require('gulp-notify');

// Assets
var paths = {
    assets: {
        styles: {
            dir: 'app/assets/styles',
            files: 'app/assets/styles/**/*.scss'
        },
        scripts: {
            dir: 'app/assets/scripts/',
            files: [
                'app/assets/scripts/src/**/*.js',
                'app/assets/scripts/vendor/**/*.js',
                'app/assets/scripts/main.js'
            ]
        },
        images: {
            dir: 'app/assets/images',
            files: 'app/assets/images/**/*'
        }
    },
    public: {
        styles: 'public/styles',
        scripts: 'public/scripts',
        images: 'public/images',
    }
}

// General settings
var settings = {
    autoprefix: {
        versions: 'last 4 version'
    }
}

/**
 * Styles task
 * -----------------
 * Grabs everything inside the styles & sprites directories, concantinates
 * and compiles scss, builds sprites, and then outputs them to their
 * respective target directories.
 */
gulp.task('styles', function() {
    gulp.src(paths.assets.styles.files)
        .pipe(sass())
        .pipe(autoprefix(settings.autoprefix.versions))
        .pipe(gulp.dest(paths.public.styles));
});

/**
 * Scripts task
 * ------------
 * Grabs everything inside the scripts directory, concantinates and minifies,
 * and then outputs them to the target directory.
 */
gulp.task('scripts', function() {
    gulp.src(paths.assets.scripts.files)
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(paths.public.scripts));
});

/**
 * Image task
 * ----------
 * Grabs everything inside the images directory, optimises each image,
 * and then outputs them to the target directory.
 */
gulp.task('images', function() {
    gulp.src(paths.assets.images.files)
        .pipe(cache(imagemin({optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest(paths.public.images));
});

/**
 * Cache-buster task
 * -----------------
 * Completely clear the cache to stop image-min outputting oncorrect image names etc
 */
gulp.task('clear', function (done) {
    return cache.clearAll(done);
});

/**
 * Cleaner task
 * ------------
 * This simply deletes all of the main assets folders.
 */
gulp.task('clean', function() {
    return gulp.src([paths.public.styles, paths.public.scripts, paths.public.images], {read: false})
        .pipe(clean());
});

/**
 * Watch task
 * ----------
 * Watches the different directores for changes and then
 * runs their relevant tasks and livereloads.
 */
gulp.task('watch', function() {
    // Run the appropriate task when assets change
    gulp.watch(paths.assets.styles.files, ['styles']);
    gulp.watch(paths.assets.scripts.files, ['scripts']);
    gulp.watch(paths.assets.images.files, ['images']);
});

/**
 * Deploy task
 * -----------
 * Runs all of the main tasks, plus minification.
 */
gulp.task('deploy', ['clean'], function() {
    // Run the styles task, but minify the output
    gulp.src(paths.assets.styles.files)
        .pipe(sass())
        .pipe(autoprefix(settings.autoprefix.versions))
        .pipe(minify())
        .pipe(gulp.dest(paths.public.styles));

    // Run the JS task, but strip out debugging code and the uglify it
    gulp.src(paths.assets.scripts.files)
        .pipe(concat('main.min.js'))
        .pipe(strip())
        .pipe(uglify())
        .pipe(gulp.dest(paths.public.scripts));

    // Run the image task
    gulp.start('images');
});

/**
 * Defualt task
 * ------------
 * Runs every task, and then watches files for changes.
 */
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts', 'images', 'watch');
});
