'use strict';
module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            sass: {
                files: ['scss/*.{scss,sass}'],
                tasks: ['sass', 'autoprefixer']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            },
            images: {
                files: ['images/**/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    sourcemap: false,
                    style: 'expanded',
                },
                files: {
                    'scss/style.css': 'scss/style.scss'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3'],
                map: true
            },
            files: {
                expand: true,
                flatten: true,
                src: 'scss/style.css',
                dest: './'
            },
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'js/*.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            main: {
                options: {
                    // sourceMap: 'assets/scripts/build/main.js.map',
                    // sourceMappingURL: 'main.js.map',
                    // sourceMapPrefix: 2,
                    uglify: true
                    // beautify: true
                },
                files: {
                    'js/main.min.js': [
                        'js/main.js'
                    ]
                }
            }
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true
                },
                files: [{
                    expand: true,
                    cwd: 'images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'images/'
                }]
            }
        }

    });

    // register task
    grunt.registerTask('default', ['sass', 'autoprefixer', 'uglify', 'imagemin', 'watch']);

};