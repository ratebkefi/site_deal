$(function () {
    $.ajaxSetup({async: false});
    if(state_ajax==1)
    {
        loadFirstChart();
    }
    else  if(state_ajax==2)
    {
        loadTotaltickets();
    }
    else  if(state_ajax==3)
    {
        loadTotaltickets();
    }
    else  if(state_ajax==4)
    {
        loadNbrTotalCommandes1();
    }
    else  if(state_ajax==5)
    {
        loadStatistiquesClient1();
    }
    else  if(state_ajax==6)
    {
        loadrecapRemoboursement1();
    }
    else  if(state_ajax==7)
    {
        loadLastChart11();
    }
    else  if(state_ajax==8)
    {
        loadSecondChart();
    }
    else  if(state_ajax==9)
    {
        loadNbrCommandeChart();
    }
    else  if(state_ajax==11)
    {
        loadrecapcomm();
    }

})
function loadrecapcomm()
{

    partenaire=$('#partenaire_id3').val();
    region=$('#idregion3').val();
    categorie=$('#idcategorie3').val();
    iddearm=$('#iddearm3').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var total = 0;
    var headhtml="<th>Nom Du Deal</th><th>Total Commentaire</th><th>Note 1<th>Note 2</th></th><th>Note 3</th><th>Note 4</th><th>Note 5</th><th>Moyenne</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx156,
        data: "deal="+iddearm+"&partenaire="+partenaire+"&dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){
            $.each(msg, function (index, value) {
                bodyhtml +="<tr><td nowrap='nowrap'>"+value.title+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.totalcomm+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.totalcomm1+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.totalcomm2+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.totalcomm3+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.totalcomm4+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.totalcomm5+ "</td>";
                bodyhtml +="<td nowrap='nowrap'>"+value.moyen+ "</td></tr>";
            });
            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();
            // d1_4.push(total/msg.length);
        }
    });

    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor:  "#89A54E"
            },
            color: "#89A54E"
        }
    ];

    $.plot($("#rm3PieChart"), data1, {
        xaxis: {
            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip3">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);
        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var alphaMonth = monthArray[numericMonth];
        return alphaMonth;
    }

    $("#rm3PieChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip2").remove();

                var originalPoint;
                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }
                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;
                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip3").remove();
            previousPoint = null;
        }
    });
}

function  loadLastChart11(){
    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    // generate data
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Traité en 1 message</th><th>Traité en 2 messages</th><th>Traité en 3 messages et plus </th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx3,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){
            dataPie[0] = {
                label: "Traité en 1 message ("+msg.ticketMsg1+" )" ,
                data: msg.ticketMsg1
            }
            dataPie[1] = {
                label: "Traité en 2 messages ("+msg.ticketMsg2+" )" ,
                data: msg.ticketMsg2
            }
            dataPie[2] = {
                label: "Traité en 3 messages et plus ("+msg.ticketMsg3+" )" ,
                data: msg.ticketMsg3
            }
            bodyhtml +="<tr><th nowrap='nowrap'>"+msg.ticketMsg1 + " </th><td>"+msg.ticketMsg2+" </td>"
            bodyhtml +="<td>"+msg.ticketMsg3+" </td></tr>";
            $("#lastPieChartTable thead tr").html(headhtml);
            $("#lastPieChartTable tbody").html(bodyhtml);
            $("#lastPieChartTable").DataTable();
            $("#lastPieChartTable_length").hide();
            $("#lastPieChartTable_filter").hide();
            $("#lastPieChartTable_info").hide();
            $("#lastPieChartTable_paginate").hide();

        }

    });

//Volume des tickets
    $.plot('#lastPieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: function(label, series){
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;"><br/>'+Math.round(series.percent)+'%</div>';
                    },
                    background: { opacity: 0.8 }
                }
            }
        },
        legend: {
            show: true,
            paddingBottom:"30px"
        }
    });

}
function loadStatistiquesClient1()
{
    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    // generate data
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Inscrits</th><th>confirmés</th><th>1 commandes </th><th> < 5 commandes</th><th> >= 5 commandes</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx133,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){
            dataPie[0] = {
                label: "Une commande ("+msg.unecommande+")" ,
                data: msg.unecommande
            }
            dataPie[1] = {
                label: "< 5 commandes ("+msg.moinscinqcommandes+")" ,
                data: msg.moinscinqcommandes
            }
            dataPie[2] = {
                label: ">= 5 commandes ("+msg.pluscingcommande+")" ,
                data: msg.pluscingcommande
            }
            bodyhtml +="<tr><th><a href='exportchef/"+msg.firstDate+"/"+msg.endDate+"/4'>"+msg.inscrits + "</a></th><td><a href='exportchef/"+msg.firstDate+"/"+msg.endDate+"/5'>"+msg.confirme+"</a></td><td><a href='exportchef/"+msg.firstDate+"/"+msg.endDate+"/1'>"+msg.unecommande+"</a></td><td><a href='exportchef/"+msg.firstDate+"/"+msg.endDate+"/2'>"+msg.moinscinqcommandes+"</a></td>"
            bodyhtml +="<td><a href='exportchef/"+msg.firstDate+"/"+msg.endDate+"/3'>"+msg.pluscingcommande+"</a></td></tr>";
            $("#firstPieChartTable thead tr").html(headhtml);
            $("#firstPieChartTable tbody").html(bodyhtml);
            $("#firstPieChartTable").DataTable();
            $("#firstPieChartTable_length").hide();
            $("#firstPieChartTable_filter").hide();
            $("#firstPieChartTable_info").hide();
            $("#firstPieChartTable_paginate").hide();

        }
    });


//Volume des tickets
    $.plot('#firstPieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: labelFormatter,
                    background: {
                        opacity: 0.8
                    }
                }
            }
        },
        legend: {
            show: true
        }
    });
}
function loadNbrTotalCommandes1()
{

    partenaire=$('#partenaire_id3').val();
    region=$('#idregion3').val();
    categorie=$('#idcategorie3').val();
    iddearm=$('#iddearm3').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var total = 0;
    var headhtml="<th>Nom Du Deal</th><th nowrap='nowrap'>NBR Payé</th><th>NBR attente</th><th>Total</th><th>Ratio en attente</th>";
    var bodyhtml="";

    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx12,
        data: "deal="+iddearm+"&partenaire="+partenaire+"&dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){

            $.each(msg, function (index, value) {


                bodyhtml +="<tr><td nowrap='nowrap'>"+value.title+ "</td>" +
                    "<td>"+value.nbrpaye+" </td>"
                bodyhtml +="<td>"+ value.nbrnonpaye+" </td>"
                bodyhtml +="<td>"+ value.totals+" </td>"
                if((value.nbrnonpaye!=0)&&(value.totals!=0))
                {
                    bodyhtml +="<td>"+ ((value.nbrnonpaye/value.totals)*100).toFixed(2)+" </td></tr>"
                }
                else
                    bodyhtml +="<td> 0 </td></tr>"


            });
            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();

            // d1_4.push(total/msg.length);


        }
    });



    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor:  "#89A54E"
            },
            color: "#89A54E"
        }

    ];


    $.plot($("#rm3PieChart"), data1, {
        xaxis: {

            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip3">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }

    $("#rm3PieChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip2").remove();

                var originalPoint;

                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }

                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;

                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip3").remove();
            previousPoint = null;
        }
    });
}

function loadTotaltickets(){
    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    // generate data
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Remboursement par virement </th><th>Remboursement bigfid</th><th>Sans remboursement </th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx11,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){

            dataPie[0] = {
                label: "Remboursement par virement ("+msg.rembvirement+")" ,
                data: msg.rembvirement
            }
            dataPie[1] = {
                label: "Remboursement bigfid ("+msg.rembbig+")" ,
                data: msg.rembbig
            }
            dataPie[2] = {
                label: "Sans remboursement ("+msg.sansremb+")" ,
                data: msg.sansremb
            }
            bodyhtml +="<tr><th nowrap='nowrap'>"+msg.rembvirement + " Ticket</th><td>"+msg.rembbig+" Ticket</td>"
            bodyhtml +="<td>"+msg.sansremb+" Ticket</td></tr>";
            $("#firstPieChartTable thead tr").html(headhtml);
            $("#firstPieChartTable tbody").html(bodyhtml);
            $("#firstPieChartTable").DataTable();
            $("#firstPieChartTable_length").hide();
            $("#firstPieChartTable_filter").hide();
            $("#firstPieChartTable_info").hide();
            $("#firstPieChartTable_paginate").hide();

        }
    });

//Volume des tickets
    $.plot('#firstPieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: labelFormatter,
                    background: {
                        opacity: 0.8
                    }
                }
            }
        },
        legend: {
            show: true
        }
    });

}
function loadNbrCommandeChart()
{

    partenaire_id = $('#partenaireid').val();
    deal = $('#iddealcmd1').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 0;
    var tot = [],
        pay = [],
        att = [],
        ann = []
        ;
    var headhtml="<th nowrap='nowrap' data-placeholder='rechercher un jour'>Jours</th><th data-placeholder='Total'>Total</th><th data-placeholder='Payé'>Payé</th>" +
        "<th data-placeholder='En attente'>En attente</th><th data-placeholder='Annulé'>Annulé</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType: "json",
            url: linkajx10,
        data: "partenaire=" + partenaire_id + "&deal=" + deal + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            $.each(msg, function (index, value) {

                var date = new Date(value.jour);
                //headhtml +="<th nowrap='nowrap'>"+date.getDay() + "/ "+(date.getMonth()+1) + "</th>"

                bodyhtml +="<tr><th nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</th><td>"+value.total+"</td>"
                bodyhtml +="<td>"+value.paye+"</td>"
                bodyhtml +="<td>"+value.enattente+"</td>"
                bodyhtml +="<td>"+value.annuler+"</td></tr>"



            });
            $("#nombreCommandePieChartTable thead tr").html(headhtml);
            $("#nombreCommandePieChartTable tbody").html(bodyhtml);
            $("#nombreCommandePieChartTable").DataTable();
        }
    });


}

function loadStatistiquesClient()
{
    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    // generate data
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Inscrits</th><th>confirmés</th><th>1 commandes </th><th> < 5 commandes</th><th> >= 5 commandes</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx133,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){


            dataPie[0] = {
                label: "Une commande ("+msg.unecommande+")" ,
                data: msg.unecommande
            }
            dataPie[1] = {
                label: "< 5 commandes ("+msg.moinscinqcommandes+")" ,
                data: msg.moinscinqcommandes
            }
            dataPie[2] = {
                label: ">= 5 commandes ("+msg.pluscingcommande+")" ,
                data: msg.pluscingcommande
            }
            bodyhtml +="<tr><th nowrap='nowrap'>"+msg.inscrits + " Ticket</th><td>"+msg.confirme+"</td><td>"+msg.unecommande+"</td><td>"+msg.moinscinqcommandes+"</td>"
            bodyhtml +="<td>"+msg.pluscingcommande+"</td></tr>";
            $("#firstPieChartTable thead tr").html(headhtml);
            $("#firstPieChartTable tbody").html(bodyhtml);
            $("#firstPieChartTable").DataTable();
            $("#firstPieChartTable_length").hide();
            $("#firstPieChartTable_filter").hide();
            $("#firstPieChartTable_info").hide();
            $("#firstPieChartTable_paginate").hide();

        }
    });


//Volume des tickets
    $.plot('#firstPieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: labelFormatter,
                    background: {
                        opacity: 0.8
                    }
                }
            }
        },
        legend: {
            show: true
        }
    });
}

function loadrecapClient()
{

    partenaire_id = $('#partenaireid').val();
    deal = $('#iddealcmd1').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 0;
    var tot = [],
        pay = [],
        att = [],
        ann = []
        ;
    var headhtml="<th nowrap='nowrap' data-placeholder='rechercher un jour'>Jours</th><th data-placeholder='Total'>Total</th><th data-placeholder='Payé'>Payé</th>" +
        "<th data-placeholder='En attente'>En attente</th><th data-placeholder='Annulé'>Annulé</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx14,
        data: "partenaire=" + partenaire_id + "&deal=" + deal + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            $.each(msg, function (index, value) {

                var date = new Date(value.jour);
                //headhtml +="<th nowrap='nowrap'>"+date.getDay() + "/ "+(date.getMonth()+1) + "</th>"

                bodyhtml +="<tr><th nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</th><td>"+value.total+"</td>"
                bodyhtml +="<td>"+value.paye+"</td>"
                bodyhtml +="<td>"+value.enattente+"</td>"
                bodyhtml +="<td>"+value.annuler+"</td></tr>"

                tot.push([value.jour*1000, value.total]);
                pay.push([value.jour*1000, value.paye]);
                att.push([value.jour*1000, value.enattente]);
                ann.push([value.jour*1000, value.annuler]);
                max = value.total

            });
            $("#nombreCommandePieChartTable thead tr").html(headhtml);
            $("#nombreCommandePieChartTable tbody").html(bodyhtml);
            $("#nombreCommandePieChartTable").DataTable();
        }
    });


    var plot = $.plot($("#nombreCommandePieChart"), [
        {data: tot, label: "Total"},
        {data: pay, label: "Payé"},
        {data: att, label: "En attente"}
        ,{data: ann, label: "Annulé"}
    ], {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                steps: false,
                fill: false
            },
            points: {
                show: true,
                radius: 2,
                symbol: "circle",
                fill: true
            }
        },
        yaxis: {
            min: 0,
            max: (max+20)
        },
        xaxis: {
            mode: "time"
            /* mode: "time",
             // minTickSize: [0, "day"],
             timeformat: "%d-%m-%y",
             min: (new Date(d1[2], d1[1] - 1, d1[0])).getTime(),
             max: (new Date(d2[2], d2[1] - 1, d2[0])).getTime()*/
        },
        grid: {
            color: 'rgba(0,0,0, .3)',
            borderColor: 'rgba(0,0,0, .3)',
            borderWidth: 1,
            hoverable: true
        },
        colors: [ "#058DC7","#ED7E17"]
    });
}
function loadrecapRemoboursement1()
{


    partenaire=$('#partenaire_id3').val();
    region=$('#idregion3').val();
    categorie=$('#idcategorie3').val();
    iddearm=$('#iddearm3').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var total = 0;
    var headhtml="<th>Nom Du Deal</th><th>Total acheteur</th><th>Réference<th>Prix</th></th><th>BigFid</th><th>Virement</th><th>Montant</th>";
    var bodyhtml="";

    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx155,
        data: "deal="+iddearm+"&partenaire="+partenaire+"&dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){

            $.each(msg, function (index, value) {

                bodyhtml +="<tr><td nowrap='nowrap'>"+value.title+ "</td>";
                bodyhtml +="<td>"
                for(var i= 0; i < value.refprix.length; i++)
                {
                    bodyhtml +=value.refprix[i]['nbcoup']+"<br>";

                }
                bodyhtml +="</td>"


                bodyhtml +="<td>"
                for(var i= 0; i < value.refprix.length; i++)
                {
                    bodyhtml +=value.refprix[i]['title']+"<br>";

                }
                bodyhtml +="</td>"
                bodyhtml +="<td>"
                for(var i= 0; i < value.refprix.length; i++)
                {
                    bodyhtml +=value.refprix[i]['price']+"<br>";

                }
                bodyhtml +="</td>"

                bodyhtml +="<td>"
                for(var i= 0; i < value.refprix.length; i++)
                {
                    bodyhtml +=value.refprix[i]['bigfid']+"<br>";

                }
                bodyhtml +="</td>"
                bodyhtml +="<td>"
                for(var i= 0; i < value.refprix.length; i++)
                {
                    bodyhtml +=value.refprix[i]['virement']+"<br>";

                }

                bodyhtml +="</td>"
                bodyhtml +="<td>"
                for(var i= 0; i < value.refprix.length; i++)
                {
                    bodyhtml +=value.refprix[i]['montant']+"<br>";

                }
                bodyhtml +="</td>"
            });
            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();



            // d1_4.push(total/msg.length);


        }
    });



    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor:  "#89A54E"
            },
            color: "#89A54E"
        }

    ];


    $.plot($("#rm3PieChart"), data1, {
        xaxis: {

            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip3">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }

    $("#rm3PieChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip2").remove();

                var originalPoint;

                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }

                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;

                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip3").remove();
            previousPoint = null;
        }
    });
}
function loadrecapRemoboursement()
{

    partenaire_id = $('#partenaireid').val();
    deal = $('#iddealcmd1').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 0;
    var tot = [],
        pay = [],
        att = [],
        ann = []
        ;
    var headhtml="<th nowrap='nowrap' data-placeholder='rechercher un jour'>Jours</th><th data-placeholder='Total'>Total</th><th data-placeholder='Payé'>Payé</th>" +
        "<th data-placeholder='En attente'>En attente</th><th data-placeholder='Annulé'>Annulé</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx15,
        data: "partenaire=" + partenaire_id + "&deal=" + deal + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            $.each(msg, function (index, value) {

                var date = new Date(value.jour);
                //headhtml +="<th nowrap='nowrap'>"+date.getDay() + "/ "+(date.getMonth()+1) + "</th>"

                bodyhtml +="<tr><th nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</th><td>"+value.total+"</td>"
                bodyhtml +="<td>"+value.paye+"</td>"
                bodyhtml +="<td>"+value.enattente+"</td>"
                bodyhtml +="<td>"+value.annuler+"</td></tr>"

                tot.push([value.jour*1000, value.total]);
                pay.push([value.jour*1000, value.paye]);
                att.push([value.jour*1000, value.enattente]);
                ann.push([value.jour*1000, value.annuler]);
                max = value.total

            });
            $("#nombreCommandePieChartTable thead tr").html(headhtml);
            $("#nombreCommandePieChartTable tbody").html(bodyhtml);
            $("#nombreCommandePieChartTable").DataTable();
        }
    });


    var plot = $.plot($("#nombreCommandePieChart"), [
        {data: tot, label: "Total"},
        {data: pay, label: "Payé"},
        {data: att, label: "En attente"}
        ,{data: ann, label: "Annulé"}
    ], {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                steps: false,
                fill: false
            },
            points: {
                show: true,
                radius: 2,
                symbol: "circle",
                fill: true
            }
        },
        yaxis: {
            min: 0,
            max: (max+20)
        },
        xaxis: {
            mode: "time"
            /* mode: "time",
             // minTickSize: [0, "day"],
             timeformat: "%d-%m-%y",
             min: (new Date(d1[2], d1[1] - 1, d1[0])).getTime(),
             max: (new Date(d2[2], d2[1] - 1, d2[0])).getTime()*/
        },
        grid: {
            color: 'rgba(0,0,0, .3)',
            borderColor: 'rgba(0,0,0, .3)',
            borderWidth: 1,
            hoverable: true
        },
        colors: [ "#058DC7","#ED7E17"]
    });
}

function loadrecapCommentaires()
{

    partenaire_id = $('#partenaireid').val();
    deal = $('#iddealcmd1').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 0;
    var tot = [],
        pay = [],
        att = [],
        ann = []
        ;
    var headhtml="<th nowrap='nowrap' data-placeholder='rechercher un jour'>Jours</th><th data-placeholder='Total'>Total</th><th data-placeholder='Payé'>Payé</th>" +
        "<th data-placeholder='En attente'>En attente</th><th data-placeholder='Annulé'>Annulé</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx16,
        data: "partenaire=" + partenaire_id + "&deal=" + deal + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            $.each(msg, function (index, value) {

                var date = new Date(value.jour);
                //headhtml +="<th nowrap='nowrap'>"+date.getDay() + "/ "+(date.getMonth()+1) + "</th>"

                bodyhtml +="<tr><th nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</th><td>"+value.total+"</td>"
                bodyhtml +="<td>"+value.paye+"</td>"
                bodyhtml +="<td>"+value.enattente+"</td>"
                bodyhtml +="<td>"+value.annuler+"</td></tr>"

                tot.push([value.jour*1000, value.total]);
                pay.push([value.jour*1000, value.paye]);
                att.push([value.jour*1000, value.enattente]);
                ann.push([value.jour*1000, value.annuler]);
                max = value.total

            });
            $("#nombreCommandePieChartTable thead tr").html(headhtml);
            $("#nombreCommandePieChartTable tbody").html(bodyhtml);
            $("#nombreCommandePieChartTable").DataTable();
        }
    });


    var plot = $.plot($("#nombreCommandePieChart"), [
        {data: tot, label: "Total"},
        {data: pay, label: "Payé"},
        {data: att, label: "En attente"}
        ,{data: ann, label: "Annulé"}
    ], {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                steps: false,
                fill: false
            },
            points: {
                show: true,
                radius: 2,
                symbol: "circle",
                fill: true
            }
        },
        yaxis: {
            min: 0,
            max: (max+20)
        },
        xaxis: {
            mode: "time"
            /* mode: "time",
             // minTickSize: [0, "day"],
             timeformat: "%d-%m-%y",
             min: (new Date(d1[2], d1[1] - 1, d1[0])).getTime(),
             max: (new Date(d2[2], d2[1] - 1, d2[0])).getTime()*/
        },
        grid: {
            color: 'rgba(0,0,0, .3)',
            borderColor: 'rgba(0,0,0, .3)',
            borderWidth: 1,
            hoverable: true
        },
        colors: [ "#058DC7","#ED7E17"]
    });
}

function chargerselectdeal5()
{
    dated = $('#dated').val();
    datef = $('#datef').val();
    var planning = $('#partenaireid').val();
    $.ajax({
        type: "POST",
        url: linkajxdeal,
        data: "idcategorie=&idregion=&partenaire_id=" + planning + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            $("#iddealcmd1").html(msg)
            $('#iddealcmd1').selectpicker('refresh');
        }
    });
}

function chargerselectdealdeal()
{
    dated = $('#dated').val();
    datef = $('#datef').val();
    $.ajax({
        type: "POST",
        url: linkajxdealpart,
        data: "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            $("#partenaireid").html(msg)
            $('#partenaireid').selectpicker('refresh');
        }
    });
}




function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
};

function chargerselectdeal3(){
    idcategorie = $('#idcategorie3').val();
    idregion = $('#idregion3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var planning = $('#partenaire_id3').val();

    $.ajax({
        type: "POST",
        url: linkajxdeal3,
        data: "idcategorie=" + idcategorie + "&partenaire_id2=" + planning + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            $("#iddearm3").html(msg)
            $('#iddearm3').selectpicker('refresh');
            loadRemboursements1Chart();


        }
    });
}

function chargerselectdeal2(){
    idcategorie = $('#idcategorie').val();
    idregion = $('#idregion').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var planning = $('#partenaire_id2').val();

    $.ajax({
        type: "POST",
        url: linkajxdeal2,
        data: "idcategorie=" + idcategorie + "&partenaire_id2=" + planning + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            $("#iddearm").html(msg)
            $('#iddearm').selectpicker('refresh');
            loadRemboursementsChart();


        }
    });
}

function loadRmChart()
{
    partenaire_id = $('#partenaire_id').val();
    deal = $('#iddeal15874').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    var max = 10;
    var ca = [],
        cac = [];
    var headhtml="<th nowrap='nowrap'>Nombre des coupons</th><th>Etat</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx4,
        data: "partenaire=" + partenaire_id + "&deal=" + deal ,
        success: function (msg) {








            var d1 =  [[0, msg.couponEnAttente]];

            var d2 = [[1, msg.couponPaye]];

            var d3 = [[2, msg.couponDelivre]];

            var d4 = [[3, msg.couponAttenteRembourcemment]];


            var d7 =  [[4, msg.couponAnnule]];
            var d8 =  [[5, msg.couponRembourcemmentAnnule]];
            var d9 =  [[6, msg.couponRembourse]];

            var d6 = [];
            for (var i =  0; i <  8; i ++) {

                d6.push([    i ,  msg.objectifca]);

            }

            $.plot("#rmPieChart", [{
                data: d1,
                bars: { show: true, fill: true }
                ,label:"En attente ( "+msg.couponEnAttente+" )"
                ,color:"#00A0B0"
            }, {
                data: d2,
                bars: { show: true }
                ,label:"Payé ( "+msg.couponPaye+" )"
                ,color:"#6A4A3C"

            }, {
                data: d3,
                bars: { show: true }
                ,label:"Délivré ( "+msg.couponDelivre+" )"
                ,color:"#CC333F"

            }, {
                data: d4,
                bars: { show: true }
                ,label:"En attente de rembourcemment ( "+msg.couponAttenteRembourcemment+" )"
                ,color:"#EB6841"

            },
                {
                data: d6,
                lines: { show: true, steps: true }
            }
                , {
                    data: d7,
                    bars: { show: true }
                    ,label:"Annulé ( "+msg.couponAnnule+" )"
                    ,color:"#EDC951"


                }
                , {
                    data: d8,
                    bars: { show: true }
                    ,label:"Rembourcemment Annulé ( "+msg.couponRembourcemmentAnnule+" )"
                    ,color:"#3B8686"

                }
                , {
                    data: d9,
                    bars: { show: true }
                    ,label:"Remboursé ( "+msg.couponRembourse+" )"
                    ,color:"#0B486B"
                }
            ]);

            bodyhtml +="<tr><td>"+msg.couponEnAttente+"</td><td>En attente</td></tr>"
            bodyhtml +="<td>"+msg.couponPaye+"</td><td>Payé</td></tr>"
            bodyhtml +="<td>"+msg.couponDelivre+"</td><td>Délivré</td></tr>"
            bodyhtml +="<td>"+msg.couponAttenteRembourcemment+"</td><td>En attente de rembourcemment</td></tr>"
            bodyhtml +="<td>"+msg.couponRembourse+"</td><td>Remboursé</td></tr>"
            bodyhtml +="<td>"+msg.couponAnnule+"</td><td>Annulé</td></tr>"
            bodyhtml +="<td>"+msg.couponRembourcemmentAnnule+"</td><td>Rembourcemment Annulé</td></tr>"
            bodyhtml +="</tr>"
            $("#rmPieChartTable thead tr").html(headhtml);
            $("#rmPieChartTable tbody").html(bodyhtml);
            $("#rmPieChartTable").DataTable();

        }
    });



}

function loadFirstChart(){

    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    // generate data
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Ticket ouverts</th><th>Ticket en cours</th><th>Ticket clôturés</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx1,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){

            dataPie[0] = {
                label: "Ticket ouverts ("+msg.ouvert+")" ,
                data: msg.ouvert
            }
            dataPie[1] = {
                label: "Ticket en cours ("+msg.encour+")" ,
                data: msg.encour
            }
            dataPie[2] = {
                label: "Ticket clôturés ("+msg.cloturer+")" ,
                data: msg.cloturer
            }
            bodyhtml +="<tr><th nowrap='nowrap'>"+msg.ouvert + " Ticket</th><td>"+msg.encour+" Ticket</td>"
            bodyhtml +="<td>"+msg.cloturer+" Ticket</td></tr>";
            $("#firstPieChartTable thead tr").html(headhtml);
            $("#firstPieChartTable tbody").html(bodyhtml);
            $("#firstPieChartTable").DataTable();
            $("#firstPieChartTable_length").hide();
            $("#firstPieChartTable_filter").hide();
            $("#firstPieChartTable_info").hide();
            $("#firstPieChartTable_paginate").hide();


        }
    });

//Volume des tickets
    $.plot('#firstPieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: labelFormatter,
                    background: {
                        opacity: 0.8
                    }
                }
            }
        },
        legend: {
            show: true
        }
    });

}




function  loadLastChart(){
    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    // generate data
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Traité en 1 message</th><th>Traité en 2 messages</th><th>Traité en 3 messages et plus </th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx3,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){
            dataPie[0] = {
                label: "Traité en 1 message ("+msg.ticketMsg1+" )" ,
                data: msg.ticketMsg1
            }
            dataPie[1] = {
                label: "Traité en 2 messages ("+msg.ticketMsg2+" )" ,
                data: msg.ticketMsg2
            }
            dataPie[2] = {
                label: "Traité en 3 messages et plus ("+msg.ticketMsg3+" )" ,
                data: msg.ticketMsg3
            }
            bodyhtml +="<tr><th nowrap='nowrap'>"+msg.ticketMsg1 + " </th><td>"+msg.ticketMsg2+" </td>"
            bodyhtml +="<td>"+msg.ticketMsg3+" </td></tr>";
            $("#lastPieChartTable thead tr").html(headhtml);
            $("#lastPieChartTable tbody").html(bodyhtml);
            $("#lastPieChartTable").DataTable();
            $("#lastPieChartTable_length").hide();
            $("#lastPieChartTable_filter").hide();
            $("#lastPieChartTable_info").hide();
            $("#lastPieChartTable_paginate").hide();

        }

    });

//Volume des tickets
    $.plot('#lastPieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: function(label, series){
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;"><br/>'+Math.round(series.percent)+'%</div>';
                    },
                    background: { opacity: 0.8 }
                }
            }
        },
        legend: {
            show: true,
            paddingBottom:"30px"
        }
    });

}

function loadRemboursements1Chart()
{

    partenaire=$('#partenaire_id3').val();
    region=$('#idregion3').val();
    categorie=$('#idcategorie3').val();
    iddearm=$('#iddearm3').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var total = 0;
    var headhtml="<th>Date</th><th nowrap='nowrap'>BIGFID</th><th>Virement</th>";
    var bodyhtml="";

    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx6,
        data: "deal="+iddearm+"&partenaire="+partenaire+"&dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){

            $.each(msg, function (index, value) {
                d1_1.push([value.jour, value.montantBigFid]);
                d1_2.push([value.jour, value.montantVirement]);
                var date = new Date(value.jour);

                bodyhtml +="<tr><td nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</td>" +
                "<td>"+value.montantBigFid+" TND</td>"
                bodyhtml +="<td>"+ value.montantVirement+" TND</td></tr>"
            });
            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();

            // d1_4.push(total/msg.length);


        }
    });



    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor:  "#89A54E"
            },
            color: "#89A54E"
        }

    ];


    $.plot($("#rm3PieChart"), data1, {
        xaxis: {

            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip3">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }

    $("#rm3PieChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip2").remove();

                var originalPoint;

                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }

                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;

                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip3").remove();
            previousPoint = null;
        }
    });
}

function loadNbrTotalCommande()
{

    partenaire=$('#partenaire_id3').val();
    region=$('#idregion3').val();
    categorie=$('#idcategorie3').val();
    iddearm=$('#iddearm3').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var total = 0;
    var headhtml="<th>Nom Du Deal</th><th nowrap='nowrap'>NBR Payé</th><th>NBR attente</th><th>Total</th><th>Ratio en attente</th>";
    var bodyhtml="";

    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx12,
        data: "deal="+iddearm+"&partenaire="+partenaire+"&dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){

            $.each(msg, function (index, value) {


                bodyhtml +="<tr><td nowrap='nowrap'>"+value.title+ "</td>" +
                    "<td>"+value.nbrpaye+" </td>"
                bodyhtml +="<td>"+ value.nbrnonpaye+" </td>"
                bodyhtml +="<td>"+ value.totals+" </td>"
                bodyhtml +="<td>"+ ((value.nbrnonpaye/value.totals)*100).toFixed(2)+" </td></tr>"
            });
            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();

            // d1_4.push(total/msg.length);


        }
    });



    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor:  "#89A54E"
            },
            color: "#89A54E"
        }

    ];


    $.plot($("#rm3PieChart"), data1, {
        xaxis: {

            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip3">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }

    $("#rm3PieChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip2").remove();

                var originalPoint;

                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }

                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;

                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip3").remove();
            previousPoint = null;
        }
    });
}

function loadRemboursementsChart()
{

    partenaire=$('#partenaire_id2').val();
    region=$('#idregion').val();
    categorie=$('#idcategorie').val();
    iddearm=$('#iddearm').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var total = 0;
    var headhtml="<th>Date</th><th nowrap='nowrap'>BIGFID</th><th>Virement</th>";
    var bodyhtml="";

    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx5,
        data: "deal="+iddearm+"&partenaire="+partenaire+"&dated="+dated+"&datef="+datef+"&region="+region+"&categorie="+categorie,
        success: function(msg){

            $.each(msg, function (index, value) {
                d1_1.push([value.jour, value.nbrBigFid]);
                d1_2.push([value.jour, value.nbrVirement]);
                var date = new Date(value.jour);

                bodyhtml +="<tr><td nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</td>" +
                "<td>"+value.nbrBigFid+" BIGFID</td>"
                bodyhtml +="<td>"+ value.nbrVirement+" Virement</td></tr>"
            });
            $("#rm2PieChartTable thead tr").html(headhtml);
            $("#rm2PieChartTable tbody").html(bodyhtml);
            $("#rm2PieChartTable").DataTable();

            // d1_4.push(total/msg.length);


        }
    });



    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12*24*60*60*300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor:  "#89A54E"
            },
            color: "#89A54E"
        }

    ];


    $.plot($("#rm2PieChart"), data1, {
        xaxis: {

            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip1">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }

    $("#rm2PieChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip1").remove();

                var originalPoint;

                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }

                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;

                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip1").remove();
            previousPoint = null;
        }
    });
}

function loadSecondChart()
{

    agent=$('#agent').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1=[];
    var d1_2=[];
    var d1_3=[];
    var d1_4=[];
    var total = 0;
    var headhtml="<th>Date</th><th>Object</th><th>Délai de traitement (H)</th><th>Code Ticket</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx2,
        data: "agent="+agent+"&dated="+dated+"&datef="+datef,
        success: function(msg){

            $.each(msg, function (index, value) {
                //console.log(value.jour+'-'+value.maxDelai+'-'+value.minDelai)
                //d1_1.push([value.jour*1000, value.delais]);



                bodyhtml +="<tr><th>"+value.date.date  + "</th><td>"+value.object+" H</td>"
                bodyhtml +="<td>"+ value.delais+"</td><td><a href='"+value.id+"/ticket/view/' target='_blank'> "+value.code+"</a> </td></tr>"
            });
            $("#secondPieChartTable thead tr").html(headhtml);
            $("#secondPieChartTable tbody").html(bodyhtml);
            $("#secondPieChartTable").DataTable();

            // d1_4.push(total/msg.length);
            total = total/msg.length;


        }
    });



    data1 = [
        {
            label: "Délai de traitement maximum",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 2*24*60*60*300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor:  "#AA4643"
            },
            color: "#AA4643"
        }
    ];


    $.plot($("#placeholder"), data1, {
        xaxis: {

            mode: "time",
            timeformat: "%d-%m"
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 1
        },
        legend: {
            labelBoxBorderColor: "none",
            position: "right"
        },
        series: {
            shadowSize: 1
        }
    });

    function showTooltip(x, y, contents, z) {
        $('<div id="flot-tooltip">' + contents + '</div>').css({
            top: y - 20,
            left: x - 90,
            'border-color': z,
        }).appendTo("body").show();
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }

    $("#placeholder").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                $("#flot-tooltip").remove();

                var originalPoint;

                if (item.datapoint[0] == item.series.data[0][3]) {
                    originalPoint = item.series.data[0][0];
                } else if (item.datapoint[0] == item.series.data[1][3]){
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]){
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]){
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]){
                    originalPoint = item.series.data[4][0];
                }

                var x = getMonthName(originalPoint);
                y = item.datapoint[1];
                z = item.series.color;

                showTooltip(item.pageX, item.pageY,
                    "<b>" + item.series.label + "</b><br /> " + x + " = " + y + "&deg;C",
                    z);
            }
        } else {
            $("#flot-tooltip").remove();
            previousPoint = null;
        }
    });
}