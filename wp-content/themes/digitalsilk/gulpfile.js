require('dotenv').config();

const requireDir = require('require-dir');

requireDir('./assets/tasks', { recurse: true });