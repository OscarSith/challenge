module.exports = function(grunt) {
	grunt.initConfig({
		requirejs: {
			compile: {
				options: {
					almond: true,
					baseUrl: '.',
					out: "js/app.min.js",
					name: "js/dev/main",
					mainConfigFile: 'js/dev/main.js',
					include: ['node_modules/grunt-contrib-requirejs/node_modules/requirejs/require']
				}
			}
		},
		cssmin: {
			combine: {
				files: {
					'css/main.min.css': [
						'bower_components/bootstrap/dist/css/bootstrap.min.css',
						'css/main.css'
					]
				}
			}
		}
	});

	//grunt.loadNpmTasks('grunt-contrib-requirejs');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('css', ['cssmin']);
};