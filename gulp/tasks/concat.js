var gulp         = require('gulp');
var browserSync  = require('browser-sync');
var concat       = require('gulp-concat');
var sourcemaps   = require('gulp-sourcemaps');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').concat;

var concatThis = function(bundleConfig) {
  return function() {
    return gulp.src(bundleConfig.src)
      .pipe(concat(bundleConfig.name))
      .on('error', handleErrors)
      .pipe(gulp.dest(bundleConfig.dest))
      .pipe(browserSync.reload({stream:true}));
  };
};

Object.keys(config).forEach(function(key) {
  gulp.task('concat:' + key, concatThis(config[key]));
});

gulp.task('concat', Object.keys(config).map(function(key) { return 'concat:' + key }));
