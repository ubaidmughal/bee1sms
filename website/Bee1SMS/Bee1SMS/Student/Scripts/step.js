﻿        $(document).ready(function(){
            
            // Step show event 
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                //alert("You are on step "+stepNumber+" now");
                if(stepPosition === 'first'){
                    $("#prev-btn").addClass('disabled');
                }else if(stepPosition === 'final'){
                    $("#next-btn").addClass('disabled');
                }else{
                    $("#prev-btn").removeClass('disabled');
                    $("#next-btn").removeClass('disabled');
                }
            });
            
            // Toolbar extra buttons
            var btnFinish = $('').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function () { $('#smartwizard').smartWizard("reset"); $('#StudentModal').modal("hide");  });
            
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                selected: 0, 
                theme: 'arrows',
                transitionEffect:'fade',
                showStepURLhash: true,
                toolbarSettings: {toolbarPosition: '',
                    toolbarExtraButtons: [btnFinish, btnCancel]
                }
            });
                                         
            
            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                //$('#smartwizard').smartWizard("reset");
                $('#StudentModal').close();
                
                return true;
            });
            
            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            
            
        });   
