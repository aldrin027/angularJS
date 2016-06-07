<div class="chat" style="position: relative; float:right;" ng-controller="chatsController">

    <div class="connection">
        <span id="connectedMsg">[!! myMessage !!]</span>
    </div>

    <div class="showChat">[!! showDiv() !!]</div>


    <div id="status">
        <button id="#connect" ng-click="showMessage()">[!! status !!]</button>
        <div class="iconTextStatus" style="float: right;">
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="5" stroke="black" stroke-width="1" fill="[!! color !!]" />
            </svg>
            <span style="float: right; clear: both;">[!! connectionStatus !!]</span>
        </div>
    </div>
    {{--ng-class="class"--}}
</div>