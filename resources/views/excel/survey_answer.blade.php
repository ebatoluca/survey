<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($survey_answers as $survey_answer)
            <tr>
                <td>{{ $survey_answer->id }}</td>

                <td>{{ $survey_answer->created_at }}</td>
                <td>{{ $survey_answer->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>