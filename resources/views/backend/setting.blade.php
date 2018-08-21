@extends('backend.layouts.app')

@section('content')

<div class="container">
    @if (Session::has('status'))
        <div class="alert alert-info">
            <span>{{ Session::has('status') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.setting.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Url callback for TelegramBot</label>
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button"  class="btn btn-default dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действие <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" onclick="document.getElementById('url_callback_bot').value = '{{ url('') }}'">Вставить url</a></li>
                        <li class="nav-item"><a href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit();">Отправить url</a></li>
                        <li class="nav-item"><a href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit();">Получить информацию</a></li>
                    </ul>
                </div>
                <input type="url" name="url_callback_bot" id="url_callback_bot" value="{{ $url_callback_bot or '' }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <form action="{{ route('admin.setting.setwebhook') }}" id="setwebhook" method="POST" style="display:none;">
        {{ csrf_field() }}
        <input type="hidden" name="url" value="{{ $url_callback_bot or '' }}">
    </form>

    <form action="{{ route('admin.setting.getwebhookinfo') }}" id="getwebhookinfo" method="POST" style="display:none;">
        {{ csrf_field() }}
    </form>
</div>

@endsection