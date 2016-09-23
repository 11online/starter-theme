var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require("gulp-ruby-sass");


gulp.task('serve', ['sass'], function() {
    browserSync.init({
        proxy: "scotch.dev"
    });

    gulp.watch("style.sass", ['sass']);
    gulp.watch("./*").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
  return sass('style.sass', {sourcemap: true})
     .on('error', function (err) {
         console.error('Error!', err.message);
     })
     .pipe(sourcemaps.write('./', {
         includeContent: false,
         sourceRoot: './'
     }))
     .pipe(browserSync.stream({match: '*.css'}));
});

gulp.task('default', ['serve']);
