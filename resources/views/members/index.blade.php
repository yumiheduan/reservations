<h1>一覧画面</h1>

<table class="table">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>phone</th>
        <th>email</th>
    </tr>

    @foreach ($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->kana_name }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->email }}</td>
        </tr>
    @endforeach
</table>

@endsection
