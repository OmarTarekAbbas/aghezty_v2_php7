<div class="box-body table-responsive no-padding">
    <table class="table table-hover table-striped mt-table">
        <thead>
            <tr>
                <th>Title En</th>
                <th>Title Ar</th>
            </tr>
        </thead>
        @foreach ($categorys as $category)
        <tbody>
            <tr>
                <td> {{ $category->title }}</td>
                <td>{{$category->getTranslation('title','ar')}}</td>
            </tr>
        </tbody>
        @endforeach

    </table>
</div>
