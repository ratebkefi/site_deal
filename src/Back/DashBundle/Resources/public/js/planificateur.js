$(function () {
    $.ajaxSetup({async: false});

    if (state_ajax == 1) {
        loadNombreDealChart();
    }
    else if (state_ajax == 2) {
        loadNombreContratParcommercialChart();
    }
    else if (state_ajax == 3) {
        loadAnnexeCommercialChart();
    }
    else {
        loadChartPublication();
        loadDealAnnulerChart();
        loadNouveauContratChart();
        loadNombreContratParcommercialChart();
        loadAnnexeCommercialChart();
    }



});
function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "</div>";
};
function loadNombreContratParcommercialChart()
{
    commercial=$('#commercial').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    var dataPie = [];
    var headhtml =  "<th>Commercial </th>" +
        "<th>Titre Annexe</th>";
    var bodyhtml = "";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx16,
        data: "commercial="+commercial+"&dated="+dated+"&datef="+datef,
        success: function(msg){
            $.each(msg, function (index, value) {

                bodyhtml += "<tr><td nowrap='nowrap' >" + value.name + "</td>";
                bodyhtml += "<td nowrap='nowrap'><a href='"+value.protocoleId+"/pdf/"+value.annexId+"' target='_blank'>";
                $.each(value.annexename, function (index1, value1) {
                    bodyhtml +=  "<a href='"+value1.protocoleId+"/pdf/"+value1.annexId+"' target='_blank'>"+value1.annexename+"</a>";
                });
                bodyhtml += "</a></td>";

                dataPie[value.id] = {
                    label: value.name + "("+value.nbr+")" ,
                    data: value.nbr

            }
            });


            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();

        }
    });
    $.plot('#nombrecontratparcommercial', dataPie, {
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
function loadAnnexeCommercialChart()
{
    commercial=$('#commercial').val();
    dated=$('#dated').val();
    datef=$('#datef').val();

    var dataPie = [];

    var headhtml =  "<th>Commercial </th>" +
        "<th>Titre Annexe</th>";
    var bodyhtml = "";


    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx17,
        data: "commercial="+commercial+"&dated="+dated+"&datef="+datef,
        success: function(msg){
            $.each(msg, function (index, value) {

                bodyhtml += "<tr><td nowrap='nowrap' >" + value.name + "</td>";
                bodyhtml += "<td nowrap='nowrap'><a href='"+value.protocoleId+"/pdf/"+value.annexId+"' target='_blank'>";
                $.each(value.annexename, function (index1, value1) {
                    bodyhtml +=  "<a href='"+value1.protocoleId+"/pdf/"+value1.annexId+"' target='_blank'>"+value1.annexename+"</a>";
                });
                bodyhtml += "</a></td>";

                dataPie[value.id] = {
                    label: value.name + "("+value.nbr+")" ,
                    data: value.nbr

                }
            });

            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();

        }
    });
    $.plot('#annexecommercial', dataPie, {
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
function loadNouveauContratChart()
{
    dated=$('#dated').val();
    datef=$('#datef').val();
    var dataPie = [];
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx15,
        data: "dated="+dated+"&datef="+datef,

        success: function(msg){
            dataPie[0] = {
                label: "Nouveaux contrat ("+msg.nouveau_contrat+")" ,
                data: msg.nouveau_contrat
            }
            dataPie[1] = {
                label: "Ancien contrat ("+msg.ancien_contrat+")" ,
                data: msg.ancien_contrat
            }
        }
    });

    $.plot('#nouveaucontrat', dataPie, {
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

function loadDealAnnulerChart()
{
    dated=$('#dated').val();
    datef=$('#datef').val();
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Planning</th><th>Etat</th><th>Annexe</th><th>Deal</th><th>Date publication</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx14,
        data: "dated="+dated+"&datef="+datef,

        success: function(msg){
            dataPie[0] = {
                label: "Annulé",
                data: msg.deal_annuler
            }
            dataPie[1] = {
                label: "Validé",
                data: msg.deal_valider
            }

            /*dataPie[2] = {
                label: "Total ("+msg.deal_total+")" ,
                data: msg.deal_total
            }
*/


            //$("#nombreCommandePieChartTable thead tr").html(headhtml);
            //$("#nombreCommandePieChartTable tbody").html(bodyhtml);
            //$("#nombreCommandePieChartTable").DataTable();

        }
    });

    $.plot('#dealannuler', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: function(label, series){
                        var valeur = dataPie[0].data * dataPie[1].data;
                        if(label=="Annulé")
                        {
                            var pourcentAnnuler = 100 / valeur;
                            return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;"><br/>'+Math.round(pourcentAnnuler)+'%</div>';

                        }
                        else
                        {
                            if(valeur!=0)
                                return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;"><br/>'+Math.round(100 - 100 / valeur)+'%</div>';
else
                                return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;"><br/>100%</div>';

                        }

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
function loadNombreDealChart()
{
    region = $('#region').val();
    dated=$('#dated').val();
    datef=$('#datef').val();
    etat=$('#etat').val();
    var bodyhtml="";
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'>Planning</th><th>Etat</th><th>Annexe</th><th>Deal</th><th>Date publication</th>";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx12,
        data: "etat="+etat+"&dated="+dated+"&datef="+datef+"&region=" + region,

        success: function(msg) {

            dataPie[0] = {
                label: "Pré-Planifié ("+msg.prePlanifier+")" ,
                data: msg.prePlanifier
            }
            dataPie[1] = {
                label: "Planifié ("+msg.planifie+")" ,
                data: msg.planifie
            }
            dataPie[2] = {
                label: "Rédigé("+msg.redige+")" ,
                data: msg.redige
            }
            dataPie[3] = {
                label: "Validé("+msg.valide+")" ,
                data: msg.valide
            }
            dataPie[4] = {
                label: "Annuler("+msg.annuler+")" ,
                data: msg.annuler
            }

            $.each(msg.liste, function (index, value) {
                bodyhtml +="<tr><td >"+value.planning + "</td>" +
                "<td>"+value.etat+" </td>" ;
                if(value.annexe!="null")
                bodyhtml +="<td><a href='"+value.routeAnnexe+"' target='_blank'> "+value.annexe+" </a></td>";
                else
                    bodyhtml +="<td><strong>NAN</strong></td>";
                if(value.deal!="null")

                bodyhtml +="<td><a href='"+value.routeDeal+"' target='_blank'> "+value.deal+" </a></td>";
                else
                    bodyhtml +="<td><strong>NAN</strong></td>";
                bodyhtml +="<td>"+ value.publication+" </td></tr>"
            });
            if ($.fn.dataTable.isDataTable('#nombreCommandePieChartTable')) {

                $("#nombreCommandePieChartTable").DataTable().destroy();
                $("#nombreCommandePieChartTable thead tr").html("");
                $("#nombreCommandePieChartTable tbody").html("");
            }
            $("#nombreCommandePieChartTable thead tr").html(headhtml);
            $("#nombreCommandePieChartTable tbody").html(bodyhtml);

             $("#nombreCommandePieChartTable").dataTable();

        }
    });

    $.plot('#barChart', dataPie, {
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

function loadChartPublication()
{
    dated=$('#dated').val();
    datef=$('#datef').val();
    var dataPie = [];
    var headhtml="<th nowrap='nowrap'><7 jours</th><th> < 4 jours</th>";
    var bodyhtml="";
    $.ajax({
        type: "POST",
        dataType:"json",
        url: linkajx13,
        data: "dated="+dated+"&datef="+datef,

        success: function(msg){
            dataPie[0] = {
                label: "< 7 ("+msg.semaine+")" ,
                data: msg.semaine
            }
            dataPie[1] = {
                label: "< 4 ("+msg.quatrejour+")" ,
                data: msg.quatrejour
            }


            bodyhtml +="<tr><td nowrap='nowrap'>"+msg.semaine + " </td><td>"+msg.quatrejour+" </td>"
            bodyhtml +="</tr>";
            $("#publicationPieChartTable thead tr").html(headhtml);
            $("#publicationPieChartTable tbody").html(bodyhtml);
            // $("#rm4PieChartTable").DataTable();

        }
    });

    $.plot('#publicationChart', dataPie, {
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