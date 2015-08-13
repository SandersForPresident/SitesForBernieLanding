var gulp = require('gulp'),
    less = require('gulp-less');

gulp.task('less', function () {
  gulp.src('assets/less/main.less')
  .pipe(less())
  .pipe(gulp.dest('dist/'));
});
