/**
 * Created by paulo on 24/02/16.
 */
var app = angular.module('app', ['ui.bootstrap'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
