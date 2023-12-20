import gulp from 'gulp';

import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import {deleteAsync} from 'del';
import cleanCss from 'gulp-clean-css';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import gulpif from 'gulp-if';
import browserSync from 'browser-sync';


let isDesarrollo = true;


//estilos en scss
gulp.task('styles-scss', () => {
    return gulp.src('assets/scss/**/*.scss')
        .pipe(gulpif(isDesarrollo, sourcemaps.init())) // conditional
        .pipe(sass().on('error', sass.logError))
        .pipe(sass({errLogToConsole: true}))
        .pipe(gulpif(isDesarrollo, sourcemaps.write())) // conditional
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
});

//limpio el codigo css
gulp.task('clean-scss', () => {
    return deleteAsync([
        'assets/css/*.css',
    ]);
});

//minifico el main.ss
gulp.task('minify-css', () => {
    return gulp.src('assets/css/main.css')
      .pipe(cleanCss())
      .pipe(rename("main.min.css"))      
      .pipe(gulp.dest('assets/css'))
      .pipe(browserSync.stream());
  });


gulp.task('watch', function() {
    gulp.watch('assets/scss/**/*.scss', gulp.series('scss'));   
});

gulp.task('scss', gulp.series(['clean-scss','styles-scss','minify-css']));

gulp.task('serve',  function() {
    browserSync.init({
        logLevel: "info",
        browser: ["chrome"],
        proxy: "localhost:80",
        startPath: "/DIW/proyecto"
    });

    gulp.watch('assets/scss/**/*.scss', gulp.series('scss'));
});








gulp.task('default', gulp.series('scss', 'minify-css'));	
