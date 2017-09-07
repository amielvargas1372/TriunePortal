/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(".sycrqhide").hide();
    $(".syprqhide").hide();
    $(".subjcodecrqhide").hide();
    $(".subjcodeprqhide").hide();    
    $(".coreq").hide();
    $(".prereq").hide();

    $("#hideco").click(function(){
       $(".prereq").toggle();
       $(".coreq").hide();
    });

    $("#hidepre").click(function(){
       $(".coreq").toggle();
       $(".prereq").hide();
    });

//stuff below enables/disables submit button if the values on the select tag are incomplete
    $('#submitreqcrq').attr('disabled', 'disabled');
    $('#submitreqprq').attr('disabled', 'disabled');

    function updateFormEnabledCRQ(){
        if(verifyAdSettingsCRQ()){
            $('#submitreqcrq').removeAttr("disabled");
        }
        else{
            $('#submitreqcrq').attr('disabled', 'disabled');
        }
    }

    function updateFormEnabledPRQ(){
        if(verifyAdSettingsPRQ()){
            $('#submitreqprq').removeAttr("disabled");
        }
        else{
            $('#submitreqprq').attr('disabled', 'disabled');
        }
    }

//since they are in different forms, even if there's a value in one side they cannot pass that value so make 2 AdSettings for each of them
    function verifyAdSettingsCRQ(){
        if($('#coursecrq').val()!=='' && $('#sycrq').val()!=='' && $('#subjcodecrq').val()!=='' && $('#coreq').val()!==''){
            return true;
        }
        else{
            return false;
        }
    }
    
    function verifyAdSettingsPRQ(){
        if($('#courseprq').val()!=='' && $('#syprq').val()!=='' && $('#subjcodeprq').val()!=='' && $('#prereq').val()!==''){
            return true;
        }
        else{
            return false;
        }
    }

    $('#coursecrq').change(updateFormEnabledCRQ);
    $('#sycrq').change(updateFormEnabledCRQ);
    $('#subjcodecrq').change(updateFormEnabledCRQ);
    $('#coreq').change(updateFormEnabledCRQ);
    
    $('#courseprq').change(updateFormEnabledPRQ);
    $('#syprq').change(updateFormEnabledPRQ);
    $('#subjcodeprq').change(updateFormEnabledPRQ);
    $('#prereq').change(updateFormEnabledPRQ);
     
//stuff below hides the SY tag if there is no value on the CourseCode select tag     
    $("#coursecrq").change(function(){
        var value = $("#coursecrq").val();
            if (value != ''){
                $(".sycrqhide").show(200);
                $(".subjcodecrqhide").show(200);
            }else{
                $(".sycrqhide").hide(200);
                $(".subjcodecrqhide").hide(200);
            }
    });

    $("#courseprq").change(function(){
        var value = $("#courseprq").val();
            if (value != ''){
                $(".syprqhide").show(200);
                $(".subjcodeprqhide").show(200);
            }else{
                $(".syprqhide").hide(200);
                $(".subjcodeprqhide").hide(200);
            }
    });

//stuff below populates the SY select tag the moment the CourseCode select tag has a value    
    $("#coursecrq").on('change', function(){
            if(this.value != ""){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "sycurr",
                    data:{course:$(this).val()},
                    success: function(data){
                        console.log(data);
                        $('select#sycrq').html('');
                            for(var i=0; i<data.length;i++){
                                $("<option />").val(data[i].SY).text(data[i].SY).appendTo($('select#sycrq'));
                            }
                    }
                });
            }
    });//trying to put values to a select tag SY based on CourseCode
        $("#coursecrq").on('change', function(){
            if(this.value != ""){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "sbcurr",
                    data:{course:$(this).val()},
                    success: function(data){
                        console.log(data);
                        $('select#subjcodecrq').html('');
                            for(var j=0; j<data.length;j++){
                                $("<option />").val(data[j].SubjCode).text(data[j].SubjCode).appendTo($('select#subjcodecrq'));
                            }
                    }
                });
            }
    });//trying to put values to a select tag SubjCode based on CourseCode

    $("#courseprq").on('change', function(){
            if(this.value != ""){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "sycurr",
                    data:{course:$(this).val()},
                    success: function(data){
                        console.log(data);
                        $('select#syprq').html('');
                            for(var i=0; i<data.length;i++){
                                $("<option />").val(data[i].SY).text(data[i].SY).appendTo($('select#syprq'));
                            }
                    }
                });
            }
    });//trying to put values to a select tag
    
    $("#courseprq").on('change', function(){
            if(this.value != ""){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "sbcurr",
                    data:{course:$(this).val()},
                    success: function(data){
                        console.log(data);
                        $('select#subjcodeprq').html('');
                            for(var j=0; j<data.length;j++){
                                $("<option />").val(data[j].SubjCode).text(data[j].SubjCode).appendTo($('select#subjcodeprq'));
                            }
                    }
                });
            }
    });//trying to put values to a select tag SubjCode based on CourseCode
});//show, hide, disable, and enable submit