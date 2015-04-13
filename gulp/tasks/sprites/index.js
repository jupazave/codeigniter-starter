var gulp = require('gulp');
var spritesmith = require('gulp.spritesmith');
var handleErrors = require('../../util/handleErrors');
var config       = require('../../config').sprites;

var spriteThis = function(bundleConfig) {
  return function() {
    return gulp.src(bundleConfig.src)
    .pipe(spritesmith(bundleConfig.settings))
    .on('error', handleErrors)
    .pipe(gulp.dest(bundleConfig.dest));
  };
};

Object.keys(config).forEach(function(key) {
  gulp.task('sprites:' + key, spriteThis(config[key]));
});

gulp.task('sprites', Object.keys(config).map(function(key) { return 'sprites:' + key }));
