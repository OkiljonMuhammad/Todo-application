import { src, dest, watch, series } from 'gulp';
const sass = require('gulp-sass')(require('sass'));
import autoprefixer from 'gulp-autoprefixer';
import cssmin from 'gulp-cssmin';
import rename from 'gulp-rename';

function styles() {
  return src('resources/scss/app.scss') 
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cssmin())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('public/css'));
}

function watchFiles() {
  watch('resources/scss/**/*.scss', styles);
}

const _default = series(styles, watchFiles);
export { _default as default };
