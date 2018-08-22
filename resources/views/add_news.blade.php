@extends('base.layout')
@section('css')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/style.css') }}" />
@endsection
@section('content')
    <div class="container" style="padding-top: 2%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> {{ isset($news->title) ? 'Редактировать Новость' : 'Добавить Новость'  }}</div>

                    <div class="card-body">
                        {!! Form::open([ 'url' => (isset($news->id)) ? route('news.update', ['id'=>$news->id]) : route('news.store') ,'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        {!! Form::text('title',isset($news->title) ? $news->title  : old('title'), ['placeholder'=> isset($news->title) ? 'Редактировать Название' : 'Добавить Название']) !!}
                        {!! Form::text('url',isset($news->url) ? $news->url  : old('url'), ['placeholder'=> isset($news->url) ? 'Редактировать URL' : 'Добавить URL']) !!}

                        {!! Form::textarea('description', isset($news->description) ? $news->description  : old('description'), ['id'=>'editor','class' => 'form-control']) !!}

                        <br/>
                        @if(isset($news->main_image))
                            {{ Html::image(asset('/images/news/'.$news->main_image),'',['style'=>'width:200px']) }}
                        @endif
                        {!! Form::file('img', ['class' => 'filestyle','data-buttonText'=>'Загрузить Изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Загрузить Изображение"]) !!}


                        @if(isset($news->id))
                            <input type="hidden" name="_method" value="PUT">
                        @endif

                        @if(isset($news->img))
                            {!! Form::hidden('old_image',$news->image) !!}
                        @endif

                        <br/>
                        {!! Form::button('Submit', ['class' => 'btn btn-success','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>
@endsection