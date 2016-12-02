var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require("gulp-ruby-sass");
var sourcemaps = require('gulp-sourcemaps');


gulp.task('serve', ['sass'], function() {
    browserSync.init(null, {
        proxy: "scotch.dev",
        ghostMode: {
          clicks: true,
          location: true,
          forms: true,
          scroll: true
        }
    });

    gulp.watch("style.sass", ['sass']);
    gulp.watch("sass-partials/*", ['sass']);
    gulp.watch("./*").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', () =>
    sass('style.sass', {sourcemap: true})
        .on('error', sass.logError)
        // for file sourcemaps
        .pipe(sourcemaps.write('maps'), {
          includeContent: false,
          sourceRoot: 'source'
        })
        .pipe(gulp.dest(''))
);

gulp.task('default', ['serve']);
