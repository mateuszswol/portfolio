module.exports = function(grunt) {
    grunt.initConfig({
        sass: {
            dist: {
                files: [{
                    expand: true,
                    cwd: '../web/app/themes/mats-theme/assets/scss',
                    src: ['*.scss'],
                    dest: '../web/app/themes/mats-theme/assets/css',
                    ext: '.css'
                }]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.registerTask('default', ['sass']);
};