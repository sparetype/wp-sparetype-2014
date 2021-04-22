module.exports = function(grunt) {
    // Project configuration.
    const sass = require('sass');
	grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            dist: {
                src: ['scripts/*.js' // All JS in the scripts folder
                ],
                dest: 'scripts/production.js',
            }
        },
        uglify: {
            build: {
                src: 'scripts/production.js',
                dest: 'sparetype2014/scripts/production.min.js'
            }
        },
        sass: {
                options: {
                    implementation: sass,
					outputStyle: 'compressed'
                },
                dist: {
					files: {
						'sparetype2014/style.css': 'styles/style.scss'
					}
				}
        },
		autoprefixer: {
            build: {
                src: 'sparetype2014/style.css'
            }
        }
    });
    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-sass');
    // Default tasks.
    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'autoprefixer']);
	grunt.registerTask('css', ['sass', 'autoprefixer']);
};