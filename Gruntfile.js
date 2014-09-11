module.exports = function(grunt) {
    // Project configuration.
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
            build: {
                options: {
                    style: 'compressed'
                },
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
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    // Default tasks.
    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'autoprefixer']);
};