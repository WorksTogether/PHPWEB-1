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
            .state('nav.case_detail', {
                url: '/case_detail',
                templateUrl: 'html/case_detail.html',
                controller:''
            })
            .state('nav.import_account', {
                url: '/import_account',
                templateUrl: 'html/import_account.html',
                controller:''
            })
            .state('nav.import_amount', {
                url: '/import_amount',
                templateUrl: 'html/import_amount.html',
                controller:''
            })
            .state('nav.case_close', {
                url: '/case_close',
                templateUrl: 'html/case_close.html',
                controller:''
            })
            .state('nav.region_case', {
                url: '/region_case',
                templateUrl: 'html/region_case.html',
                controller:''
            })
            .state('nav.region_fin', {
                url: '/region_fin',
                templateUrl: 'html/region_fin.html',
                controller:''
            })

        $urlRouterProvider.otherwise('login');
    });