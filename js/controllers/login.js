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
}];
permissionList = [{
    Name: "case_admin"
}, {
    Name: "case_assign_main"
}, {
    Name: "credit_case_in"
}, {
    Name: "case_assign"
}, {
    Name: "case_close"
}, , {
    Name: "case_tongji"
}, , {
    Name: "case_detail"
}];
angular.module('starter.controllers.login', ['ui.router'])
    .controller('login', ['$scope', "$http", "permissions", function($scope, $http, permissions) {
        $scope.submit = function() {
            $http({
                method: 'GET',
                url: 'userServer.php',
                params: {
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
                    window.location.href = "http://" + window.location.host + "/#/nav/homepage";
                    if (data.auth == "0") {
                        permissionList = permissionList0;
                        console.log(permissionList);
                    } else if (data.auth == "1") {
                        permissionList = permissionList1;
                        console.log(permissionList);
                    }
                    permissions.setPermissions(permissionList);
                }
            }).
            error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }

    }])
