function getCities(country_id, cityinputid) {
    if (country_id != "") {

        $.ajax({
            type: "POST",
            //  url: config.base + "index.php/studentapplication/ajaxGetCities",
            url: '/common/getCities',
            data: {countryId: country_id},
            cache: false,
            complete: function (response, status) {
                //  debugger;
                if (status != "error" && status != "timeout") {
                    $('#' + cityinputid).find('option').remove();
                    //$('#' + cityinputid).append(response.responseText);
                    //alert(response.responseText);''
                    res = JSON.parse(response.responseText);

                    for (var i = 0; i < res.cities.length; i++) {
                        //debugger;
                        //$('#' + cityinputid).append("<option value='".res.cities[i].Id."'">+ res.cities[i].Name +"</option>");
                        $('#' + cityinputid).append("<option value=" + res.cities[i].Id + ">" + res.cities[i].Name + "</option>");
                    }
                }
            }
        });
    } else {
        $("#" + cityinputid).find('option').remove().append("<option value=''>Select City</option>");

    }
}

function getDepartments(majorId,selectId){
 
   
    var major_id = majorId;
    $.ajax({
        data:{'major' : majorId},
        type:'post',
        url:'/common/getDepartments',
        success:function(response){
            
            $('#'+selectId).empty();
          //  response = JSON.parse(response);
            var depts = response.departments;
            for(var  i =0 ;i<depts.length ;i++){
                $('#'+selectId).append("<option value="+depts[i].id+">"+depts[i].name+"</option>");
            }
           // $('#'+selectId).multiselect('rebuild');
        }
        
    });
    
}

function getTopics(deptId,selectId){
    
    var deptId = deptId;
    $.ajax({
            data:{'deptId' : deptId},
            type:'post',
            url: '/common/getTopics',
            success: function(response){
                $('#'+selectId).empty();
                var topics = response.topics;
                for(var i=0;i<topics.length;i++){
                    $('#'+selectId).append("<option value="+ topics[i].id+">"+topics[i].name+"</option>");
                }
            }
        });

}


