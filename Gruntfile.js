'use strict';

module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    // watch for changes and trigger sass, jshint and livereload
    watch: {
      sass: {
        files: ['assets/scss/**/*.{scss,sass}'],
        tasks: ['sass', 'autoprefixer']
      }
    },

    // sass
    sass: {
      dist: {
        options: {
          style: 'expanded',
          sourcemap: 'none'
        },
        files: {
          'style.compiled.css': 'assets/scss/style.scss'
        }
      }
    },

    // autoprefixer
    autoprefixer: {

      dist: {
        options: {
          browsers: ['last 2 versions', 'ie 8', 'ie 9']
        },          
        files: {
          'style.css': 'style.compiled.css'
        }
      }
    },

    // browserSync
    browserSync: {
      dev: {
        bsFiles: {
          src : ['style.css', 'assets/js/*.js']
        },
        options: {
          proxy: "kouki.dev",
          watchTask: true
        }
      }
    },

    clean: {
      build: ["kouki"],          
    },

    copy: {
      build: {
        expand: true, 
        src: [  '**/*', 
                '!**/node_modules/**', 
                '!**/bower_components/**', 
                '!**/.sass-cache/**', 
                '!**/.git/**', 
                '!**/scss/**', 
                '!Gruntfile.js', 
                '!package.json', 
                '!bower.json', 
                '!style.compiled.css', 
                '!.gitignore',
                '!.DS_store'
        ], 
        dest: 'kouki/'     
      },
    },

  });

  // register task
  grunt.registerTask('default', ['sass', 'autoprefixer']);
  grunt.registerTask('serve', ['sass', 'autoprefixer', 'browserSync', 'watch']);
  grunt.registerTask('build', ['sass', 'autoprefixer', 'clean:build', 'copy:build']);

};
