@extends('backend.blank')
@section('content')

   <div class="m-content">        
   <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('books.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>إضافة كتاب جديد</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="book-table">
                <thead>
                    <tr>
                        <th>المسلسل</th>
                        <th>أسم الكتاب</th>
                        <th>معلومات عن الكتاب</th>
                        <th> مؤلف الكتاب </th>
                        <th> القسم </th>
                        <th> الحالة </th>
                        <th> التاريخ </th>
                        <th> - </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
@endsection
@push('js')
<script>
$(function() {
    $('#book-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('books.get') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'authors', name: 'authors' },
            { data: 'categories', name: 'categories' },
            { data: 'status', name: 'status' },
            { data: 'date', name: 'date' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush