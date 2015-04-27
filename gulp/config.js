var dest = "./build";
var src = "./src";
var vendorSrc = src + '/vendor';

module.exports = {
  browserSync: {
    server: {
      baseDir: [dest, src]
    },
    files: [dest + "/**", "!" + dest + "/**.map"],
    open: false
  },
  styles: {
    src: src + "/assets/styles/app.styl",
    dest: dest + "/assets/styles"
  },
  bootstrap: {
    src: src + "/assets/styles/bootstrap.scss",
    settings: {
      includePaths: [
        vendorSrc + '/bootstrap/stylesheets'
      ]
    },
    dest: vendorSrc,
  },
  sprites: {
    spriteJPG: {
      src: [src + '/assets/sprites/**/*.{jpg,jpeg}', '!' + src + '/assets/sprites/*.jpg'],
      settings: {
        imgName: 'sprite@2x.jpg',
        imgPath: '../images/sprite.jpg',
        cssName: '_spriteJPG.styl',
        cssFormat: 'stylus',
        cssTemplate: './gulp/tasks/sprites/stylus.template.mustache',
        engine: 'canvassmith',
        cssVarMap: function (sprite) {
          sprite.name = 'jpg-' + sprite.name;
          sprite.retina_image = '../images/sprite@2x.jpg';
        },
        cssOpts: {functions: false}
      },
      dest: src + '/assets/sprites'
    },
    spritePNG: {
      src: [src + '/assets/sprites/**/*.png', '!' + src + '/assets/sprites/*.png'],
      settings: {
        imgName: 'sprite@2x.png',
        imgPath: '../images/sprite.png',
        cssName: '_spritePNG.styl',
        cssTemplate: './gulp/tasks/sprites/stylus.template.mustache',
        engine: 'canvassmith',
        cssVarMap: function (sprite) {
          sprite.name = 'png-' + sprite.name;
          sprite.retina_image = '../images/sprite@2x.png';
        },
        cssOpts: {functions: false}
      },
      dest: src + '/assets/sprites'
    }
  },
  images: {
    src: [src + "/assets/images/**"],
    dest: dest + "/assets/images"
  },
  templates: {
    PHP: {
      src: src + "/application/**/*.php.jade",
      dest: dest + "/application/"
    }
  },
  copy: {
    base: {
      src: [
        src + "/static/**/*.*",
        src + "/static/.htaccess"
      ],
      dest: dest
    },
    application: {
      src: [
        src + "/application/**/*.*",
        "!" + src + "/application/**/*.jade"
      ],
      dest: dest + "/application/"
    },
    fonts: {
      src: src + "/assets/fonts/**/*.*",
      dest: dest + "/assets/fonts/"
    }
  },
  browserify: {
    debug: true,
    bundleConfigs: [
      {
        entries: src + "/assets/scripts/app.coffee",
        dest: dest + "/assets/scripts",
        outputName: "app.js",
        extensions: [".coffee"]
      },
      {
        entries: src + "/assets/scripts/body.coffee",
        dest: dest + "/assets/scripts",
        outputName: "body.js",
        extensions: [".coffee"]
      }
    ]
  },
  concat: {
    headJS: {
      src: [
        vendorSrc + '/modernizr-2.8.3.min.js',
        vendorSrc + '/respond-1.4.2.min.js'
      ],
      name: 'head.js',
      dest: dest + '/assets/scripts/'
    },
    vendorJS: {
      src: [
        vendorSrc + '/jquery-1.11.2.min.js',
        vendorSrc + '/html5shiv.min.js',
        vendorSrc + '/html5shiv-print.min.js',
        vendorSrc + '/picturefill.min.js',
        vendorSrc + '/throttle-debounce.min.js',
        vendorSrc + '/bootstrap/javascripts/bootstrap.js',
        vendorSrc + '/jquery.flexslider-min.js',
        vendorSrc + '/jquery.fancybox.pack.js'
      ],
      name: 'vendor.js',
      dest: dest + '/assets/scripts/'
    },
    vendorCSS: {
      src: [
        vendorSrc + '/bootstrap.css',
        vendorSrc + '/flexslider.css',
        vendorSrc + '/jquery.fancybox.css'
      ],
      name: 'vendor.css',
      dest: dest + '/assets/styles'
    }
  },
  coffeelint: {
    src: src + '/assets/scripts/**/*.coffee'
  },
  production: {
    cssSrc: dest + '/*.css',
    jsSrc: dest + '/*.js',
    dest: dest
  },
  clean: dest,
  rev: {
    src: dest + '/**/*.*',
    settings: {
      ignore: ['.php', '/style.css', '/screenshot.png', '.pot', '.md', '.html', '.ico', '.xml', '.txt', '/apple-touch-icon-precomposed.png']
    },
    dest: dest
  }
};
