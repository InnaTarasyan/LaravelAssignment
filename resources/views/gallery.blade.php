@extends('base.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container" style="padding-top: 2%">
        <div>
            {!! Form::open([ 'url' => route('gallery'), 'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            {!! Form::file('img', ['class' => 'filestyle','data-buttonText'=>'Выбрать Изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Выбрать Изображение"]) !!}
            {!! Form::button('Загрузить изображение', ['class' => 'btn btn-success','type'=>'submit']) !!}
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                           data-image="{{ asset('images/gallery/'.$image->main_image) }}"
                           data-target="#image-gallery">
                            <img class="img-thumbnail"
                                 src="{{ asset('images/gallery/'.$image->main_image) }}"
                                 alt="{{ $image->description }}">
                        </a>
                    </div>
                @endforeach
            </div>


            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/gallery.js') }}"></script>
    <script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>
@endsection
