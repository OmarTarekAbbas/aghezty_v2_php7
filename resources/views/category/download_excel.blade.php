<div class="box-body table-responsive no-padding">
    <table class="table table-hover table-striped mt-table">
        <thead>
            <tr>
                <th>Title En</th>
            </tr>
        </thead>
        @foreach ( $categorys as $category)
        <tbody>
            <tr>
                <td> {{ $category }}</td>
        </tbody>
        @endforeach

    </table>
</div>
