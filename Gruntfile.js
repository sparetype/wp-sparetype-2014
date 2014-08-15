module.exports = function(grunt) {
	
	// Project configuration.
	grunt.initConfig({
	uglify: {
	build: {
	src: 'src/script.js',
	dest: 'build/script.min.js'
	}
	}
	});
	
	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	
	// Default task(s).
	grunt.registerTask('default', ['uglify']);
	
	};