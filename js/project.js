angular.module('starter', ['ui.router', 'starter.controllers.credit_case_in', 'starter.controllers.nav'])
    .config(function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: 'html/login.html',
                controller: ''
            })
            .state('nav', {
                url: '/nav',
                templateUrl: 'html/nav.html',
                controller: 'nav'
            })
            .state('nav.homepage', {
                url: '/homepage',
                templateUrl: 'html/homepage.html',
                controller: ''
            })
            .state('nav.credit_case_in', {
                url: '/credit_case_in',
                templateUrl: 'html/credit_case_in.html',
                controller: 'credit_case_in',
                permission: 'credit_case_in'
            })
            .state('nav.case_assign', {
                url: '/case_assign',
                templateUrl: 'html/case_assign.html',
                controller: '',
                permission: 'case_assign'
            })
            .state('nav.case_detail', {
                url: '/case_detail',
                templateUrl: 'html/case_detail.html',
                controller: '',
                permission: 'case_detail'
            })
            .state('nav.import_account', {
                url: '/import_account',
                templateUrl: 'html/import_account.html',
                controller: '',
                permission: 'import_account'
            })
            .state('nav.import_amount', {
                url: '/import_amount',
                templateUrl: 'html/import_amount.html',
                controller: '',
                permission: 'import_amount'
            })
            .state('nav.case_close', {
                url: '/case_close',
                templateUrl: 'html/case_close.html',
                controller: '',
                permission: 'case_close'
            })
            .state('nav.region_case', {
                url: '/region_case',
                templateUrl: 'html/region_case.html',
                controller: '',
                permission: 'region_case'
            })
            .state('nav.region_fin', {
                url: '/region_fin',
                templateUrl: 'html/region_fin.html',
                controller: '',
                permission: 'region_fin'
            })
            .state('nav.case_inprocess', {
                url: '/case_inprocess',
                templateUrl: 'html/case_inprocess.html',
                controller: '',
                permission: 'case_inprocess'
            })
            .state('nav.case_fin', {
                url: '/case_fin',
                templateUrl: 'html/case_fin.html',
                controller: '',
                permission: 'case_fin'
            })
            .state('nav.case_closed', {
                url: '/case_closed',
                templateUrl: 'html/case_closed.html',
                controller: '',
                permission: 'case_closed'
            })
            .state('nav.leader_fin', {
                url: '/leader_fin',
                templateUrl: 'html/leader_fin.html',
                controller: '',
                permission: 'leader_fin'
            })
            .state('nav.leader_case', {
                url: '/leader_case',
                templateUrl: 'html/leader_case.html',
                controller: '',
                permission: 'leader_case'
            })
            .state('nav.wait_handle', {
                url: '/wait_handle',
                templateUrl: 'html/wait_handle.html',
                controller: '',
                permission: 'wait_handle'
            })
            .state('nav.pay_att', {
                url: '/pay_att',
                templateUrl: 'html/pay_att.html',
                controller: '',
                permission: 'pay_att'
            })
            .state('nav.user_manage', {
                url: '/user_manage',
                templateUrl: 'html/user_manage.html',
                controller: '',
                permission: 'user_manage'
            })
        $urlRouterProvider.otherwise('login');
    })
    .run(function(permissions) {
        permissions.setPermissions(permissionList);
    })
    .factory('permissions', function($rootScope) {
        var permissionList;
        return {
            setPermissions: function(permissions) {
                permissionList = permissions;
                $rootScope.$broadcast('permissionsChanged')
            },
            hasPermission: function(permission) {
                permission = permission.trim();
                return permissionList.some(function(item) {
                    if (angular.isString(item.Name))
                        return item.Name.trim() === permission
                });
            }
        };
    })
    .directive('hasPermission', function(permissions) {
        return {
            restrict: 'AE',
            link: function(scope, element, attrs) {
                if (!angular.isString(attrs.hasPermission))
                    throw "hasPermission value must be a string";

                var value = attrs.hasPermission.trim();

                function toggleVisibilityBasedOnPermission() {
                    var hasPermission = permissions.hasPermission(value);
                    if (hasPermission) {
                        element.show();
                        console.log("show");
                    } else {
                        element.hide();
                    }
                }
                toggleVisibilityBasedOnPermission();
                scope.$on('permissionsChanged', toggleVisibilityBasedOnPermission);
            }
        };
    });
