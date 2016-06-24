var AutoRefresh = function() {

    var initAutoRefresh = function() {

        function refresh() {
            $.get('index.php', null, function(data, textStatus) {
                $("body").html(data);
            });
        }
        setInterval(refresh, 300*1000); //every 5 minutes
    }

    return {
        //main function to initiate the module

        init: function() {
            initAutoRefresh();
        }

    };

}();
