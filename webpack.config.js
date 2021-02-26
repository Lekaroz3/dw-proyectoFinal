var Encore = require('@symfony/webpack-encore');

Encore 
        .setOutputPath('public/build/')
        .setManifestKeyPrefix('build')
        .setPublicPath('/build')
        .cleanupOutputBeforeBuild()
        .addEntry('app', './public/assets/js/bootstrap.js')
        .addStyleEntry('global', './public/assets/css/bootstrap.css')
        .enableSassLoader()
        .autoProvidejQuery()
        .enableSourceMaps(!Encore.isProduction())
        .enableSingleRuntimeChunk();

module.exports = Encore.getWebpackConfig();



