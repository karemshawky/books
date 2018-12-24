<a href="{{ route('books.show', $id) }}"> <img src="{{ asset('backend/img/show.png') }}" data-skin="dark" data-toggle="tooltip" data-placement="top" title="عرض" data-original-title="عرض"> </a>

<a href="{{ route('books.edit', $id) }}"> <img src="{{ asset('backend/img/edit.png') }}" data-skin="dark" data-toggle="tooltip" data-placement="top" title="تعديل" data-original-title="تعديل"> </a>

<form action="{{ route('books.destroy', $id) }}" method="POST" style="display:inline-block">
@csrf
@method('DELETE')
    <button type="submit" style="display:contents"> <img src="{{ asset('backend/img/delete.png') }}" data-skin="dark" data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="حذف"> </button>
</form>
