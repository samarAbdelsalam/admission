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