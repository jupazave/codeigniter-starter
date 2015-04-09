var gulp         = require('gulp');
var revAll       = require('gulp-rev-all');
var revNapkin    = require('gulp-rev-napkin');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').rev;

gulp.task('rev', function() {
  return gulp.src(config.src)
    .pipe(revAll(config.settings))
    .pipe(revNapkin())
    .pipe(gulp.dest(config.dest))
    .pipe(revAll.manifest())
    .pipe(gulp.dest(config.dest));
});
