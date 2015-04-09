var gulp      = require('gulp');
var config    = require('../config').coffeelint;
var coffeelint = require('gulp-coffeelint');

gulp.task('coffeelint', function() {
  return gulp.src(config.src)
    .pipe(coffeelint())
    .pipe(coffeelint.reporter('default'));
});
