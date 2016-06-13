angular.module('starter', ['ui.router', 'starter.controllers.credit_case_in', 'starter.controllers.nav', 'starter.controllers.login'])
    .config(function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: 'html/login.html',
                controller: 'login'
            })
            .state('nav', {
                url: '/nav',
                templateUrl: 'html/nav.html',
                controller: 'nav'
            })
            .state('nav.homepage', {
                url: '/homepage',
                templateUrl: 'html/homepage.html',
                controller: '',
                permission: 'homepage'
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
            }).state('nav.phone_handle', {
                url: '/phone_handle',
                templateUrl: 'html/phone_handle.html',
                controller: '',
                permission: 'phone_handle'
            }).state('nav.visit_handle', {
                url: '/visit_handle',
                templateUrl: 'html/visit_handle.html',
                controller: '',
                permission: 'visit_handle'
            }).state('nav.visit_process', {
                url: '/visit_process',
                templateUrl: 'html/visit_process.html',
                controller: '',
                permission: 'visit_process'
            }).state('nav.handle_statistic', {
                url: '/handle_statistic',
                templateUrl: 'html/handle_statistic.html',
                controller: '',
                permission: 'handle_statistic'
            }).state('nav.visit_statistic', {
                url: '/visit_statistic',
                templateUrl: 'html/visit_statistic.html',
                controller: '',
                permission: 'visit_statistic'
            })
        $urlRouterProvider.otherwise('login');
    })
    // .run(function(permissions) {
    //     permissions.setPermissions(permissionList);
    // })
    .factory('permissions', ['$rootScope', '$http', function($rootScope, $http) {
        var permissionList;
        return {
            setPermissions: function(permissions) {
                console.log(permissions);
                permissionList = permissions;
                $rootScope.$broadcast('permissionsChanged')
            },
            hasPermission: function(permission, auth) {
                permission = permission.trim();
                var permissionList0, permissionList1;
                permissionList0 = [{
                    Name: "case_admin"
                }, {
                    Name: "case_assign_main"
                }, {
                    Name: "credit_case_in"
                }, {
                    Name: "case_assign"
                }, {
                    Name: "case_close"
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
                    Name: "select_all"
                }, {
                    Name: "excutive2"
                }, {
                    Name: "system_manage"
                }, {
                    Name: "handle_statistic"
                }, {
                    Name: "visit_statistic"
                }, {
                    Name: "data_statistic"
                }, {
                    Name: "homepage_region"
                }, {
                    Name: "homepage_salesman"
                }];
                permissionList1 = [{
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
                permissionList2 = [{
                    Name: "case_admin"
                }, {
                    Name: "credit_case_in"
                }, {
                    Name: "case_close"
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
                    Name: "wait_handle"
                }, {
                    Name: "pay_att"
                }, {
                    Name: "wait_handle"
                }, {
                    Name: "phone_handle"
                }, {
                    Name: "wait_visit"
                }, {
                    Name: "visit_process"
                }, {
                    Name: "handle_statistic"
                }, {
                    Name: "visit_statistic"
                }, {
                    Name: "homepage_salesman"
                }];
                if (auth == "0") {
                    permissionList = permissionList0;
                    console.log(permissionList);
                } else if (auth == "1") {
                    permissionList = permissionList1;
                    console.log(permissionList);
                } else if (auth == "2") {
                    permissionList = permissionList2;
                    console.log(permissionList);
                }

                return permissionList.some(function(item) {
                    if (angular.isString(item.Name))
                        return item.Name.trim() === permission
                });
            }
        };
    }])
    .factory('handhttp', function($http, $rootScope, permissions) {
        return {
            authshttp: function(value, element) {
                $http({
                    url: 'server.php?action=authlist',
                    method: 'POST'
                }).success(function(data, header, config, status) {
                    //响应成功
                    if (data.msg == "success") {
                       // alert('test');
                        var hasPermission = permissions.hasPermission(value, data.auth);
                        if (hasPermission) {
                            element.show();
                            console.log("show");
                        } else {
                            element.hide();
                        }
                    }
                    else
                    {
                        window.location.href="index.html";
                    }
                }).error(function(data, header, config, status) {
                    //处理响应失败
                });
            }
        };
    })
    .directive('hasPermission', function(permissions, handhttp) {
        return {
            restrict: 'AE',
            link: function(scope, element, attrs) {
                if (!angular.isString(attrs.hasPermission))
                    throw "hasPermission value must be a string";

                var value = attrs.hasPermission.trim();
                handhttp.authshttp(value, element);

                // function toggleVisibilityBasedOnPermission() {
                //     var hasPermission = permissions.hasPermission(value);
                //     if (hasPermission) {
                //         element.show();
                //         console.log("show");
                //     } else {
                //         element.hide();
                //     }
                // }
                // toggleVisibilityBasedOnPermission();
                scope.$on('permissionsChanged', toggleVisibilityBasedOnPermission);
            }
        };
    });
