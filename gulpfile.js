var gulp = require('gulp'),
    less = require('gulp-less'),
    concat = require('gulp-concat'),
    minifyCss = require('gulp-minify-css'),
    uglify = require('gulp-uglify');

gulp.task('less', function () {
  gulp.src('assets/less/main.less')
  .pipe(less())
  .pipe(minifyCss())
  .pipe(gulp.dest('dist/'));
});

gulp.task('js:vendor', function () {
  gulp.src([
    'bower_components/typed.js/dist/typed.min.js',
    'bower_components/jqvmap/jqvmap/jquery.vmap.js',
    'bower_components/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
    'bower_components/jquery-throttle-debounce/jquery.ba-throttle-debounce.js'
  ])
  .pipe(concat('vendor.js'))
  .pipe(uglify())
  .pipe(gulp.dest('dist/'));
});

gulp.task('js:client', function () {
  gulp.src('assets/js/**/*.js')
  .pipe(concat('site.js'))
  .pipe(uglify())
  .pipe(gulp.dest('dist/'));
});

gulp.task('build', ['less', 'js:client', 'js:vendor']);

gulp.task('default', ['build'], function () {
  gulp.watch('assets/less/**/*.less', ['less']);
  gulp.watch('assets/js/**/*.js', ['js:client']);
});
