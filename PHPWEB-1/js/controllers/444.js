angular.module('starter.controllers.444', ['angularFileUpload','ui.router'])
    .controller('444',['$scope','$timeout','$location','FileUploader','$state',function($scope,$timeout,$location
    ,FileUploader,$state){
        $scope.$on('$stateChangeSuccess', function(evt, next, current) {
            //alert('route begin change');
        });
        var uploader = $scope.uploader = new FileUploader({
            url: './upload.php'
        });
        uploader.onAfterAddingFile = function(fileItem) {
            console.info('onAfterAddingFile', fileItem);
        };
        uploader.onSuccessItem = function(fileItem, response, status, headers) {
            console.info('onSuccessItem', fileItem, response, status, headers);
            jQuery("#list1").jqGrid('setGridParam', {}).trigger('reloadGrid');
        };
        uploader.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };
    }] )