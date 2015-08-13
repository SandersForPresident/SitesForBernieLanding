var gulp = require('gulp'),
    less = require('gulp-less'),
    concat = require('gulp-concat');

gulp.task('less', function () {
  gulp.src('assets/less/main.less')
  .pipe(less())
  .pipe(gulp.dest('dist/'));
});

gulp.task('js:vendor', function () {
  gulp.src([
    'bower_components/typed.js/dist/typed.min.js'
  ])
  .pipe(concat('vendor.js'))
  .pipe(gulp.dest('dist/'));
});

gulp.task('js:client', function () {
  gulp.src('assets/js/**/*.js')
  .pipe(concat('site.js'))
  .pipe(gulp.dest('dist/'));
});

gulp.task('default', ['less', 'js:client', 'js:vendor'], function () {
  gulp.watch('assets/less/**/*.less', ['less']);
  gulp.watch('assets/js/**/*.js', ['js:client']);
});
