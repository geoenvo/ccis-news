
var GenerateCharts = function() {

    var initMonthlyStatisticChart = function() {
        var source =
        {
            datatype: "csv",
            datafields: [
                { name: 'Tanggal' },
                { name: 'Hit' }

            ],
            url: 'http://193.183.98.127:8002/statistik_monthly.txt'
        };
        var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
        // prepare jqxChart settings
        var settings = {
            title: "Monthly Statistic",
            description: "",
            showLegend: true,
            enableAnimations: true,
            padding: { left: 5, top: 5, right: 5, bottom: 5 },
            titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
            source: dataAdapter,
            xAxis:
            {
                dataField: 'Tanggal',
                gridLines: { visible: true },
                valuesOnTicks: false
            },
            colorScheme: 'scheme01',
            columnSeriesOverlap: false,
            seriesGroups:
                [
                    {
                        type: 'column',
                        valueAxis:
                        {
                            visible: true,
                            unitInterval: 100,
                            title: { text: 'Statistic<br>' }
                        },
                        series: [
                            { dataField: 'Hit', displayText: 'Hit count' }

                        ]
                    }
                ]
        };
        // setup the chart
        $('#monthlystatistic').jqxChart(settings);
    }

    var initYearlyStatisticChart = function() {
        var source =
        {
            datatype: "csv",
            datafields: [
                { name: 'Bulan' },
                { name: 'Hit' }

            ],
            url: 'http://193.183.98.127:8002/statistik_yearly.txt'
        };
        var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
        // prepare jqxChart settings
        var settings = {
            title: "Yearly Statistic",
            description: "",
            showLegend: true,
            enableAnimations: true,
            padding: { left: 5, top: 5, right: 5, bottom: 5 },
            titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
            source: dataAdapter,
            xAxis:
            {
                dataField: 'Bulan',
                gridLines: { visible: true },
                valuesOnTicks: false
            },
            colorScheme: 'scheme01',
            columnSeriesOverlap: false,
            seriesGroups:
                [
                    {
                        type: 'column',
                        valueAxis:
                        {
                            visible: true,
                            unitInterval: 1000,
                            title: { text: 'Statistic<br>' }
                        },
                        series: [
                            { dataField: 'Hit', displayText: 'Hit count' }

                        ]
                    }
                ]
        };
        // setup the chart
        $('#yearlystatistic').jqxChart(settings);
    }

    return {
        //main function to initiate the module

        init: function() {

            initMonthlyStatisticChart();
            initYearlyStatisticChart();
        }

    };

}();
