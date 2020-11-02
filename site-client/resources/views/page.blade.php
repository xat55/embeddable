@extends('layouts.main')

@section('widget')
    @includeIf('widget')
@endsection

@section('content')
    <p style="margin: 0 0 15px 0;white-space: pre-line;">
        <div class="content">
            <button onclick="location.href='/'" type="button">Main</button>
            <button onclick="location.href='/create'" type="button">Create</button>
            <h3>
                Title: {{ $data['title'] }}
            </h3>
            <p>
                Description: {{ $data['description'] }}
            </p>
            <p>
                Content: {{ $data['content'] }}
            </p>
        </div>
    </p>
@endsection
