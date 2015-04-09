var gulp = require('gulp');
var jade = require('gulp-jade');
var jadePHP = require('gulp-jade-php');
var config = require('../config').templates;
var browserSync = require('browser-sync');
var locals = {};

gulp.task('templates', ['templates:PHP']);

gulp.task('templates:PHP', function() {
  return gulp.src(config.PHP.src)
    .pipe(jadePHP())
    .pipe(gulp.dest(config.PHP.dest))
    .pipe(browserSync.reload({stream:true}));
});
