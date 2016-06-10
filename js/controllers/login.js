var permissionList, permissionList0, permissionList1;
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
    Name: "wait_handle"
}, {
    Name: "pay_att"
}, {
    Name: "select_all"
}, {
    Name: "excutive2"
}, {
    Name: "system_manage"
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
    Name: "wait_handle"
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
}];
permissionList2 = [{
    Name: "case_admin"
}, {
    Name: "case_assign_main"
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
}];
angular.module('starter.controllers.login', ['ui.router'])
    .controller('login', ['$scope', "$http", "permissions", '$state', function(
        $scope, $http, permissions, $state) {
        $scope.submit = function() {
            $http({
                method: 'POST',
                url: 'userServer.php',
                data: {
                    user_name: angular.element("#user").val(),
                    password: angular.element("#pas").val(),
                    action: "login"
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            }).
            success(function(data, status, headers, config) {
                if (data.msg == "success") {
                    // window.location.href = "http://" + window.location.host + "/#/nav/homepage";
                    $state.go('nav.homepage');


                    if (data.auth == "0") {
                        permissionList = permissionList0;
                        console.log(permissionList);
                    } else if (data.auth == "1") {
                        permissionList = permissionList1;
                        console.log(permissionList);
                    } else if (data.auth == "2") {
                        permissionList = permissionList2;
                        console.log(permissionList);
                    }
                    permissions.setPermissions(permissionList);
                }
            }).
            error(function(data, status, headers, config) {});
        }
        $scope.$on('$stateChangeStart', function(evt, next, current) {
            // var permission = next.permission;
            // console.log(permission)
            // console.log(angular.isString(permission))
            // console.log(permissionList)
            // if (!angular.isString(permission) || !permissions.hasPermission(permission))
            //     console.log(22222)
            // $location.path('/login');
        });
    }])
