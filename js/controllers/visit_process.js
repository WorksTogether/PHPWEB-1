angular.module('starter.controllers.visit_process', ['angularFileUpload', 'ui.router'])
    .controller('visit_process', ['$scope', '$location', 'FileUploader', '$state', '$http', function($scope, $location, FileUploader, $state, $http) {
        $scope.$on('$stateChangeSuccess', function(evt, next, current) {});
        var uploader1 = $scope.uploader1 = new FileUploader({
            url: 'server.php?action=uploadpic' + "&" + "sel=" + localStorage.getItem("sel"),
            autoUpload: true,
            removeAfterUpload: true,
            queueLimit: 20,
            // formData: {
            //     sels: localStorage.getItem("sel")
            // }
        });
        uploader1.onBeforeUploadItem = function(fileItem) {};
        uploader1.onAfterAddingFile = function(fileItem) {
            console.info('onAfterAddingFile', fileItem);
            // if (fileItem.file.name.indexOf("xls") != -1) {
            //     angular.element(".showFileName").html(fileItem.file.name);
            // } else {
            //     angular.element(".showFileName").html("");
            //     angular.element(this).data("upload1", false);
            //     return false;
            // }
            console.log(angular.element(".showFileName1").html());
            if (angular.element(".showFileName1").html().indexOf("未选择文件") > -1) {
                angular.element(".showFileName1").html("");
            }
            angular.element(".showFileName1").append(fileItem.file.name);
        };
        uploader1.onSuccessItem = function(fileItem, response, status, headers) {
            console.log(response)
            angular.element("#upload_file1").data("upload1", true);
        };
        uploader1.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };
        var uploader2 = $scope.uploader2 = new FileUploader({
            url: 'server.php?action=uploadvideo' + "&" + "sel=" + localStorage.getItem("sel"),
            autoUpload: true,
            removeAfterUpload: true,
            queueLimit: 20
        });
        uploader2.onBeforeUploadItem = function(fileItem) {};
        uploader2.onAfterAddingFile = function(fileItem) {
            console.info('onAfterAddingFile', fileItem);
            // if (fileItem.file.name.indexOf("xls") != -1) {
            //     angular.element(".showFileName").html(fileItem.file.name);
            // } else {
            //     angular.element(".showFileName").html("");
            //     angular.element(this).data("upload1", false);
            //     return false;
            // }
            if (angular.element(".showFileName2").html().indexOf("未选择文件") > -1) {
                angular.element(".showFileName2").html("");
            }
            angular.element(".showFileName2").append(fileItem.file.name);
        };
        uploader2.onSuccessItem = function(fileItem, response, status, headers) {
            console.log(response)
            angular.element("#upload_file2").data("upload1", true);
        };
        uploader2.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };
    }])
