<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>

                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>