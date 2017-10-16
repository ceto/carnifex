var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

gulp.task('sass', function () {
    return gulp.src('./scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
        errLogToConsole: true,
        outputStyle: 'compressed'
    }))
    .pipe(autoprefixer(
        {browsers: ['last 2 versions', '> 5%', 'Firefox ESR']}
    ))
    .pipe(sourcemaps.write('.', {
        sourceRoot: 'scss/'
    }))
    .pipe(gulp.dest('.'))
    .pipe(browserSync.stream());
});

// Watch files for change and set Browser Sync
gulp.task('watch', function() {
    // BrowserSync settings
    browserSync.init({
    proxy: "carnifex.dev",
    files: "style.css"
});

// Scss file watcher
gulp.watch('./scss/**/*.scss', ['sass'])
    .on('change', function(event){
        console.log('File' + event.path + ' was ' + event.type + ', running tasks...')
    });
});

// Default task
gulp.task('default', ['sass', 'watch']);
