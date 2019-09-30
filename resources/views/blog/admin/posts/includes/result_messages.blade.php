@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <ul>
                    @foreach($errors->all as $errorTxt)
                        <li>{{$errorTxt}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if($message = Session::get('success'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                {{$message}}
            </div>
        </div>
    </div>

@endif
