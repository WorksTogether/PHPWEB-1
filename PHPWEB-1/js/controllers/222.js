angular.module('starter.controllers.222', ['ui.router'])
    .controller('222',['$scope','$timeout','$location','$state',function($scope,$timeout,$location, $state){
        $scope.$on('$stateChangeStart', function(evt, next, current) {
            //alert('route begin change');

        });
        //$state.reload();

    }] )