@php
    /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп.данные</a>
                    </li>
                </ul>
            </br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input class="form-control"
                                   id="title"
                                   name="title"
                                   type="text"
                                   minlength="3"
                                   value="{{$item->title}}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea
                                class="form-control"
                                name="content_raw"
                                id="content_raw"
                                rows="20">
                                {{old('content_raw',$item->content_raw)}}
                            </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tab">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id" class="form-control" placeholder="Выберете категорию">
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                    @if($categoryOption->id == $item->category_id) selected @endif
                                    >{{$categoryOption->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{$item->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea class="form-control" name="excerpt" id="excerpt"  rows="7">
                                {{old('excerpt', $item->excerpt)}}
                            </textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" class="form-check-input" value="1"
                            @if($item->is_published)
                               checked @endif>
                            <label class="form-check-label" for="is_published">Опубликовано</label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
