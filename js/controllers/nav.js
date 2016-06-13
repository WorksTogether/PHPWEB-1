angular.module('starter.controllers.nav', ['ui.router'])
    .controller('nav', ['$scope', '$timeout', '$location', 'permissions', '$http', '$rootScope', function($scope, $timeout, $location, permissions, $http, $rootScope) {
        // if (typeof(permissionList) == "undefined" || permissionList == "") {
        //     alert("请登录！");
        //     $location.path('/login');
        // }
    }])
    // .factory('authrequest', ["$rootScope", function($rootScope) {
    //     var auth = {
    //         request: function(config) {
    //             // $rootScope.permissionList = new Date().getTime();
    //             return config;
    //         },
    //         response: function(response) {
    //             return response;
    //         }
    //     };
    //     return auth;
    // }])
    // .config(['$httpProvider', function($httpProvider) {
    //     $httpProvider.interceptors.push('authrequest');
    // }])
