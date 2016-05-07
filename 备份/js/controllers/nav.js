angular.module('starter.controllers.nav', ['ui.router'])
    .controller('nav',['$scope','$timeout','$location','$state',function($scope,$timeout,$location, $state){
        $scope.$on('$stateChangeStart', function(evt, next, current) {
            //alert('route begin change');

        });
        //$state.reload();

    }] )