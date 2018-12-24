<a href="{{ route('tags.edit', $id) }}"> <img src="{{ asset('backend/img/edit.png') }}" data-skin="dark" data-toggle="tooltip" data-placement="top" title="تعديل" data-original-title="تعديل"> </a>

<form action="{{ route('tags.destroy', $id) }}" method="POST" style="display:inline-block">
@csrf
@method('DELETE')
    <button type="submit" style="display:contents"> <img src="{{ asset('backend/img/delete.png') }}" data-skin="dark" data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="حذف"> </button>
</form>
