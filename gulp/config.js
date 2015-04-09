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
    src: src + "/assets/styles/*.styl",
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
  images: {
    src: src + "/assets/images/**",
    dest: dest + "/assets/images"
  },
  templates: {
    PHP: {
      src: src + "/application/views/**/*.php.jade",
      dest: dest + "/application/views/"
    },
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
        vendorSrc + '/jquery-1.11.2.min.js'
      ],
      name: 'vendor.js',
      dest: dest + '/assets/scripts/'
    },
    vendorCSS: {
      src: [
        vendorSrc + '/bootstrap.css'
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
