@if (Session::has('message-success'))
    <div class="row">
        <div class="alert important alert-success" role="alert" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="text-center" style="margin: 0px">{{ Session::get('message-success') }}</h4>
        </div>
    </div>
@elseif( Session::has('message-warning'))
    <div class="row">
        <div class="alert important alert-warning" role="alert" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="text-center" style="margin: 0px">{{ Session::get('message-warning') }}</h4>
        </div>
    </div>
@elseif( Session::has('message-danger'))
    <div class="row">
        <div class="alert important alert-danger" role="alert" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="text-center" style="margin: 0px">{{ Session::get('message-danger') }}</h4>
        </div>
    </div>
@endif
