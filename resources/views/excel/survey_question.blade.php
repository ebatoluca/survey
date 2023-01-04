<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($survey_questions as $survey_question)
            <tr>
                <td>{{ $survey_question->id }}</td>

                <td>{{ $survey_question->created_at }}</td>
                <td>{{ $survey_question->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>