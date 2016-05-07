angular.module('starter', ['ui.router','starter.controllers.credit_case_in','starter.controllers.nav'])
    .config(function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: 'html/login.html',
                controller:''
            })
            .state('nav', {
                url: '/nav',
                templateUrl: 'html/nav.html',
                controller:'nav'
            })
            .state('nav.homepage', {
                url: '/homepage',
                templateUrl: 'html/homepage.html',
                controller:''
            })
            .state('nav.credit_case_in', {
                url: '/credit_case_in',
                templateUrl: 'html/credit_case_in.html',
                controller:'credit_case_in'
            })
            .state('nav.case_assign', {
                url: '/case_assign',
                templateUrl: 'html/case_assign.html',
                controller:''
            })

        $urlRouterProvider.otherwise('login');
    });