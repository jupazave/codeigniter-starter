var gulp       = require('gulp');
var del        = require('del');
var config     = require('../config').clean;

gulp.task('clean', function(cb) {
  return del(config, cb);
});
