var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var del = require('del');
var less = require('gulp-less');
var runSequence = require('run-sequence');
var buffer = require('vinyl-buffer');
var csso = require('gulp-csso');
var merge = require('merge-stream');
var shell = require('gulp-shell')
var less = require('gulp-less');
var path = require('path');
var cleanCSS = require('gulp-clean-css');
var kss = require('kss');

var gulpif = require('gulp-if');
var paths = {
  styleGuide: {
    source: [
      'css'
    ],
    destination: 'styleguide',
    css: [
      'http://glorri-az.dev/assets/css/design.css',
    ],
    js: [
		 'javascripts/used/*'
    ],

    homepage: 'homepage.md',
    title: 'glorri.az'
  },
    js: [
		 'javascripts/used/*'
    ],
    images: [
		 './images/img/*',
		 './images/pico/*',
		 './images/img/**/*',
    ],
    less: [
		 './css/**/*'
    ],
	fonts:[
		'./fonts/**/*'
	]
};

// Not all tasks need to use streams
// A gulpfile is just another node program and you can use any package available on npm
gulp.task('clean', function() {
  // You can use multiple globbing patterns as you would with `gulp.src`
  return del(['build']);
});

gulp.task('sprites', shell.task([
  'glue ./images/pico/ ./images/img --margin=10 --less=./css/utilities/ --less-template=./images/sprites/template.jinja --namespace= --sprite-namespace= -f'
]));

gulp.task('styleguide', function(cb) {
  kss(paths.styleGuide, cb);
});
gulp.task('js', function () {
   gulp.src([
        'javascripts/used/*'
   	  ])
	  .pipe(concat('design.js'))
      //.pipe(uglify())
      .pipe(gulp.dest('../wwwroot/assets/js/')) // It will create folder client.min.js
});


gulp.task('less', function () {
  return gulp.src('./css/design.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
	.pipe(cleanCSS({debug: true}, function(details) {
		console.log(details.name + ': ' + details.stats.originalSize);
		console.log(details.name + ': ' + details.stats.minifiedSize);
	}))
    //.pipe(csso())
    .pipe(gulp.dest('../wwwroot/assets/css'));
});

// Copy all static images
gulp.task('images', ['clean'], function() {
  return gulp.src('./images/img/**/*')
    // Pass in options to the task
    //.pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('../wwwroot/assets/images/'));
});
// Copy all static fonts
gulp.task('fonts', ['clean'], function() {
  return gulp.src('./fonts/**/*')
    // Pass in options to the task
    //.pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('../wwwroot/assets/fonts/'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(paths.images, ['sprites','images']);
  gulp.watch(paths.js, ['js']);
  gulp.watch(paths.less, ['less','styleguide']);
  gulp.watch(paths.fonts, ['fonts',]);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', function(){
  runSequence( 'sprites', 'less','images','js','styleguide', function() {
      console.log('Run something else');
  });
});
