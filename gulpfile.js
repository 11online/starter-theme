var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require("gulp-ruby-sass");
var sourcemaps  = require('gulp-sourcemaps');
var rsync       = require('gulp-rsync');
var config      = require('./config.json');


gulp.task('serve', ['sass'], function() {
    browserSync.init(null, {
        proxy: config.proxy,
        ghostMode: {
          clicks: true,
          location: true,
          forms: true,
          scroll: true,
        }
    });

    gulp.watch("style.sass", ['sass']);
    gulp.watch("sass-partials/*", ['sass']);
    gulp.watch("./*").on('change', browserSync.reload);
});

gulp.task('watch', ['sass'], function() {
    gulp.watch("style.sass", ['sass']);
    gulp.watch("sass-partials/*", ['sass']);
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
  return gulp.src('*')
    .pipe(rsync({
      root: '',
      hostname: config.hostname,
      username: 'serverpilot',
      destination: config.destination,
      silent: false,
      compress: true,
      incremental: true,
      emptyDirectories: true,
      recursive: true,
      exclude: ['node_modules', '.sass-cache', 'maps', 'sass-partials', 'config.json', 'gulpfile.js', 'package.json', 'style.sass']
    }));
});

gulp.task('default', ['serve']);
