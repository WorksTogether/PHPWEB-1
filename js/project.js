angular.module('starter', ['ui.router','starter.controllers.444','starter.controllers.222'])
    .config(function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: 'html/login.html',
                controller:''
            })
            .state('22222', {
                url: '/22222',
                templateUrl: 'html/22222.html',
                controller:'222'
            })
            .state('22222.33333', {
                url: '/33333',
                templateUrl: 'html/33333.html',
                controller:''
            })
            .state('22222.444', {
                url: '/444',
                templateUrl: 'html/444.html',
                controller:'444'
            })

        $urlRouterProvider.otherwise('login');
    });