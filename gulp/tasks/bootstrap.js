var gulp         = require('gulp');
var sass         = require('gulp-sass');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').bootstrap;

gulp.task('bootstrap', function () {
  return gulp.src(config.src)
    .pipe(sass(config.settings))
    .on('error', handleErrors)
    .pipe(gulp.dest(config.dest));
});
