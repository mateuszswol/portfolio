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
        },
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: '../web/app/themes/mats-theme/assets/css',
                    src: ['*.css', '!*.min.css'],
                    dest: '../web/app/themes/mats-theme/assets/css',
                    ext: '.min.css'
                }]
            }
        },
        imagemin: {
            dynamic: {
                options: {
                    optimizationLevel: 3,
                },
                files: [{
                    expand: true,
                    cwd: '../web/app/uploads/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: '../web/app/uploads/'
                }]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask('default', ['sass', 'cssmin','imagemin']);
};