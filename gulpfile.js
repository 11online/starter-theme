var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require("gulp-ruby-sass");
var sourcemaps  = require('gulp-sourcemaps');
var rsync       = require('gulp-rsync');


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

gulp.task('deploy', ['sass'], function() {
  gulp.src('*')
    .pipe(rsync({
      root: '',
      hostname: '', // domain name
      username: 'root',
      destination: '', // path on server
      archive: true,
      silent: false,
      compress: true,
      verbose: true,
    }));
});

gulp.task('default', ['serve']);
