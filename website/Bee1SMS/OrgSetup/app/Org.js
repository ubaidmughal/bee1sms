// define application
angular.module("crudApp", [])
.controller("userController", function($scope,$http){
    $scope.users = [];
    $scope.tempUserData = {};
    // function to get records from the database
    $scope.getRecords = function(){
        $http.get('actionOrg.php', {
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
        $http.post("actionOrg.php", data, config).success(function(response){
            if(response.status == 'OK'){
                if(type == 'edit'){
                    $scope.users[$scope.index].id = $scope.tempUserData.id;
                    $scope.users[$scope.index].OrgCode = $scope.tempUserData.OrgCode;
                    $scope.users[$scope.index].OrgName = $scope.tempUserData.OrgName;
                    $scope.users[$scope.index].OrgType = $scope.tempUserData.OrgType;
					$scope.users[$scope.index].Description = $scope.tempUserData.Description;
					$scope.users[$scope.index].Address = $scope.tempUserData.Address;
					$scope.users[$scope.index].City = $scope.tempUserData.City;
					$scope.users[$scope.index].State = $scope.tempUserData.State;
					$scope.users[$scope.index].ZipCode = $scope.tempUserData.ZipCode;
					$scope.users[$scope.index].Phone = $scope.tempUserData.Phone;
					$scope.users[$scope.index].AdminId = $scope.tempUserData.AdminId;
					$scope.users[$scope.index].AdminPwd = $scope.tempUserData.AdminPwd;

                }else{
                    $scope.users.push({
                        id:response.data.id,
                        OrgCode:response.data.OrgCode,
                        OrgName:response.data.OrgName,
                        OrgType:response.data.OrgType,
						Description:response.data.Description,
						Address:response.data.Address,
						City:response.data.City,
						State: response.data.State,
						ZipCode: response.data.ZipCode,
						Phone: response.data.Phone,
						AdminId: response.data.AdminId,
						AdminPwd: response.data.AdminPwd

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
            OrgCode:user.OrgCode,
            OrgName:user.OrgName,
            OrgType:user.OrgType,
			Description:user.Description,
            Address:user.Address,
			City:user.City,
			State: user.State,
			ZipCode: user.ZipCode,
			Phone: user.Phone,
			AdminId: user.AdminId,
			AdminPwd: user.AdminPwd
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
        var conf = confirm('Are you sure to delete the user?');
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
            $http.post("actionOrg.php",data,config).success(function(response){
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