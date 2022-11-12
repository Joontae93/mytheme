/**
 * External Dependencies
 */
const path = require('path');

/**
 * WordPress Dependencies
 */
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

module.exports = {
	...defaultConfig,
	...{
		entry: {
			singles: path.resolve(process.cwd(), 'src/singles', 'post.js'),
			// 'post-styles': path.resolve(process.cwd(), './sass/pages/posts.scss'),
			global: path.resolve(process.cwd(), 'src', 'index.js'),
		},
	},
};
