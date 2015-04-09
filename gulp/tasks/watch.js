var gulp       = require("gulp");
var config     = require("../config");

gulp.task("watch", ["watchify", "browserSync"], function() {
  gulp.watch(config.styles.src, ["styles"]);
  gulp.watch(config.images.src, ["images"]);
  gulp.watch(config.templates.PHP.src, ["templates:PHP"]);
  gulp.watch(config.coffeelint.src, ['coffeelint']);

  Object.keys(config.copy).forEach(function(key) {
    gulp.watch(config.copy[key].src, ['copy:' + key]);
  });

  Object.keys(config.concat).forEach(function(key) {
    gulp.watch(config.concat[key].src, ['concat:' + key]);
  });
});
