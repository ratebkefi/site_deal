/**
 * Created by G50 on 20/07/2015.
 */
var options={
    yaxis:
    {
        tickDecimals: 0
    }
};
$(function () {
    $.ajaxSetup({async: false});
    loadredactdeal()
    loadRemboursements2Chart()
    loadRemboursements1Chart()
    loadRemboursements3Chart()


})
function loadredactdeal(){
    region=$('#idregion').val();
    categorie=$('#idcategorie').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx4,
        data: "dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){

            $('.redText ').html(msg+" <span class='greyText'>Deal en attente de rédation</span>");

        }
    });
}

function loadRemboursements1Chart()
{
    region=$('#idregion').val();
    categorie=$('#idcategorie').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var headhtml="<th width='5%'></th></th><th nowrap='nowrap' data-placeholder='rechercher un rédacteur'>Deals</th><th data-placeholder='Total'>Nombre d'heur</th>";
    var bodyhtml="";
    var dataset= [];
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx1,
        data: "dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){
            var i=1;
            $.each(msg, function (index, value) {
                bodyhtml +="<tr><td style='background: "+value.color+"'></td><th nowrap='nowrap'>"+value.name+ "</th><td>"+value.heur+" heure(s)</td></tr>"
                dataset.push( {
                    data: [[i,value.heur]],
                    bars: { show: true, fill: true }
                    ,label:value.name
                    ,color:value.color
                });

                i++
            });


        }
    });
    $.plot($("#firstPieChart"), dataset,options);
    $(".xAxis .tickLabel").hide();
    if ( $.fn.dataTable.isDataTable( '#firstPieChartTable' ) ) {

        $("#firstPieChartTable").DataTable().destroy();
        $("#firstPieChartTable thead tr").html("");
        $("#firstPieChartTable tbody").html("");
    }
    $("#firstPieChartTable thead tr").html(headhtml);
    $("#firstPieChartTable tbody").html(bodyhtml);
    $("#firstPieChartTable").DataTable( {
        "aoColumns": [{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }],
        "pageLength": 100,
        paging: false,
        searching: false
    });

}
function loadRemboursements3Chart()
{
    region=$('#idregion').val();
    categorie=$('#idcategorie').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    idredact=$("#idredaceur2").val();
    var headhtml="<th width='5%'></th></th><th nowrap='nowrap' data-placeholder='rechercher un rédacteur'>Deals</th><th data-placeholder='Total'>Nombre d'heur</th>";
    var bodyhtml="";
    var dataset3= [];
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx3,
        data: "dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie+"&idredact="+idredact,
        success: function(msg){
            var i=1;
            $.each(msg, function (index, value) {
                bodyhtml +="<tr><td style='background: "+value.color+"'></td><th nowrap='nowrap'>"+value.name+ "</th><td>"+value.heur+" heure(s)</td></tr>"
                dataset3.push( {
                    data: [[i,value.heur]],
                    bars: { show: true, fill: true }
                    ,label:value.name
                    ,color:value.color
                });

                i++
            });


        }
    });
    $.plot($("#firstPieChart3"), dataset3,options);
    $(".xAxis .tickLabel").hide();
    if ( $.fn.dataTable.isDataTable( '#firstPieChart3Table' ) ) {

        $("#firstPieChart3Table").DataTable().destroy();
        $("#firstPieChart3Table thead tr").html("");
        $("#firstPieChart3Table tbody").html("");
    }

    $("#firstPieChart3Table thead tr").html(headhtml);
    $("#firstPieChart3Table tbody").html(bodyhtml);
    $("#firstPieChart3Table").DataTable( {
        "aoColumns": [{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }],
        "pageLength": 100,
        paging: false,
        searching: false
    });
}

function loadRemboursements2Chart()
{
    region=$('#idregion').val();
    categorie=$('#idcategorie').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var headhtml="<th width='5%'></th></th><th nowrap='nowrap' data-placeholder='rechercher un rédacteur'>Rédateur</th><th data-placeholder='Total'>nombre de deal</th>";
    var bodyhtml="";
    var dataset2= [];
    var d1=[];
    var nb=0;
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx2,
        data: "dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){
            var i=1;
            $.each(msg, function (index, value) {
                nb=nb+value.nbr;
                idredact=$("#idredaceur1").val();
                if(idredact!=""){
                    if(index==idredact){
                        bodyhtml +="<tr><td style='background: "+value.color+"'></td><th nowrap='nowrap'>"+value.name+ "</th><td>"+value.nbr+"</td></tr>"

                        dataset2.push( {
                            data: [[i,value.nbr]],
                            bars: { show: true, fill: true }
                            ,label:value.name
                            ,color:value.color
                        });
                    }
                }else{
                    bodyhtml +="<tr><td style='background: "+value.color+"'></td><th nowrap='nowrap'>"+value.name+ "</th><td>"+value.nbr+"</td></tr>"
                    dataset2.push( {
                        data: [[i,value.nbr]],
                        bars: { show: true, fill: true }
                        ,label:value.name
                        ,color:value.color
                    });
                }
                i++
            });
            i=1;
            $.each(msg, function (index, value) {
                d1.push([i,nb]);
                i++
            });
            d1.push([i,nb]);
            dataset2.push({
                    data: d1,
                    lines: { show: true, steps: true }
                })

        }
    });
    if ( $.fn.dataTable.isDataTable( '#lastPieChartTable' ) ) {

        $("#lastPieChartTable").DataTable().destroy();
        $("#lastPieChartTable thead tr").html("");
        $("#lastPieChartTable tbody").html("");
    }
    $("#lastPieChartTable thead tr").html(headhtml);
    $("#lastPieChartTable tbody").html(bodyhtml);
    $("#lastPieChartTable").DataTable( {
        "aoColumns": [{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }],
        "pageLength": 100,
        paging: false,
        searching: false
    });
    $('.cyanText ').html(nb+" <span class='greyText'>Nombre total des deals</span>");
    $.plot($("#lastPieChart"), dataset2,options);
    $(".xAxis .tickLabel").hide();
}