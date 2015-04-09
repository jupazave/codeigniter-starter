var gulp         = require('gulp');
var stylus       = require('gulp-stylus');
var nib          = require('nib');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').styles;
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('styles', ['images'], function() {
  return gulp.src(config.src)
    .pipe(sourcemaps.init())
    .pipe(stylus({
      use: nib(),
      compress: true,
      'include css': true
    }))
    .on('error', handleErrors)
    .pipe(sourcemaps.write())
    .pipe(autoprefixer({ browsers: ['last 2 version'] }))
    .pipe(gulp.dest(config.dest));
});
