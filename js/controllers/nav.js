angular.module('starter.controllers.nav', ['ui.router'])
    .controller('nav', ['$scope', '$timeout', '$location', 'permissions', function($scope, $timeout, $location, permissions) {
        $scope.$on('$stateChangeStart', function(evt, next, current) {
            var permission = next.permission;
            console.log(permission)
            console.log(angular.isString(permission))
            if (!angular.isString(permission) || !permissions.hasPermission(permission))
                $location.path('/login');
        });
    }])
