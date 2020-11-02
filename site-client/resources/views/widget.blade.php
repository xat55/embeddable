
@if(session('title') && session('content') && session('description'))
    <div class="content full-height-widget" >
        <h3>
            Widget
        </h3>
        <table class="table-widget">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Title:</td>
                <td>{{ session('title') }}</td>
            </tr>
            <tr>
                <td>Content:</td>
                <td>{{ session('content') }}</td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>{{ session('description') }}</td>
            </tr>
        </table>
    </div>
@endif
