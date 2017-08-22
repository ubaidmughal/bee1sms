// define application


    var dtGroup = [];
    angular.module("crudApp", [])
    .controller("userController", function($scope,$http){
        $scope.users = [];
        $scope.tempUserData = {};
        // function to get records from the database
        $scope.getRecords = function(){
            $http.get('action.php', {
                params:{
                    'type':'view'
                }
            }).success(function(response){
                if(response.status == 'OK'){
                    $scope.users = response.records;
                   
                }
            });
        };
    
        // function to insert or update user data to the database
        $scope.saveUser = function(type){
            var data = $.param({
                'data':$scope.tempUserData,
                'type':type
            });
            var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
            $http.post("action.php", data, config).success(function(response){
                if(response.status == 'OK'){
                    if(type == 'edit'){
                        $scope.users[$scope.index].id = $scope.tempUserData.id;
                        $scope.users[$scope.index].GroupCode = $scope.tempUserData.GroupCode;
                        $scope.users[$scope.index].GroupName = $scope.tempUserData.GroupName;
                        $scope.users[$scope.index].Position = $scope.tempUserData.Position;

                    }else{
                        $scope.users.push({
                            id:response.data.id,
                            GroupCode:response.data.GroupCode,
                            GroupName:response.data.GroupName,
                            Position:response.data.Position

                        });
                    
                    }
                    $scope.userForm.$setPristine();
                    $scope.tempUserData = {};
                    $('.formData').slideUp();
                    $scope.messageSuccess(response.msg);
                }else{
                    $scope.messageError(response.msg);
                }
            });
        };
    
        // function to add user data
        $scope.addUser = function(){
            $scope.saveUser('add');
        };
    
        // function to edit user data
        $scope.editUser = function(user){
            $scope.tempUserData = {
                id:user.id,
                GroupCode:user.GroupCode,
                GroupName:user.GroupName,
                Position:user.Position

            };
            $scope.index = $scope.users.indexOf(user);
            $('.formData').slideDown();
        };
    
        // function to update user data
        $scope.updateUser = function(){
            $scope.saveUser('edit');
        };
    
        // function to delete user data from the database
        $scope.deleteUser = function(user){
            var conf = confirm('Are you sure to delete the Group?');
            if(conf === true){
                var data = $.param({
                    'id': user.id,
                    'type':'delete'    
                });
                var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }    
                };
                $http.post("action.php",data,config).success(function(response){
                    if(response.status == 'OK'){
                        var index = $scope.users.indexOf(user);
                        $scope.users.splice(index,1);
                        $scope.messageSuccess(response.msg);
                    }else{
                        $scope.messageError(response.msg);
                    }
                });
            }
        };
    
        // function to display success message
        $scope.messageSuccess = function(msg){
            $('.alert-success > p').html(msg);
            $('.alert-success').show();
            $('.alert-success').delay(5000).slideUp(function(){
                $('.alert-success > p').html('');
            });
        };
    
        // function to display error message
        $scope.messageError = function(msg){
            $('.alert-danger > p').html(msg);
            $('.alert-danger').show();
            $('.alert-danger').delay(5000).slideUp(function(){
                $('.alert-danger > p').html('');
            });
        };
    });


