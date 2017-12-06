@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">URL Visit Statistics</div>

                <div class="panel-body">
                    <form id="js-url_shortener_stats" class="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="url" class="control-label">URL</label>

                            <div class="">
                                <input id="url" type="text" class="form-control" name="url" placeholder="https://www.google.com" required>
                                <span class="help-block" id="url-error">
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-primary">Search shortened URL</button>
                    </form>
                    <br>
                    <div id="js-statistics_container">
                    </div>
                </div>
            </div>
        </div>
        {{--  <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>  --}}
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function (e) {
            $('body').on('submit', '#js-url_shortener_stats', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                
                $.ajax({
                    url : "{{ route('url_statistics.url_statistics_search') }}",
                    type : 'POST',
                    data : formData,
                    processData : false,
                    contentType : false,
                    success : function (res) {
                        $('#js-statistics_container').html(res);
                    }
                });
            })
        });
    </script>
@endsection
