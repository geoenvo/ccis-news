/**
 * Created by Asus X455LA on 20/06/2016.
 */

var GenerateCharts = function() {

    var initPieChart = function() {
        var source =
        {
            datatype: "csv",
            datafields: [
                { name: 'Browser' },
                { name: 'Share' }
            ],
            url: 'http://localhost:8080/BMKG/jqwidgets/demos/sampledata/desktop_browsers_share_dec2011.txt'
        };
        var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
        // prepare jqxChart settings
        var settings = {
            title: "",
            description: "",
            enableAnimations: true,
            showLegend: true,
            showBorderLine: true,
            legendLayout: { left: 5, top: 5, width: 300, height: 200, flow: 'vertical' },
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
                                    displayText: 'Browser',
                                    labelRadius: 170,
                                    initialAngle: 15,
                                    radius: 80,
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
        $('#chartContainer').jqxChart(settings);
    }

    return {
        //main function to initiate the module

        init: function() {

            initPieChart();

        }

    };

}();
