const gulp = require('gulp');
const {reload} = require('browser-sync');
const notify = require('gulp-notify');
const plumber = require('gulp-plumber');
const sprite = require('gulp-svg-sprite');
const path = require('path');

const config = require('../config');

const svgSpiteConfig = {
/*    shape: {
        spacing: {
            padding: 2,
        },
        dimension: {
            maxWidth: 32,
            maxHeight: 32,
        },
    },*/
    mode: {
        css: {
/*            dimensions: true,
            common: 'icon',
            layout: 'vertical',
            prefix: '.icon-',*/
            bust: false,
            dest: './',
            sprite: 'svg-sprite.svg',
            render: {
                css: true
            }
        },
        symbol: {
            dest: "sprite",
            inline: true,
            sprite: "sprite-symbol.svg.php",
            example: true
        },
        transform: [{
            svgo: {
                plugins: [
                    {removeViewBox: false},
                    {removeUselessStrokeAndFill: false},
                    {cleanupIDs: false},
                    {mergePaths: false},
                    {removeUnknownsAndDefaults: false}
                ]
            }
        }],
        svg: {
            xmlDeclaration: false,
            doctypeDeclaration: false,
            namespaceIDs: false
        },

    },
};

gulp.task('sprite', () =>
    gulp
        .src(path.join(config.root.dev, config.sprite.dev, '*.svg'))
        .pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))
        .pipe(sprite(svgSpiteConfig))
        .pipe(gulp.dest(path.join(config.root.dist, config.sprite.dist)))
        .pipe(reload({stream: true})));
