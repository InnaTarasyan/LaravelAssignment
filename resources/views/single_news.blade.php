@extends('base.layout')
@section('content')
    <div class="container" style="padding-top: 2%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $news->title }}</div>

                    <div class="card-body">
                        <div class="w3-container">
                            <div style="text-align: center">
                                <h4>Новость: {{ $news->title }}</h4>
                                <br/>
                                <div>
                                    {!! $news->description !!}
                                </div>
                                <br/>
                                <div>
                                    {{ Html::image(asset('/images/news/'.$news->main_image), '', ['style'=>'width:400px']) }}
                                </div>
                            </div>
                            <br/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection