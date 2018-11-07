const gulp		= require('gulp');
const uglify	= require('gulp-uglify');
const concat	= require('gulp-concat');

const NamespaceManager = require('oktopost-namespace');


function getDependencies()
{
	const nm = NamespaceManager.setup(__dirname, function (root)
	{
		var a = root.FlamingSnail.Boot;
	});
	
	return nm.dependencies('FlamingSnail.Boot');
}


getDependencies();


gulp.task('build', () => 
{
	gulp.src(getDependencies())
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./Public/resources/main.js'));
});