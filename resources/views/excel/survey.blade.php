<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($surveys as $survey)
            <tr>
                <td>{{ $survey->id }}</td>

                <td>{{ $survey->created_at }}</td>
                <td>{{ $survey->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>