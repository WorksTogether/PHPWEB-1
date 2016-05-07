angular.module('starter.controllers.credit_case_in', ['angularFileUpload','ui.router'])
    .controller('credit_case_in',['$scope','$location','FileUploader','$state','$http',function($scope,$location
    ,FileUploader,$state,$http){
        $scope.$on('$stateChangeSuccess', function(evt, next, current) {

            //alert('route begin change');
        });
        var uploader = $scope.uploader = new FileUploader({
            url: './server.php?action=uploadfile',
            //removeAfterUpload:true,
            autoUpload:true
        });
        uploader.onBeforeUploadItem = function(fileItem) {
            //console.info("导入文件前",angular.element("#upload_file1").data("upload1"));
            //console.info("导入文件前",typeof angular.element("#upload_file1").data("upload1"));
        };
        uploader.onAfterAddingFile = function(fileItem) {
            console.info('onAfterAddingFile', fileItem);
            //console.info("uploadafter",uploader.removeAfterUpload);
        };
        uploader.onSuccessItem = function(fileItem, response, status, headers) {
            //console.info('onSuccessItem', fileItem, response, status, headers);
            //jQuery("#list1").jqGrid('setGridParam', {}).trigger('reloadGrid');
            console.log(response)
            angular.element("#upload_file1").data("upload1",true);
            //console.info("导入文件后",angular.element("#upload_file1").data("upload1"));
            //console.info("导入文件后",typeof angular.element("#upload_file1").data("upload1"));

        };
        //uploader.onCompleteItem = function(item, response, status, headers){
        //    console.log(response,status)
        //}
        uploader.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };
        $scope.getFormStatus = function(){
            console.log($scope.form2);
        };
        var validate_check = function(){
            if (angular.element("#bank_name").val() == "") {
                angular.element("#bank_name").css("border","none");
                angular.element("#bank_name").focus().css({
                    border: "1px solid red",
                    boxShadow: "0 0 5px red"
                });
                angular.element("#bank_name").addClass("validate_border");
                return false;
            }
            else
            {
                angular.element("#bank_name").css({border:"1px solid #198BD4",boxShadow: "0 0 2px #198BD4"});
                if( angular.element("#bank_name").hasClass("validate_border"))
                {
                    angular.element("#bank_name").removeClass("validate_border");
                }
            }
            if (angular.element("#batch_number2").val() == "") {
                angular.element("#batch_number2").css("border","none");
                angular.element("#batch_number2").focus().css({
                    border: "1px solid red",
                    boxShadow: "0 0 5px red"
                });
                angular.element("#batch_number2").addClass("validate_border");
                return false;
            }
            else
            {
                angular.element("#batch_number2").css({border:"1px solid #198BD4",boxShadow: "0 0 2px #198BD4"});
                if( angular.element("#batch_number2").hasClass("validate_border"))
                {
                    angular.element("#batch_number2").removeClass("validate_border");
                }
            }
            if(!angular.element("#upload_file1").data("upload1"))
            {
                alert("请选择导入文件！");
                return false;
            }
            else
            {
                angular.element("#upload_file1").data("upload1",false);
            }
            return true;
        };
        //$scope.request_file = function($http){
        //    var url = "server.php?action=request_file";
        //    if(validate_check())
        //    {
        //        $http.get(url).success( function(response) {
        //            $scope.students = response;
        //        });
        //    }
        //}
    }] )