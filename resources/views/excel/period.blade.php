<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($periods as $period)
            <tr>
                <td>{{ $period->id }}</td>

                <td>{{ $period->created_at }}</td>
                <td>{{ $period->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>