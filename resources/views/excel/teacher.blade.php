<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>

                <td>{{ $teacher->created_at }}</td>
                <td>{{ $teacher->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>