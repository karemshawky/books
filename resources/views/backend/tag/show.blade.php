@extends('backend.blank')
@section('content')

   <div class="m-content">        
   <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('tags.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>إضافة كلمة مفتاحية جديدة</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="tag-table">
                <thead>
                    <tr>
                        <th>المسلسل</th>
                        <th>أسم القسم</th>
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
    $('#tag-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('tags.get') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush