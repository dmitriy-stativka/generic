**Gulp Webpack Starter** - fast and simple web development toolkit. 
It uses Gulp task runner and Webpack bundler.
The starter perfectly fits building static HTML templates speeding up WordPress theme development.
___

## Features

|Features|Description|
|------------------|-----------|
|CSS| [SASS](http://sass-lang.com/), [Autoprefixer](https://github.com/postcss/autoprefixer), [gulp-purgecss](https://www.npmjs.com/package/gulp-purgecss)|
|JS|[Webpack](https://webpack.js.org/), [Babel](http://babeljs.io/)|
|Live Reload|[BrowserSync](http://www.browsersync.io/), [Webpack Dev Middleware](https://github.com/webpack/webpack-dev-middleware), [Webpack Hot Middleware](https://github.com/glenjamin/webpack-hot-middleware)|
|HTML| [gulp-file-include](https://www.npmjs.com/package/gulp-file-include)|
|Images| [gulp-imagemin](https://www.npmjs.com/package/gulp-imagemin)|
|SVG sprite| [gulp-svg-sprite](https://github.com/jkphl/gulp-svg-sprite)|

## Getting started?

### Recommendations

Make sure you have installed the following: 
* [Node.js](https://nodejs.org/)(**Recommended to use Node.js v10.16.0**)
* [npm](https://www.npmjs.com/) or [yarn](https://yarnpkg.com/en/). 
In this tutorial we use yarn, but you can use npm. 

### 1. Run

```bash
yarn
yarn start
```

### 2. Setup .env

Rename `.env.default` to `.env` 

`cp .env.default .env`

There you can change default folders for your static assets.

Current structure: 
```
[Theme Name]                  
  -- [assets]  
     -- [_src]           // source files
        -- [sass]
        -- [js]
        -- [images]
     -- [_dist]          // compiled files
        -- [css]
        -- [js]
        -- [images]
     -- [fonts]
     -- [tasks]         // gulp tasks
     -- [fonts]         // custom fonts
     -- config.js
     -- webpack.config.js
  -- .env               // paths settings
```

##### Required

Set correct values to `BROWSER_SYNC_TARGET` and `BROWSER_SYNC_PUBLIC_PATH` variables.

- `BROWSER_SYNC_TARGET` - refers to WordPress website installed locally
- `BROWSER_SYNC_PUBLIC_PATH` - refers to the relative pathname of `main.js` in the browser.

##### Not required

All compiled files land to `themes/[theme_folder_name_folder]/assets/_dist`.
Modify `ROOT_DIST` to change the destination.

### 3. Double check if assets attached in `[theme_folder_name]/functions.php` or `[theme_folder_name]/inc/class-assets.php`:

```php
function enqueue_styles()
{
  wp_enqueue_style('custom', get_template_directory_uri() . '/assets/_dist/css/main.css', [], null);
}

add_action('wp_enqueue_scripts', 'enqueue_styles');

function register_scripts()
{
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/_dist/js/main.js', [], null, true);
}

add_action('wp_enqueue_scripts', 'register_scripts');
```

### 4. Run

```bash
cd [theme_folder_name]/[frontend_folder_name]
yarn
yarn start
```

##### Commands

```bash
yarn start // Runs development mode
yarn build // Compiles assets in production mode
```

### 5. Images

All images in the folder `_src/images/` will be optimized. Please do not forget to use this feature for better performance

### 6. SVG Sprite

```
_src/images/svg-icons           // All SVG files in this folder will be generated into a sprite
```

SVG sprite will be added as an inline code at the top of each page.

Please use the following code to use an icon from a sprite:

```
<?php echo get_svg(array('icon' => 'icon_file_name', 'class' => 'icon_name__icon')); ?>
``` 

### 7. JS

Please follow the structure you find in `_src/js/index.js` 

Try to avoid libraries with dependencies if you want to add some 3rd party script 

There are several scripts and libraries included in the theme by default:

#### 7.1 Scroll Animation (AOS)

[AOS animation library](https://michalsnik.github.io/aos/)

Please use this library for adding simple scroll animations to the page elements

#### 7.2 Lazy Load (vanilla-lazyload)

[Lazy Load](https://github.com/verlok/vanilla-lazyload)

In order to make your content be loaded by LazyLoad, you must use some data- attributes instead of the actual attributes.

```
<img 
  alt="A lazy image" 
  class="lazy"
  data-src="lazy.jpg" 
/>
```

#### 7.3 Slider (Swiper)

[Swiper](https://swiperjs.com/)

If there is an image slider, a content slider, or a carousel please use the swiper script you can find `_src/js/components/slider.js`

Please use the following structure to init your slider automatically (no need to write init script by yourself)

``` 
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
```

It is possible to control some options (slides per view, effect, etc) using data- attributes.
TODO: add more details about data- attributes   
  
#### 7.4 Tabs  
  
[a11y-accordion-tabs](https://github.com/matthiasott/a11y-accordion-tabs)

A small script for creating accessible accordion tabs components. (tabs for desktop, accordion for mobiles)  

Please use the following structure and tabs/accordion will be init automatically:

```
<div class="accordion-tabs js-tabs">
        <div class="accordion-tabs__nav">
            <ul role="tablist" class="tabs-list">
                <li role="presentation" class="tabs-list__item">
                    <a href="#section1" role="tab" id="tab1" aria-controls="section1" aria-selected="true" class="tabs-list__link tabs-listtabs-trigger js-tabs-trigger">Section 1</a>
                </li>
                <li role="presentation" class="tabs-list__item">
                    <a href="#section2" role="tab" id="tab2" aria-controls="section2" class="tabs-list__link tabs-trigger js-tabs-trigger">Section 2</a>
                </li>
                <li role="presentation" class="tabs-list__item">
                    <a href="#section3" role="tab" id="tab3" aria-controls="section3" class="tabs-list__link tabs-trigger js-tabs-trigger">Section 3</a>
                </li>
            </ul>
        </div>

        <div class="accordion-tabs__content">
            <section id="section1" role="tabpanel" aria-labelledby="tab1" class="tabs-panel js-tabs-panel" tabindex="0">
                <div class="accordion-trigger js-accordion-trigger" aria-controls="section1" aria-expanded="true" tabindex="0">Section 1</div>
                <div class="content" aria-hidden="false">
                    abc
                </div>
            </section>
            <section id="section2" role="tabpanel" aria-labelledby="tab2" class="tabs-panel js-tabs-panel">
                <div class="accordion-trigger js-accordion-trigger" aria-controls="section2" aria-expanded="false" tabindex="0">Section 2</div>
                <div class="content" aria-hidden="true">
                    def
                </div>
            </section>
            <section id="section3" role="tabpanel" aria-labelledby="tab3" class="tabs-panel js-tabs-panel">
                <div class="accordion-trigger js-accordion-trigger" aria-controls="section3" aria-expanded="false" tabindex="0">Section 3</div>
                <div class="content" aria-hidden="true">
                    def2
                </div>
            </section>
        </div>
    </div>
```


### License

Based on [gulp-webpack-starter](https://github.com/wwwebman/gulp-webpack-starter), modified by DigitalSilk dev team
MIT License
