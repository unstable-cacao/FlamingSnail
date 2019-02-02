const gulp		= require('gulp');
const uglify	= require('gulp-uglify');
const concat	= require('gulp-concat');

const NamespaceManager = require('oktopost-namespace');


const nm = NamespaceManager.setup(__dirname, function (root)
{
	var a = root.FlamingSnail.Boot;
});

const dependencies = [].concat(
	'node_modules/oktopost-namespace/bin/namespace.web.js',
	nm.dependencies('FlamingSnail.Boot')
);


gulp.task('build', () => 
{
	gulp.src(dependencies)
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest('../Public/resources'));
});