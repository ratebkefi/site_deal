$(function () {
    $.ajaxSetup({async: false});

    chargerselectdeal();
    loadgraphdeal2();
    loadgraphchiffre();
    loadgraphcontrat();

});





function loadgraphcontrat(){
    idcategorie = $('#idcategorie').val();
    idregion = $('#idregion').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    idcommercial = $('#idcommercial').val();
    var dataPie = [];
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajxcontrat,
        data: "idcategorie=" + idcategorie + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef+ "&idcommercial=" + idcommercial,
        success: function (msg) {
            dataPie[0] = {
                label: "Contrats Partenaires ("+msg.ancien+")" ,
                data: msg.ancien
            }
            dataPie[1] = {
                label: "Contrats Prospect ("+msg.nouveau+")" ,
                data: msg.nouveau
            }
            dataPie[2] = {
                label: "Nombre total des contrats ("+(msg.nouveau+msg.ancien)+")" ,
                data: 0
            }

        }
    });
    $.plot('#firstPieChartContrar', dataPie, {
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
function chargerselectdeal(){
    idcategorie = $('#idcategorie').val();
    idregion = $('#idregion').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    $.ajax({
        type: "POST",

        url: linkajxdeal,
        data: "idcategorie=" + idcategorie + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            $("#iddeal15874").html(msg)
            $('#iddeal15874').selectpicker('refresh');
        }
    });
}
function loadgraphdeal(id){
    if(id>0){
        idcategorie = $('#idcategorie').val();
        idregion = $('#idregion').val();
        dated = $('#dated').val();
        datef = $('#datef').val();
        var d1 = dated.split("/");
        var d2 = datef.split("/");

        var max = 10;
        var ca = [],
            cac = [];
        var headhtml="<th nowrap='nowrap'>Jours</th><th>Objectif chiffre d'affaire</th><th>Chiffre d'affaire Atteint </th>";
        var bodyhtml="";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: linkajx2deal,
            data: "idcategorie=" + idcategorie + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef+"&id="+id,
            success: function (msg) {
                $.each(msg, function (index, value) {

                    if (max < value.caplanning) {
                        max = value.caplanning
                    }
                    if (max < value.cacmd) {
                        max = value.cacmd
                    }

                    ca.push([index*1000, value.caplanning]);
                    cac.push([index*1000, value.cacmd]);
                    var date = new Date(index*1000);
                    bodyhtml +="<tr><th nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</th><td>"+value.caplanning+"</td>"
                    bodyhtml +="<td>"+value.cacmd+"</td></tr>"

                });
                $("#excelDataTable2 thead tr").html(headhtml);
                $("#excelDataTable2 tbody").html(bodyhtml);
                $("#excelDataTable2").DataTable();

            }
        });


        var plot = $.plot($("#forthPieChart"), [
            {data: ca, label: "Objectif chiffre d'affaire"},
            {data: cac, label: "Chiffre d'affaire Attente"}
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
                max: (max+100)
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
}
function loadgraphchiffre() {
    idcategorie = $('#idcategorie').val();
    idregion = $('#idregion').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 10;
    var ca = [],
        cac = [];
    var headhtml="<th nowrap='nowrap' data-placeholder='rechercher un jour'>Jours</th><th data-placeholder='Objectif chiffre d\'affaire'>Objectif chiffre d'affaire</th><th data-placeholder='Objectif chiffre d\'affaire Atteint'>Chiffre d'affaire Atteint </th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx1,
        data: "idcategorie=" + idcategorie + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            $.each(msg, function (index, value) {
                var date = new Date(index*1000);
                //headhtml +="<th nowrap='nowrap'>"+date.getDay() + "/ "+(date.getMonth()+1) + "</th>"

                if (max < value.caplanning) {
                    max = value.caplanning
                }
                if (max < value.cacmd) {
                    max = value.cacmd
                }
                bodyhtml +="<tr><th nowrap='nowrap'>"+date.getDate() + " / "+(date.getMonth()+1) + " / "+(date.getFullYear()) + "</th><td>"+value.caplanning+"</td>"
                bodyhtml +="<td>"+value.cacmd+"</td></tr>"

                ca.push([index*1000, value.caplanning]);
                cac.push([index*1000, value.cacmd]);
            });
            $("#excelDataTable thead tr").html(headhtml);
            $("#excelDataTable tbody").html(bodyhtml);
            $("#excelDataTable").DataTable();
        }
    });


    var plot = $.plot($("#firstPieChart"), [
        {data: ca, label: "Objectif chiffre d'affaire"},
        {data: cac, label: "Chiffre d'affaire Atteint "}
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
            max: (max+100)
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
function loadgraphdeal2() {
    idcategorie = $('#idcategorie').val();
    idregion = $('#idregion').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 10;
    var ca = [],
        cac = [];
    var headhtml="<th nowrap='nowrap' data-placeholder='rechercher un jour'>Jours</th><th data-placeholder='Objectif chiffre d\'affaire'>Objectif chiffre d'affaire</th><th data-placeholder='Objectif chiffre d\'affaire Atteint'>Chiffre d'affaire Atteint </th>";
    var bodyhtml="";
    var newtab=new Array();
    var caplanning=[];
    var name=[];
    var ca=[];
    var color=[];
    var options = {
        legend:{
            container:$("#legendContainer"),
            noColumns: 0
        },
        grid: {
            backgroundColor: { colors: ["#ffffff", "#ffffff"] }
        }
    };
    var head="<tr><th width='3%'>#</th><th width='7%'>Couleur</th><th>Nom de deal</th></tr>";
    var body="";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajxalldeal,
        data: "idcategorie=" + idcategorie + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {


            $.each(msg, function (index, value) {
                name[index]= value.name;
                ca[index]= [[index,value.ca]];
                color[index]= value.color;
                body += "<tr><td>"+index+"</td><td style='background: #"+value.color+"'>&nbsp;</td><td>"+value.name+"</td></tr>";

            });
            $('#legend1 thead').html(head);
            $('#legend1 tbody').html(body);

            $.each(name, function (index, value) {

                newtab.push({data: ca[index],bars: { show: true, fill: true },label:value,color:"#"+color[index]});
            });

            $.plot($("#firstPieChartx"), newtab,options);

           /*bodyhtml +="<tr><td>"+msg.couponEnAttente+"</td><td>En attente</td></tr>"
            bodyhtml +="<td>"+msg.couponPaye+"</td><td>Payé</td></tr>"
            bodyhtml +="<td>"+msg.couponDelivre+"</td><td>Délivré</td></tr>"
            bodyhtml +="<td>"+msg.couponAttenteRembourcemment+"</td><td>En attente de rembourcemment</td></tr>"
            bodyhtml +="<td>"+msg.couponRembourse+"</td><td>Remboursé</td></tr>"
            bodyhtml +="<td>"+msg.couponAnnule+"</td><td>Annulé</td></tr>"
            bodyhtml +="<td>"+msg.couponRembourcemmentAnnule+"</td><td>Rembourcemment Annulé</td></tr>"
            bodyhtml +="</tr>"
            $("#rmPieChartTable thead tr").html(headhtml);
            $("#rmPieChartTable tbody").html(bodyhtml);*/
        }
    });

    //$.plot("#firstPieChartx", [newtab]);

}


function showTooltip(x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        top: y - 16,
        left: x + 20
    }).appendTo('body').fadeIn();
};

$('#firstPieChart').bind('plothover', function (event, pos, item) {
    if (item) {
        if (previousPoint != item.dataIndex) {

            previousPoint = item.dataIndex;

            $("#tooltip").remove();
            var x = item.datapoint[0].toFixed(2),
                y = item.datapoint[1].toFixed(2);

            showTooltip(item.pageX, item.pageY,
                item.series.label + " of " + x + " = " + y);
        }
    } else {
        $("#tooltip").remove();
        previousPoint = null;
    }
});

function getRandomData() {

    if (data.length) {
        data = data.slice(1);
    }

    while (data.length < maximum) {
        var previous = data.length ? data[data.length - 1] : 50;
        var y = previous + Math.random() * 10 - 5;
        data.push(y < 0 ? 0 : y > 100 ? 100 : y);
    }

    // zip the generated y values with the x values

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
    }

    return res;
}


// A custom label formatter used by several of the plots

function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}
