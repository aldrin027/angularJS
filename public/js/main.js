var angularJS = angular.module("myApp", []),
    conn,
    monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];


angularJS.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[!!');
    $interpolateProvider.endSymbol('!!]');
});

angularJS.controller('eventsController', function ($scope, $http) {
    $http.post("{!! route('getJSONData') !!}")
        .then(function (response) {
            var data = response.data;
            $scope.programmingLanguages = data.programming_languages;
        });

});



angularJS.controller('chatsController', function ($scope, $compile) {
    $scope.myMessage = '';
    $scope.connectionStatus = 'Disconnect';
    $scope.class = 'disconnected';
    $scope.status = 'Connect';
    $scope.color = 'red';

    $('#connect').on('click', function () {

    });
    $scope.isConnected = false;

    $scope.showMessage = function() {

        $scope.myMessage = 'Connected';

        $scope.isConnected = $scope.isConnected === false;


        if($scope.isConnected)
        {
            $scope.connectionStatus = 'Connected';
            $scope.class = 'connected';
            $scope.status = 'Disconnect';
            $scope.color = 'green';

            conn = new WebSocket('ws://192.168.248.91:8080');
            conn.onopen = function () {
                var date = new Date(),
                    today = date.getFullYear() + '-' + monthNames[date.getMonth()] + '-' + date.getDay() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
                console.log({connectionStatus: "Connection Open!", dateToday: today});

            };
            $('.showChat').show();
            $('#connectedMsg').fadeOut('slow');
            $('#messageArea').slideToggle('down');

        }else{
            $scope.connectionStatus = 'Disconnected';
            $scope.class = 'disconnected';
            $scope.status = 'Connect';
            $scope.color = 'red';
            $('.showChat').hide();
            conn.close();
            conn.onclose = function (e) {
                var date = new Date(),
                    today = date.getFullYear() + '-' + monthNames[date.getMonth()] + '-' + date.getDay() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
                console.log({connectionStatus: "Connection Closed!", dateToday: today});
            };
            $('#messageArea').slideToggle('up');
        }


        $scope.showDiv = function () {
            var myEl = '<div class="chatBox">' +
                '<input class="chatMessage" type="text"/>' +
                '<button id="send" ng-click="test()">Send</button>' +
                '</div>';

            $('.showChat').html($compile(myEl)($scope));

        };



        $scope.test = function () {
            var message = $('.chatMessage').val();

            var mess = {
                message: message,
                test: 'test'
            };

            $('#messageArea').append(message + '\n');

            conn.send(message);
        };

        conn.onmessage = function (e) {
            console.log(e.data)

            $('#messageArea').append(e.data + '\n');
        };



    };


});

angularJS.directive('modalDirective', function () {
    return {
        restrict: 'E',
        replace: true,
        scope: {},
        template:
        '<div class="modal fade test" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
        '<h4 class="modal-title" id="myModalLabel">Modal title</h4>' +
        '</div>' +
        '<div class="modal-body">' +
        '...' +
        '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
        '<button type="button" class="btn btn-primary">Save changes</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
    };
});