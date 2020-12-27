var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    uglify = require("gulp-uglify"),
    concat = require("gulp-concat"),
    clean = require("gulp-clean"),
    browserSync = require('browser-sync').create();


const paths = {
  scripts: {
    frontend: 'src/assets/js/frontend/*.js',
    backend: 'src/assets/js/backend/*.js',
    dest: 'web/app/themes/mats-theme/assets/js/'
  },

  php: {
    src: 'src/**/*.php',
    dest: './web/app/themes/mats-theme',
  },

  styles: {
    src: 'src/assets/sass/main.scss',
    dest: './web/app/themes/mats-theme/assets/css'
  },

  fonts: {
    src: 'src/assets/fonts/**',
    dest: './web/app/themes/mats-theme/assets/fonts'
  },

  dist: 'web/app/themes/mats-theme',
}

function distClean() {
  return gulp.src(paths.dist, {force: true})
      .pipe(clean());
}

function php() {
  return gulp.src(paths.php.src)
      .pipe(gulp.dest(paths.php.dest))
}

function styleCss() {
  return gulp.src('src/style.css')
      .pipe(gulp.dest(paths.dist));
}

function scss() {
  return gulp.src(paths.styles.src)
      .pipe(sass({outputStyle: 'compressed'})
          .on('error', sass.logError))
      .pipe(rename('main.css'))
      .pipe(gulp.dest(paths.styles.dest));
}

function acf() {
  return gulp.src('src/inc/acf/**/*')
      .pipe(gulp.dest('web/app/themes/mats-theme/inc/acf'));
}

function js() {
  return gulp.src(paths.scripts.frontend)
      .pipe(concat('scripts.js'))
      .pipe(uglify())
      .pipe(gulp.dest(paths.scripts.dest));
}

function jsBackend() {
  return gulp.src(paths.scripts.backend)
      .pipe(gulp.dest(paths.scripts.dest));
}

function fonts() {
  return gulp.src(paths.fonts.src)
      .pipe(gulp.dest(paths.fonts.dest));
}

function reload(done) {
  browserSync.reload();
  done();
}

function start(done) {
  browserSync.init({
    proxy: 'localhost',
  });
  done();
}

function watch() {
  gulp.watch(paths.php.src, gulp.series(php, reload));
  gulp.watch(paths.scripts.frontend, gulp.series(js, reload));
  gulp.watch(paths.scripts.backend, gulp.series(jsBackend, reload));
  gulp.watch('src/assets/sass/**/*', gulp.series(scss, reload));
  gulp.watch('src/style.css', gulp.series(styleCss, reload));
}

const build = gulp.series(distClean, php, styleCss, scss, acf, js, jsBackend, fonts, start, watch);

exports.build = build;