module.exports = function(grunt) {

    grunt.initConfig({
        bower: grunt.file.readJSON('bower.json'),
        clean: {
            dist: ['gruntBuild/dist/*'],
            html: ['gruntBuild/html/*.html'],
            tmp : ['.tmp','**/.DS_store']
        },
        copy: {
            dist: {
                files: [
                    /*{expand: true, cwd: 'angular/', src: '**', dest: 'dist/angular/'},*/
                    //{expand: true, cwd: 'html/', src: '**', dest: 'dist/html/'},
                    //{expand: true, cwd: 'assets/', src: ['**', '!**/scss/**'], dest: 'dist/assets/'},
                    //{expand: true, cwd: 'gruntBuild/libs/', src: '**', dest: 'gruntBuild/dist/libs/'},
                    //{src: 'index.html', dest: 'dist/index.html'}
                ]
            },
            js: {
                files: [
                    //{src: 'dist/scripts/app.angular.js', dest : 'dist/angular/scripts/app.angular.js'},
                    {src: 'dist/scripts/app.bundle.js', dest : 'public/js/app.bundle.js'}
                ]
            },
            libs:{
                files: '<%= bower.copy %>'
            }
        },
        htmlmin: {
            dist: {
                options: { removeComments: true, collapseWhitespace: true },
                files: [
                    { expand: true, cwd: 'views/', src: ['*.html', '**/*.html'], dest: 'dist/views/' }
                ]
            }
        },
/*        watch: {
            sass: {
                files: ['assets/scss/!*.scss'],
                tasks: ['sass'],
            }
        },
        sass: {
            dist: {
                files: [
                    {'assets/styles/app.css': ['assets/scss/app.scss']},
                    {'assets/styles/app.rtl.css': ['assets/scss/app.rtl.scss']},
                    {'assets/bootstrap-rtl/dist/bootstrap-rtl.css': ['assets/bootstrap-rtl/scss/bootstrap-rtl.scss']}
                ]
            }
        },*/
        // 아래 해당하는 파일또는 폴더에 들어가는 모든 js를 컴파일함
        <!-- build:js scripts/app.html.js -->
        <!-- endbuild -->
        // 로 끝나는 모든 js포함함
        useminPrepare: {
            html: ['gruntBuild/ehr.html']
        },
        usemin: {
            html: ['dist/html/ehr.html']
        },
        bump: {
            options: {
                files: ['package.json'],
                commit: true,
                commitMessage: 'Release v%VERSION%',
                commitFiles: ['-a'],
                createTag: true,
                tagName: 'v%VERSION%',
                tagMessage: 'Version %VERSION%',
                push: true,
                pushTo: 'origin',
                gitDescribeOptions: '--tags --always --abbrev=1 --dirty=-d'
            }
        }
    });

    grunt.loadNpmTasks('grunt-usemin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-bump');
    grunt.loadNpmTasks('grunt-assemble');

    grunt.registerTask('build', [
        'clean:dist',
        'copy',
        //'sass',
        'useminPrepare',
        'concat:generated',
        //'cssmin:generated',
        'uglify:generated',
        'usemin',
        //'htmlmin',
        'clean:tmp',
        'copy:js'
    ]);

    grunt.registerTask('release', [
        'bump'
    ]);

    grunt.registerTask('html', [
        'clean:html',
        'assemble'
    ]);
};
