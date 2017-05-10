var app= angular.module('my-app', [] ,function($interpolateProvider) {
    $interpolateProvider.startSymbol('{{');
    $interpolateProvider.endSymbol('}}');

 

}).constant('API', 'http://laravel-angular.dev:8080/');
