angular.module('starter.controllers.nav', ['ui.router'])
    .controller('nav', ['$scope', '$timeout', '$location', 'permissions', '$http', '$rootScope', function($scope, $timeout, $location, permissions, $http, $rootScope) {
        // if (typeof(permissionList) == "undefined" || permissionList == "") {
        //     alert("请登录！");
        //     $location.path('/login');
        // }
        $http({
            url: 'server.php?action=authlist',
            method: 'POST'
        }).success(function(data, header, config, status) {
            //响应成功
            // $rootScope.permissionList = [{
            //     Name: "case_admin"
            // }, {
            //     Name: "case_assign"
            // }, {
            //     Name: "case_close"
            // }, {
            //     Name: "fen_case_admin"
            // }, {
            //     Name: "region_case"
            // }, {
            //     Name: "region_fin"
            // }, {
            //     Name: "leader_case"
            // }, {
            //     Name: "leader_fin"
            // }, {
            //     Name: "case_tongji"
            // }, {
            //     Name: "case_inprocess"
            // }, {
            //     Name: "case_fin"
            // }, {
            //     Name: "case_closed"
            // }, {
            //     Name: "case_detail"
            // }, {
            //     Name: "cuishouadmin"
            // }, {
            //     Name: "cuishou_case_admin"
            // }, {
            //     Name: "pay_att"
            // }, {
            //     Name: "leader2"
            // }, {
            //     Name: "credit_case_in"
            // }, {
            //     Name: "handle_statistic"
            // }, {
            //     Name: "visit_statistic"
            // }, {
            //     Name: "homepage_region"
            // }];
            permissions.setPermissions($rootScope.permissionList);
            console.log($rootScope.permissionList);

        }).error(function(data, header, config, status) {
            //处理响应失败
        });
    }])
    .factory('authrequest', ["$rootScope", function($rootScope) {
        var auth = {
            request: function(config) {
                // $rootScope.permissionList = new Date().getTime();
                return config;
            },
            response: function(response) {
                return response;
            }
        };
        return auth;
    }])
    .config(['$httpProvider', function($httpProvider) {
        $httpProvider.interceptors.push('authrequest');
    }])
