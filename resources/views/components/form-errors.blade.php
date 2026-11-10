@if($errors->any())
    <div style="
        color: #b91c1c;
        padding: 12px 5px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 14px;
    ">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif