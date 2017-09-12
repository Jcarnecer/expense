const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
// const connect = require('gulp-connect-php');

gulp.task('browserSync', function(){
    browserSync.init({
        // server: {
        //     baseDir: ['./assets','./application/**/*.php']
        // },
        proxy: 'localhost/expense/',
        port: 8000,
        serveStatic: ['.', './assets']
    })
});

gulp.task('scss', function() {
    return gulp.src(['node_modules/bootstrap/scss/**/*','node_modules/css-reset-and-normalize-sass/scss/**/*'])
        .pipe(gulp.dest('assets/scss'))
            .pipe(browserSync.reload({
                stream: true
            }))
});

gulp.task('icons', function() {
    return gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest('assets/fonts'))
            .pipe(browserSync.reload({
                stream: true
            }))
});

gulp.task('css', function() {
    return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
        .pipe(gulp.dest('assets/css'))
            .pipe(browserSync.reload({
                stream: true
            }))
});

gulp.task('js', function() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js','node_modules/jquery/dist/jquery.js','node_modules/popper.js/dist/umd/popper.min.js','node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js'])
        .pipe(gulp.dest('assets/js'))
            .pipe(browserSync.reload({
                stream: true
            }))
});

gulp.task('sass', function() {
    return gulp.src('assets/scss/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('default', ['scss','icons','css','js']);

gulp.task('watch', ['sass','browserSync'], function() {
    gulp.watch('assets/scss/**/*.scss', ['sass']);
    gulp.watch('application/views/*.php', browserSync.reload);
    gulp.watch('assets/js/**/*.js', browserSync.reload);
    gulp.watch( config.browsersync.watch ).on( 'change', browserSync.reload );
});