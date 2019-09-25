@extends('layouts.app')

@section('content')

    @if($item->exists)
            <form method="post" action="{{route('blog.admin.categories.update', $item->id) }}">
            @method('PATCH')
    @else
                    <form method="post" action="{{route('blog.admin.categories.store') }}">
    @endif
        @csrf
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">x</span>
                            </button>
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    </div>

                </div>
            @endif

            @if($message = Session::get('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                    </div>
                @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.category.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.category.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
