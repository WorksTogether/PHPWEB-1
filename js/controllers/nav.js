angular.module('starter.controllers.nav', ['ui.router'])
    .controller('nav', ['$scope', '$timeout', '$location', 'permissions', function($scope, $timeout, $location, permissions) {
        // if (typeof(permissionList) == "undefined" || permissionList == "") {
        //     alert("请登录！");
        //     $location.path('/login');
        // }
    }])
    .factory('authrequest', ["$rootScope", function($rootScope) {
        var auth = {
            request: function(config) {
                $rootScope.permissionList = [{
                    Name: "case_admin"
                }, {
                    Name: "case_assign"
                }, {
                    Name: "case_close"
                }, {
                    Name: "fen_case_admin"
                }, {
                    Name: "region_case"
                }, {
                    Name: "region_fin"
                }, {
                    Name: "leader_case"
                }, {
                    Name: "leader_fin"
                }, {
                    Name: "case_tongji"
                }, {
                    Name: "case_inprocess"
                }, {
                    Name: "case_fin"
                }, {
                    Name: "case_closed"
                }, {
                    Name: "case_detail"
                }, {
                    Name: "cuishouadmin"
                }, {
                    Name: "cuishou_case_admin"
                }, {
                    Name: "pay_att"
                }, {
                    Name: "leader2"
                }, {
                    Name: "credit_case_in"
                }, {
                    Name: "handle_statistic"
                }, {
                    Name: "visit_statistic"
                }, {
                    Name: "homepage_region"
                }];
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
