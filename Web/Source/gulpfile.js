const gulp			= require('gulp');
const uglify		= require('gulp-uglify');
const concat		= require('gulp-concat');
const wrap			= require('gulp-wrap');
const declare		= require('gulp-declare');
const handlebars	= require('gulp-handlebars');

const NamespaceManager = require('oktopost-namespace');


global.die = function()
{
	process.exit();
};

global.dd = function()
{
	console.log(...arguments);
	die();
};

global.echo = function()
{
	console.log(...arguments);
};


const nm = NamespaceManager.setup(__dirname, function (root)
{
	var load = [
		root.FlamingSnail.Globals,
		root.FlamingSnail.Boot
	];
});


const dependencies = (() => 
{
	var Globals = nm.dependencies('FlamingSnail.Globals');
	var Boot = nm.dependencies('FlamingSnail.Boot', true);
	
	Boot.filter((path) => Globals.indexOf(path) !== false);
	
	return [].concat(
		'node_modules/oktopost-namespace/bin/namespace.web.js',
		Globals,
		Boot
	);
})();


gulp.task('templates', () => 
{
	gulp.src('view/*.hbs')
		.pipe(handlebars())
		.pipe(wrap('Handlebars.template(<%= contents %>)'))
		.pipe(declare({
			namespace: 'Views',
			noRedeclare: true,
		}))
		.pipe(concat('templates.js'))
		.pipe(gulp.dest('../Public/resources'));
});


gulp.task('build-libs', () => 
{
	gulp.src('js/Libraries/*.js')
		.pipe(gulp.dest('../Public/resources'));
});


gulp.task('build', ['templates', 'build-libs'], () => 
{
	gulp.src(dependencies)
		.pipe(concat('main.js'))
		.pipe(gulp.dest('../Public/resources'));
});