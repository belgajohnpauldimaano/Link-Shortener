@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">URL Shortener</div>

                <div class="panel-body">
                    <form id="js-form_url_shortener" class="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="url" class="control-label">URL</label>

                            <div class="">
                                <input id="url" type="text" class="form-control" name="url" placeholder="https://www.google.com" required>
                                <span class="help-block" id="url-error">
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-primary">Get short URL</button>
                    </form>
                    <div id="js-shortened_link" class="text-center">
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
            $('body').on('submit', '#js-form_url_shortener', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $(this).children('.form-group').removeClass('has-error');
                $('.help-block').html('');
                $.ajax({
                    url : "{{ route('urlshortener') }}",
                    type : 'POST',
                    dataType : 'JSON',
                    data : formData,
                    processData : false,
                    contentType : false,
                    success : function (res) {
                        console.log(res);
                        if (res.errCode)
                        {
                            for(var err in res.errors)
                            {
                                $('#' + err).parents('.form-group').addClass('has-error');
                                $('#' + err + '-error').html('<strong>'+ res.errors[err] +'</strong>');
                            }
                        }
                        else
                        {
                            $('#js-shortened_link').html('<a href="'+ res.shortened_url +'">'+ res.shortened_url +'</a>');
                        }
                    }
                });
            })
        });
    </script>
@endsection
