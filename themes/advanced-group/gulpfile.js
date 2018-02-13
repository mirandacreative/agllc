var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    minifyCss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    plumber = require('gulp-plumber'),
    gutil = require( 'gulp-util' ),
    ftp = require( 'vinyl-ftp' ),
    runSequence = require('run-sequence');
    browserSync = require('browser-sync').create();

// styles

gulp.task("css", function() {
  return gulp.src("./css/**/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest("./css"));
})

//gulp.task("minify_css", function(){
//  return gulp.src("./css/**/*.css")
//    .pipe(concat('styles.css'))
//    .pipe(minifyCss())
//    .pipe(sourcemaps.write())
//    .pipe(gulp.dest("./dist"));
//});

// scripts
gulp.task("js", function() {
  return gulp.src("./js/**/*.js")
    .pipe(plumber(function(err) {
      console.log("Scripts Task Error");
      console.log(err);
      this.emit("end");
    }))
    .pipe(gulp.dest("./js"))
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat("scripts.js"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./dist"));
})


gulp.task('watch', function(){
    gulp.watch('./css/**/*.scss', ['css']);
    gulp.watch('./css/**/*.css', ['deploy']);
    //gulp.watch('./css/**/*.scss', ['minify_css']);
    gulp.watch('./js/**/*.js', ['js']);
    gulp.watch('./js/**/*.js', ['deploy']);
    gulp.watch('./**/*.php', ['deploy']);
});

gulp.task('deploy', function() {
  console.log('deploy');
  var conn = ftp.create( {
    host:     'do.ready-for-feedback.com',
    user:     '',
    password: '',
    parallel: 20,
    reload: true,
    log:      gutil.log
  });
  var globs = [
    '*',
    '*.*',
    '*.php',
    '*.css',
    '*.js',
    'dist/**',
    'flexible-blocks/*.php',
    'templates/*.php',
    'js/**/*.js',
    'css/**/*.scss',
    'css/**/*.css',
    'lib/*.php',
    '!.git',
    '!*.json',
    '!*.md',
    '!*.xml',
    '!assets',
    '!node_modules',
    '!node_modules/**',
  ];

  return gulp.src( globs, { base: '.', buffer: false } )
    .pipe( conn.newerOrDifferentSize( '/miranda-creative/advanced-group/wp-content/themes/advanced-group' ) ) // only upload newer files
    .pipe( conn.dest( '/miranda-creative/advanced-group/wp-content/themes/advanced-group' ) );
});


gulp.task('default', function (callback) {
  runSequence(['css', 'js', 'deploy', 'watch'],
    callback
  );

})
