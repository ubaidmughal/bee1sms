
    $(document).ready(function()
    {
        $("#FromClass").on('change',function()
        {
            getStudentNames();
        });


        function getStudentNames() {
            var operationFamily = "getnames";
            var FromClass = $('#FromClass').val();
            
            var dataTablestudent = $('#FromClassData').DataTable({


                //"processing": true,
                //"serverSide": true,
                //"order": [],
                "paging": false,
                "ordering": false,
                "bDestroy": true,
                "bFilter": false,
                "ajax": {
                    url: "Actions/actionassignclass.php",
                    type: "POST",
                    data: { FromClass: FromClass, operationFamily: operationFamily }
                },
                "columnDefs": [
                    {
                        "targets": [0],
                        //"orderable": false,
                    },
                ],

            });
           
        }

        getMoveStudent();

        function getMoveStudent() {
            var operationFamily = "fetch";
            var ToClass = $('#ToClass').val();

            var dataTablestudent = $('#ToClassData').DataTable({


                //"processing": true,
                //"serverSide": true,
                //"order": [],
                "paging": false,
                "ordering": false,
                "bDestroy": true,
                "bFilter": false,
                "ajax": {
                    url: "Actions/actionassignclass.php",
                    type: "POST",
                    data: {ToClass:ToClass, operationFamily: operationFamily }
                },
                "columnDefs": [
                    {
                        "targets": [0],
                        //"orderable": false,
                    },
                ],

            });

        }


	    
        $("#selectall").click(function () {
            $('.case').attr('checked', this.checked);
        });

        $(".case").click(function () {

            if ($(".case").length == $(".case:checked").length) {
                $("#selectall").attr("checked", "checked");
            } else {
                $("#selectall").removeAttr("checked");
            }

        });
		

        

        $('#actionAssignClass').click(function () {
            
            var ToClass = $('#ToClass').val();
            if (ToClass != ' - Select - ')
            {
            var GRNO = [];
            var StudentName = [];
            var Class = [];
            var RollNumber = [];
            $('.GRNO').each(function () {
                GRNO.push($(this).val());
            });
            $('.StudentName').each(function () {
                StudentName.push($(this).val());
            });
            $('.Class').each(function () {
                Class.push($('#ToClass').val());
            });
            $('.RollNumber').each(function () {
                RollNumber.push($(this).val());
            });
            $.ajax({
                url: "Actions/actionassignclass.php",
                type: "post",
                data: { GRNO: GRNO, StudentName: StudentName, Class: Class, RollNumber: RollNumber },
                success: function (data) {
                    alert(data);
                    getMoveStudent();
                   
                }
            });
            
            }
            else
            {
                alert('Please Provide Required Fields');
            }
        });

    });
    
