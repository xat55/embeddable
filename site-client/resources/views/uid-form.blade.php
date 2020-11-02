@extends('layouts.main')

@section('widget')
    @includeIf('widget')
@endsection

@section('content')
    <p style="margin: 0 0 15px 0;white-space: pre-line;">
        <div class="content">
            <p>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </p>
            <button onclick="location.href='/create'" type="button">Create</button>
            <h3>
                Main Page
            </h3>
            <form method="POST" action="/show" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="page_uid" required="required" placeholder="page_uid (required)"/><br/>
                <input type="text" name="title" placeholder="title"/><br/>
                <button type="submit">Submit</button>
            </form>
        </div>
    </p>
@endsection
