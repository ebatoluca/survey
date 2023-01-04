<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($course_categories as $course_category)
            <tr>
                <td>{{ $course_category->id }}</td>

                <td>{{ $course_category->created_at }}</td>
                <td>{{ $course_category->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>