module.exports = function(grunt) {
  // Load Grunt tasks declared in the package.json file
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    jshint: {
      files: ['Gruntfile.js', 'src/js/app.js', 'src/js/controllers.js']
    },
    sass: {
      prod: {
        files: {
          'assets/css/style.css' : 'src/sass/style.sass'
        }
      }
    },
    min: {
      prod: {
        files: {
          'assets/js/app.min.js' : ['src/js/*.js']
        }
      }
    },
    cssmin: {
      prod: {
        files: {
          'assets/css/style.min.css' : ['assets/css/style.css'],
        }
      }
    },
    watch: {
      css: {
        files: '**/*.sass',
        tasks: ['sass']
      },
      scripts: {
        files: ['src/js/app.js', 'src/js/controllers.js'],
        tasks: ['jshint']
      }
    },
    processhtml: {
      dev: {
        files: {
          'index.html' : ['src/index.html']
        }
      },
      prod: {
        files: {
          'index.html' : ['src/index.html']
        }
      }
    }
  });

  // Register tasks
  grunt.registerTask('dev', ['sass', 'processhtml:dev']);
  grunt.registerTask('build', ['sass', 'min', 'cssmin', 'processhtml:prod']);
  grunt.registerTask('default', ['watch']);

};
