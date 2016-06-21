
var MediaShareCharts = function() {

    var initMediaShareChart = function() {
        var source =
        {
            datatype: "csv",
            datafields: [
                { name: 'Media' },
                { name: 'Share' }
            ],
            url: 'http://localhost:8080/hore/mediashare.txt'
        };
        var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
        // prepare jqxChart settings
        var settings = {
            title: "Media share",
            description: "imm.today",
            enableAnimations: true,
            showLegend: true,
            showBorderLine: true,
            legendLayout: { left: 10, top: 10, width: 300, height: 200, flow: 'vertical' },
            padding: { left: 5, top: 5, right: 5, bottom: 5 },
            titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
            source: dataAdapter,
            colorScheme: 'scheme03',
            seriesGroups:
                [
                    {
                        type: 'pie',
                        showLabels: true,
                        series:
                            [
                                {
                                    dataField: 'Share',
                                    displayText: 'Media',
                                    labelRadius: 170,
                                    initialAngle: 15,
                                    radius: 100,
                                    centerOffset: 0,
                                    formatFunction: function (value) {
                                        if (isNaN(value))
                                            return value;
                                        return parseFloat(value) + '%';
                                    },
                                }
                            ]
                    }
                ]
        };
        // setup the chart
        $('#mediashare').jqxChart(settings);
    }
    
    return {
        //main function to initiate the module

        init: function() {
            initMediaShareChart();
        }

    };

}();

