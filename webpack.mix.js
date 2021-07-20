const mix = require('laravel-mix');

mix.styles([
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/bootstrap-utilities.css',
	'resources/assets/css/style.css',
],'public/styles.css');

mix.scripts([
	'resources/assets/js/bootstrap.bundle.min.js'
], 'public/js/scripts.js');

mix.js([
	'resources/js/bootstrap.js'
], 'public/js/axios.js');
