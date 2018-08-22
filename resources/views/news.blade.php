@extends('base.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
@endsection
@section('content')
    <div class="container" style="padding-top: 2%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Новости</div>
                    @if (count($errors) > 0)
                        <div class="box error-box alert">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="w3-container">
                            <h2>Новости</h2>

                            <div style="overflow-x:auto;">
                                <table class="w3-table w3-striped">
                                    <tr>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Изображение</th>
                                        <th>URL</th>
                                        <th>Действие</th>
                                    </tr>
                                    @foreach($news as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('news.show', ['id' => $item->id]) }}">
                                                    {{ $item->title }}
                                                </a>
                                            </td>
                                            <td>
                                            {!! mb_strimwidth($item->description, 0, 50, "...")  !!}
                                            <td>
                                                <img src="{{ asset('/images/news/'.$item->main_image) }}" alt="{{$item->title}}" title="{{$item->title}}"  style="width: 20%;"/>
                                            </td>
                                            <td>
                                                <a href="{{ $item->url }}">{{ $item->url }}</a>
                                            </td>
                                            <td>
                                                <a href="{{  route('news.edit', [ 'id' => $item->id ])  }}">
                                                    <button class="button button-blue"> Редактировать </button>
                                                </a>
                                                {!! Form::open(['url' => route('news.destroy', ['id'=>$item->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                {!! Form::button('Удалить', ['class' => 'button button-red','type'=>'submit']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <br/>
                        <a href=" {{ route('news.create') }}">
                            <button class="button button-green">Добавить Новость!</button>
                        </a>
                        <br/>
                        <div class="center">
                            <div class="pagination">

                                @if($news->lastPage() > 1)
                                    @if($news->currentPage() !== 1)
                                        <a href="{{ $news->url(($news->currentPage() - 1)) }}">{!! Lang::get('pagination.previous') !!} </a>
                                    @endif

                                    @for($i = 1; $i <= $news->lastPage(); $i++)
                                        @if($news->currentPage() == $i)
                                            <a class="selected active disabled">{{ $i }}</a>
                                        @else
                                            <a href="{{ $news->url($i) }}">{{ $i }}</a>
                                        @endif
                                    @endfor

                                    @if($news->currentPage() !== $news->lastPage())
                                        <a href="{{ $news->url(($news->currentPage() + 1)) }}">{!! Lang::get('pagination.next') !!} </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection