const mix = require("laravel-mix");



mix.config.webpackConfig = {
  output: {
    publicPath: "/vendor/ym-admin/",
  }
};


mix
  .js("./resources/js/app.js", "public")
  .extract(["axios", "vue", "vuex", "vue-router", "element-ui"])
  .setResourceRoot("/vendor/ym-admin")
  .setPublicPath("public")
  .copy("public", "../public/vendor/ym-admin")
  .webpackConfig({
    resolve: {
      alias: {
        "@": path.resolve(__dirname, "resources/js/"),
      },
    },
  })
  .options({
    extractVueStyles: false,
    processCssUrls: false,
  })
  .disableNotifications().version();
