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
        }
    });
    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    // Default tasks.
    grunt.registerTask('default', ['concat', 'uglify']);
};