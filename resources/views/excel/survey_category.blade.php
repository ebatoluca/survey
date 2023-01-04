<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($survey_categories as $survey_category)
            <tr>
                <td>{{ $survey_category->id }}</td>

                <td>{{ $survey_category->created_at }}</td>
                <td>{{ $survey_category->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>