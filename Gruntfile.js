module.exports = function(grunt) {
	
	// Project configuration.
	grunt.initConfig({
	uglify: {
	build: {
	src: 'scripts/responsive-nav.min.js',
	dest: 'sparetype2014/scripts/responsive-nav.min.js'
	}
	}
	});
	
	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	
	// Default task(s).
	grunt.registerTask('default', ['uglify']);
	
	};