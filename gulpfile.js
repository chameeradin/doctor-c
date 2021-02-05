var gulp            = require('gulp');
var browserSync     = require('browser-sync').create();
var sass            = require('gulp-sass');
var autoprefixer    = require('gulp-autoprefixer');
var cssmin          = require('gulp-cssmin');
var rename          = require('gulp-rename');


gulp.task('sass', function () {
    return gulp.src(['public/assets/sass/**/*.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/assets/css'))
        .pipe(browserSync.stream());
});
gulp.task('js', function(){
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'node_modules/jquery/dist/jquery.min.js'])
        .pipe(gulp.dest('public/assets/js'))
        .pipe(browserSync.stream());
});
gulp.task('serve',['sass'], function () {
    browserSync.init({
        open: 'external',
        host: 'www.ervapp.local',
        proxy: 'http://www.ervapp.local'
    });
    gulp.watch(['public/assets/sass/**/*.scss'], ['sass']);
    gulp.watch("*.php").on('change', browserSync.reload);
});
gulp.task('default', ['js','serve']);