@if ($errors->any())
    <div class="alert alert-danger" style="position: absolute; width: 300px; margin-left: 50px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif