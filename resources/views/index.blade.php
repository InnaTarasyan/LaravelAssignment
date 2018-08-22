@extends('base.layout')
@section('css')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/style.css') }}" />
@endsection
@section('content')
    <div class="container" style="padding-top: 2%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> {{ isset($text->id) ? 'Редактирование Текста' : 'Добавление Текста'  }}</div>

                    <div class="card-body">
                        {!! Form::open([ 'url' => (isset($text->id)) ? route('update') : route('store') ,'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        {!! Form::text('title',isset($text->title) ? $text->title  : old('title'), ['placeholder'=> isset($text->title) ? 'Редактировать Текст' : 'Добавить Текст']) !!}

                        {!! Form::textarea('description', isset($text->description) ? $text->description  : old('description'), ['id'=>'editor','class' => 'form-control']) !!}

                        <br/>

                        @if(isset($text->id))
                            <input type="hidden" name="_method" value="PUT">
                        @endif

                        <br/>
                        {!! Form::button('Редактировать', ['class' => 'btn btn-success','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection