$(function () {
    $.ajaxSetup({async: false});
    $('#iddeal').selectpicker('refresh');
    if (state_ajax == 1)
    {
        loadrfacturationun();
    }
    else if (state_ajax == 2)
    {
        loadrfacturationdeux();
    }
    else if(state_ajax == 3)
    {
        loadrfacturationdeuxca();
    }
    else if(state_ajax == 4)
    {
        loadrfacturationperf();
    }
    else if(state_ajax == 5)
    {
        loadrfacturationperfcomm();
    }
    else if(state_ajax == 6)
    {
        loadrcouponconsommer();
    }

    else if(state_ajax == 7)
    {
        loadrnouveaupartenaire();
    }

    else if(state_ajax == 8)
    {
        loadrnouveaudeal();
    }

    else if(state_ajax == 9)
    {
        loadrnouveaufacture();
    }

    else if(state_ajax == 10)
    {
        loadrnouveaufacturepaye();
    }
    else if(state_ajax == 11)
    {
        loadrfidelite();
    }
    else if(state_ajax == 12)
    {
        loadrcaisse();
    }


});

function loadrcaisse() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Date</th><th>Montant</th><th>Num Caisse</th><th>Id Deal</th><th>Type</th><th>Id Reference</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx169,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {
            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.date.date.replace('00:00:00', '') + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.montant + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.idcaisse + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.iddeal + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.typec + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.idref + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrfidelite() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Date</th><th>Montant</th><th>Id Deal</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx168,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {
            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.date.date.replace('00:00:00', '') + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.montant + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.iddeal + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrnouveaufacturepaye() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Date</th><th>Montant</th><th>Id Deal</th><th>Id Partenaire</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx167,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {
            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.date.date.replace('00:00:00', '') + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.montant + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.iddeal + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.idpart + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrnouveaufacture() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Date</th><th>Id Deal</th><th>Id Partenaire</th><th>comission HT</th><th>TVA</th><th>comission TTC</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx166,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" +  value.date.date.replace('00:00:00', '')  + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.iddeal + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.idpart + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.commht + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.tva + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.montantttc + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrnouveaufacture() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Date</th><th>Id Deal</th><th>Id Partenaire</th><th>comission HT</th><th>TVA</th><th>comission TTC</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx166,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {
            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" +  value.date.date  + " </td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.iddeal + " </td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.idpart + " </td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.commht + " </td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.tva + " </td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.montantttc + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrnouveaudeal() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>ID Deal</th><th>libellé</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx165,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.id + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.name + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrnouveaupartenaire() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>ID partenaire</th><th>libellé</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx164,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.id + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.name + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrcouponconsommer() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Nom Du Deal</th><th>Nbr de coupon consommé</th><th>Nbr de coupon non consommé</th><th>Nbr de coupon Remboursée </th><th>Nbr de coupon facturé</th><th>Nbr de coupon non facturé </th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx163,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie + "&export=non",
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.title + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.countCouponConsomme + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.countCouponNonConsomme + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.countCouponRemourser + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.countCouponFacture + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.countCouponNonFacture + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrfacturationun() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Nom Du Deal</th><th>Marchand</th><th>Montant payé</th><th>Montant non payé</th><th>Montant Total </th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx158,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie,
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td nowrap='nowrap'>" + value.title + "</td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.name + "</td>";

                    bodyhtml += "<td nowrap='nowrap'>" + value.virement + "</td>";
                    bodyhtml += "<td nowrap='nowrap'>" + value.montantnonPayecours + "</td>";




                bodyhtml += "<td nowrap='nowrap'>" + value.total + "</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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
function loadrfacturationdeux() {

    partenaire = $('#partenaire_id3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    region = $('#region').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml =
        "<th>Id </th>" +
        "<th>Deal</th>" +
        "<th>Partenaire</th>" +
        "<th>Prix</th>" +
        "<th>Com%</th>" +
        "<th>CA bigdeal</th>" +
        "<th>Achetés</th>" +
        "<th>Non Conso</th>" +
        "<th>Remb</th>" +
        "<th>Grat</th>" +
        "<th>Cp fact</th>" +
        "<th>Cp Non Fact</th>" +
        "<th>Facture OK</th>" +
        "<th>Facture KO</th>" +
        "<th>Montant OK</th>" +
        "<th>Montant F KO</th>" +
        "<th>Montant KO</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx159,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&region=" + region + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie,
        success: function (msg) {
            var totalcabigdeal=0;
            var totalfactureenattente=0;
            var totalmontantfacturee=0;
            var totalmontantnonfacturee=0;
            $.each(msg, function (index, value) {
                bodyhtml += "<tr ><td >" + value.id + "</td>";
                bodyhtml += "<td style='max-width:250px !important;' >" + value.title + "</td>";
                bodyhtml += "<td style='max-width:100px !important;' >" + value.partenaire + "</td>";
                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.price, function (index1, value1) {
                    bodyhtml +=  value1.price;
                });
                bodyhtml += "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.comm_var + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.ca + "</td>";
                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrAcheteur, function (index1, value1) {
                    bodyhtml +=  value1.nbacheteur;
                });
                bodyhtml += "</td>";

                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrNonConso, function (index1, value1) {
                    bodyhtml +=  value1.nbrNonConso;
                });
                bodyhtml += "</td>";

                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrRemboursent, function (index1, value1) {
                    bodyhtml +=  value1.nbrRemboursent;
                });
                bodyhtml += "</td>";

                bodyhtml += "<td nowrap='nowrap'>"+ value.nbrGratuite +"</td>";
                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrCouponFacture, function (index1, value1) {
                    bodyhtml +=  value1.nbrCouponFacture;
                });
                bodyhtml += "</td>";
                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrCouponNonFacture, function (index1, value1) {
                    bodyhtml +=  value1.nbrCouponNonFacture;
                });
                bodyhtml += "</td>";

                bodyhtml += "<td nowrap='nowrap'>"+ value.nbrFacturePayee +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.nbrFactureEnAttente +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.montantFactureEtPaye +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.montantFactureAttente +"</td>";

                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.montantnonPaye, function (index1, value1) {
                    bodyhtml +=  value1.montantnonPaye;
                });
                bodyhtml += "</td></tr>";

                 totalcabigdeal += parseFloat(value.ca);
                 totalfactureenattente +=parseFloat(value.nbrFactureEnAttente);
                 totalmontantfacturee +=parseFloat(value.montantFactureEtPaye);
                 totalmontantnonfacturee +=parseFloat(value.montantnonPaye);
            });

            var headhtml1 =
                "<th>CA bigdeal</th>" +
                "<th>Facture en attente</th>" +
                "<th>Montant Facturés et payés</th>" +
                "<th>Montant non payés</th>";

            var totalhtml = "";
            totalhtml += "<tr >";
            totalhtml += "<td nowrap='nowrap'>"+ totalcabigdeal.toFixed(3) + "</td>";
            totalhtml += "<td nowrap='nowrap'>"+ totalfactureenattente +"</td>";
            totalhtml += "<td nowrap='nowrap'>"+ totalmontantfacturee.toFixed(3) +"</td>";
            totalhtml += "<td nowrap='nowrap'>" + totalmontantnonfacturee.toFixed(3) + "</td></tr>";

            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();
            $("#rm4PieChartTable thead tr").html(headhtml1);
            $("#rm4PieChartTable tbody").html(totalhtml);

            // d1_4.push(total/msg.length);


        }
    });


    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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

function loadrfacturationdeuxca() {

    partenaire = $('#partenaire_id3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    region = $('#region').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml =
        "<th>Id </th>" +
        "<th>Deal</th>" +
        "<th>Partenaire</th>" +
        "<th>Prix</th>" +
        "<th>Com%</th>" +
        "<th>Achetés</th>" +
        "<th>Non Conso</th>" +
        "<th>Remb</th>" +
        "<th>Grat</th>" +
        "<th>CA bigdeal</th>" +
        "<th>CA Marchant</th>" +
        "<th>Objectif CA BigDeal</th>" +
        "<th>Objectif Realise</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx160,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&region=" + region + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie,
        success: function (msg) {
            var totalcabigdeal=0;
            var totalcamarchand=0;
            var totalmontantfacturee=0;
            var totalmontantnonfacturee=0;
            $.each(msg, function (index, value) {
                bodyhtml += "<tr ><td >" + value.id + "</td>";
                bodyhtml += "<td style='max-width:250px !important;' >" + value.title + "</td>";
                bodyhtml += "<td style='max-width:100px !important;' >" + value.partenaire + "</td>";
                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.price, function (index1, value1) {
                    bodyhtml +=  value1.price;
                });
                bodyhtml += "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.comm_var + "</td>";

                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrAcheteur, function (index1, value1) {
                    bodyhtml +=  value1.nbacheteur;
                });
                bodyhtml += "</td>";

                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrNonConso, function (index1, value1) {
                    bodyhtml +=  value1.nbrNonConso;
                });
                bodyhtml += "</td>";
                bodyhtml += "<td nowrap='nowrap'>";
                $.each(value.nbrRemboursent, function (index1, value1) {
                    bodyhtml +=  value1.nbrRemboursent;
                });
                bodyhtml += "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.nbrGratuite +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.ca + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.camarchant + "</td>";

                bodyhtml += "<td nowrap='nowrap'>"+ value.objectifCa + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.objectifRealise+ "</td>";
                bodyhtml += "</tr>";

                totalcabigdeal += parseFloat(value.ca);
                totalcamarchand +=parseFloat(value.camarchant);
            });

            var headhtml1 =
                "<th>CA bigdeal</th>" +
                "<th>CA Marchand</th>";

            var totalhtml = "";
            totalhtml += "<tr >";
            totalhtml += "<td nowrap='nowrap'>"+ totalcabigdeal.toFixed(3) + "</td>";
            totalhtml += "<td nowrap='nowrap'>" + totalcamarchand.toFixed(3) + "</td></tr>";

            $("#rm3PieChartTable thead tr").html(headhtml);
            $("#rm3PieChartTable tbody").html(bodyhtml);
            $("#rm3PieChartTable").DataTable();
            $("#rm4PieChartTable thead tr").html(headhtml1);
            $("#rm4PieChartTable tbody").html(totalhtml);

            // d1_4.push(total/msg.length);


        }
    });


    data1 = [
        {
            label: "BigFid",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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
function loadrfacturationperf() {
    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Id</th>" +
        "<th>Partenaire</th>" +
        "<th>Total Deal</th>" +
        "<th>Nbr Acheteur</th>" +
        "<th>Remboursement </th>" +
        "<th>Total Reclammation </th>" +
        "<th>Taux de réclamation </th>" +
        "<th>Ca Bigeal</th>" +
        "<th>Ca Marchant</th>";

    var bodyhtml = "";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx161,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie,
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td>" + value.id + "</td>";
                bodyhtml += "<td style='max-width:250px !important;'><a href='partner/view/"+value.id+"' target='_blank'> " + value.partenaire + "</a></td>";
                bodyhtml += "<td nowrap='nowrap'>" + value.totalDeal + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.nbrAcheteur + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.remboursement + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.reclammation +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.taux_reclammation +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.caBigeal +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.caMarchant +"</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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
function loadrfacturationperfcomm() {
    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    commercial = $('#commercial').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data
    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Partenaire</th>" +
        "<th>Annexe</th>" +
        "<th>Commission</th>" +
        "<th>Publier </th>" +
        "<th>Ca Bigeal </th>" +
        "<th>Commercial</th>";

    var bodyhtml = "";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx162,
        data: "deal=" + iddearm + "&partenaire=" + partenaire+ "&commercial=" + commercial + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie,
        success: function (msg) {

            $.each(msg, function (index, value) {
                bodyhtml += "<tr><td style='max-width:250px !important;'>" + value.partenaire + "</td>";
                bodyhtml += "<td style='max-width:250px !important;'>" + value.annexe + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.Commission + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.publier + "</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.caBigeal +"</td>";
                bodyhtml += "<td nowrap='nowrap'>"+ value.commercial +"</td></tr>";
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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
function loadRemboursements1Chart() {

    partenaire = $('#partenaire_id3').val();
    region = $('#idregion3').val();
    categorie = $('#idcategorie3').val();
    iddearm = $('#iddearm3').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");
    // generate data

    var data1 = [];
    var d1_1 = [];
    var d1_2 = [];
    var total = 0;
    var headhtml = "<th>Date</th><th nowrap='nowrap'>BIGFID</th><th>Virement</th>";
    var bodyhtml = "";

    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx6,
        data: "deal=" + iddearm + "&partenaire=" + partenaire + "&dated=" + dated + "&datef=" + datef + "&region=" + region + "&categorie=" + categorie,
        success: function (msg) {

            $.each(msg, function (index, value) {
                d1_1.push([value.jour, value.montantBigFid]);
                d1_2.push([value.jour, value.montantVirement]);
                var date = new Date(value.jour);

                bodyhtml += "<tr><td nowrap='nowrap'>" + date.getDate() + " / " + (date.getMonth() + 1) + " / " + (date.getFullYear()) + "</td>" +
                    "<td>" + value.montantBigFid + " TND</td>"
                bodyhtml += "<td>" + value.montantVirement + " TND</td></tr>"
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
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 2,
                order: 3,
                fillColor: "#AA4643"
            },
            color: "#AA4643"
        },
        {
            label: "Virement",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: 2,
                fillColor: "#89A54E"
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
                } else if (item.datapoint[0] == item.series.data[1][3]) {
                    originalPoint = item.series.data[1][0];
                } else if (item.datapoint[0] == item.series.data[2][3]) {
                    originalPoint = item.series.data[2][0];
                } else if (item.datapoint[0] == item.series.data[3][3]) {
                    originalPoint = item.series.data[3][0];
                } else if (item.datapoint[0] == item.series.data[4][3]) {
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
function chargerselectdeal3() {
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

function loadMontantCaisseChart() {
    deal = $('#iddeal').val();
    agent = $('#caisse').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");


    var ca = [],
        cac = [];
    var headhtml = "<th nowrap='nowrap'>Payé</th><th>TND</th>";
    var bodyhtml = "";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx9,
        data: "deal=" + deal + "&user=" + agent + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            var max = msg.total;
            var d1 = [[0, msg.cheque]];

            var d2 = [[1, msg.espece]];


            $.plot("#montantCaissePieChart", [{
                data: d1,
                bars: {show: true, fill: true}
                , label: "Chéque ( " + msg.cheque + " TND)"
                , color: "#00A0B0"
            }, {
                data: d2,
                bars: {show: true}
                , label: "Espéce ( " + msg.espece + " TND)"
                , color: "#6A4A3C"

            }
            ]);

            bodyhtml += "<tr><td>Espéce</td><td>" + msg.espece + " TND</td></tr>"
            bodyhtml += "<td>Chéque</td><td>" + msg.cheque + " TND</td></tr>"
            bodyhtml += "</tr>"
            $("#montantCaissePieChartTable thead tr").html(headhtml);
            $("#montantCaissePieChartTable tbody").html(bodyhtml);
            $("#montantCaissePieChartTable").DataTable();


        }
    });


}

function loadVolumeCaisseChart() {
    deal = $('#iddeal').val();
    agent = $('#agent').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var d1 = dated.split("/");
    var d2 = datef.split("/");

    var max = 100;
    var ca = [],
        cac = [];
    var headhtml = "<th nowrap='nowrap'>Payé</th><th>%</th>";
    var bodyhtml = "";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx8,
        data: "deal=" + deal + "&user=" + agent + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            var d1 = [[0, msg.cheque]];

            var d2 = [[1, msg.espece]];


            $.plot("#volumeCaissePieChart", [{
                data: d1,
                bars: {show: true, fill: true}
                , label: "Chéque ( " + msg.cheque + " %)"
                , color: "#00A0B0"
            }, {
                data: d2,
                bars: {show: true}
                , label: "Espéce ( " + msg.espece + " %)"
                , color: "#6A4A3C"

            }
            ]);

            bodyhtml += "<tr><td>Espéce</td><td>" + msg.espece + " %</td></tr>"
            bodyhtml += "<td>Chéque</td><td>" + msg.cheque + " %</td></tr>"
            bodyhtml += "</tr>"
            $("#volumeCaissePieChartTable thead tr").html(headhtml);
            $("#volumeCaissePieChartTable tbody").html(bodyhtml);
            $("#volumeCaissePieChartTable").DataTable();
        }
    });


}
function chargerselectdeal4() {
    idcategorie = $('#idcategorie4').val();
    idregion = $('#idregion4').val();
    dated = $('#dated').val();
    datef = $('#datef').val();
    var planning = "";

    $.ajax({
        type: "POST",
        url: linkajxdeal4,
        data: "idcategorie=" + idcategorie + "&partenaire_id2=" + planning + "&idregion=" + idregion + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            $("#iddearm4").html(msg)
            $('#iddearm4').selectpicker('refresh');
            loadRemboursements2Chart();


        }
    });
}
function loadRemboursements2Chart() {

    dated = $('#dated').val();
    datef = $('#datef').val();
    region = $('#idregion4').val();
    categorie = $('#idcategorie4').val();
    iddearm = $('#iddearm4').val();
    // generate data
    var dataPie = [];
    var headhtml = "<th nowrap='nowrap'>Espéce</th><th>Chéque</th><th>BigFID</th><th>GPG</th>";
    var bodyhtml = "";
    $.ajax({
        type: "POST",
        dataType: "json",
        url: linkajx7,
        data: "deal=" + iddearm + "&region=" + region + "&categorie=" + categorie + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {

            dataPie[0] = {
                label: "Espéce (" + msg.espece + ")",
                data: msg.espece
            }
            dataPie[1] = {
                label: "Chéque (" + msg.cheque + ")",
                data: msg.cheque
            }
            dataPie[2] = {
                label: "BigFid(" + msg.bigfid + ")",
                data: msg.bigfid
            }
            dataPie[3] = {
                label: "GPG(" + msg.gpg + ")",
                data: msg.gpg
            }
            bodyhtml += "<tr><th nowrap='nowrap'>" + msg.espece + " </th><td>" + msg.cheque + " </td>"
            bodyhtml += "<td>" + msg.bigfid + " </td><td>" + msg.gpg + " </td></tr>";
            $("#rm4PieChartTable thead tr").html(headhtml);
            $("#rm4PieChartTable tbody").html(bodyhtml);
            $("#rm4PieChartTable").DataTable();

        }
    });
    $.plot('#rm4PieChart', dataPie, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 1,
                    formatter: function (label, series) {
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;"><br/>' + Math.round(series.percent) + '%</div>';
                    },
                    background: {opacity: 0.8}
                }
            }
        },
        legend: {
            show: true,
            paddingBottom: "30px"
        }
    });


}
function loaddeal(id) {
    dated = $('#dated').val();
    datef = $('#datef').val();
    if (id != "") {

        $.ajax({
            type: "POST",
            url: linkajx1,
            data: "id=" + id + "&dated=" + dated + "&datef=" + datef,
            success: function (msg) {
                $("#iddeal").html(msg);
                $('#iddeal').selectpicker('refresh');
            }
        });
    }
}

function loadgraphdeal(iddeal) {
    var months = ["Coupon Vendu", "Coupon Facturé", "Coupon non facturé", "Coupon Remboursé", "Coupon en attente de rembourcement", "Remboursement annulé"];
    var minidatat = [];
    dated = $('#dated').val();
    datef = $('#datef').val();
    id = $('#iddeal').val();
    $.ajax({
        type: "POST",
        url: linkajxdealcmd,
        data: "id=" + id + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            minidatat = [{
                data: [[1, msg.cv], [2, msg.cf], [3, msg.cnf], [4, msg.cr], [5, msg.cer], [6, msg.cra]],
                color: '#33B5E5'
            }];
            // minidatat=[[1,msg.cv],[2,msg.cf],[3,msg.cnf],[4,msg.cr],[5,msg.cer],[6,msg.cra]];
        }
    });

    // Bars
    $.plot($('#barChart'), minidatat, {
        series: {
            bars: {
                show: true,
                barWidth: .8,
                align: 'center'
            },
            shadowSize: 1
        },
        grid: {
            color: 'rgba(0,0,0, .3)',
            borderColor: 'rgba(0,0,0, .3)',
            borderWidth: 1,
            hoverable: true
        },
        xaxis: {
            ticks: [[1, "CV"], [2, "CF"], [3, "CNF"], [4, "CR"], [5, "CER"], [6, "CRA"]],
            tickColor: 'transparent',
            tickDecimals: 2
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        }
    });

    var previousPoint = null;

    $('#barChart').bind('plothover', function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                $('#tooltip').remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];
                showTooltip(item.pageX, item.pageY, months[x - 1] + '<br/>' + '<strong class="cyanText">' + y + '</strong>' + ' ' + 'coupons');
            }
        } else {
            $('#tooltip').remove();
            previousPoint = null;
        }
    });
    loadgraphdeal2(iddeal)
}
function loadgraphdeal2(iddeal) {
    var months = ["Coupon Vendu", "Coupon Facturé", "Coupon non facturé", "Coupon Remboursé", "Coupon en attente de rembourcement", "Remboursement annulé"];
    var minidatat = [];
    dated = $('#dated').val();
    datef = $('#datef').val();
    id = $('#iddeal').val();
    $.ajax({
        type: "POST",
        url: linkajx2deal,
        data: "id=" + id + "&dated=" + dated + "&datef=" + datef,
        success: function (msg) {
            minidatat = [{
                data: [[1, msg.cv], [2, msg.cf], [3, msg.cnf], [4, msg.cr], [5, msg.cer], [6, msg.cra]],
                color: '#33B5E5'
            }];
            // minidatat=[[1,msg.cv],[2,msg.cf],[3,msg.cnf],[4,msg.cr],[5,msg.cer],[6,msg.cra]];
        }
    });


    // Bars
    $.plot($('#barChart2'), minidatat, {
        series: {
            bars: {
                show: true,
                barWidth: .8,
                align: 'center'
            },
            shadowSize: 1
        },
        grid: {
            color: 'rgba(0,0,0, .3)',
            borderColor: 'rgba(0,0,0, .3)',
            borderWidth: 1,
            hoverable: true
        },
        xaxis: {
            ticks: [[1, "CV"], [2, "CF"], [3, "CNF"], [4, "CR"], [5, "CER"], [6, "CRA"]],
            tickColor: 'transparent',
            tickDecimals: 2
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 0,
            min: -0
        }
    });

    var previousPoint = null;

    $('#barChart2').bind('plothover', function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                $('#tooltip').remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];
                showTooltip(item.pageX, item.pageY, months[x - 1] + '<br/>' + '<strong class="cyanText">' + y + '</strong>' + ' ' + ' TND');
            }
        } else {
            $('#tooltip').remove();
            previousPoint = null;
        }
    });
}
function showTooltip(x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        top: y - 16,
        left: x + 20
    }).appendTo('body').fadeIn();
};