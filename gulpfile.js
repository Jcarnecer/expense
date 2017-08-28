const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();

gulp.task('browserSync', function(){
    browserSync.init({
        server: {
            baseDir: ['./dist','./application/assets','./application/views']
        },
    })
});

gulp.task('scss', function() {
    return gulp.src(['./node_modules/bootstrap/scss/**/*','./node_modules/css-reset-and-normalize-sass/scss/**/*'])
        .pipe(gulp.dest('application/assets/scss'))
            .pipe(browserSync.reload({
                stream: true
            }))
});

gulp.task('js', function() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js','node_modules/jquery/dist/jquery.js','node_modules/popper.js/dist/umd/popper.min.js','node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js'])
        .pipe(gulp.dest('application/assets/js'))
            .pipe(browserSync.reload({
                stream: true
            }))
});

gulp.task('sass', function() {
    return gulp.src('application/assets/scss/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('dist/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('default', ['scss','js']);

gulp.task('watch', ['sass','browserSync'], function() {
    gulp.watch('application/assets/scss/**/*.scss', ['sass']);
    gulp.watch('application/views/*.html', browserSync.reload);
    gulp.watch('application/assets/js/**/*.js', browserSync.reload);
    gulp.watch( config.browsersync.watch ).on( 'change', browserSync.reload );
});