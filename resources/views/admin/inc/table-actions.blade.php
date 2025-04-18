@if ($item->deleted_at == null)
    <div class="table_actions">
        <a href="{{ route('admin.' . $route . '.edit', $item->id) }}" type="button"
            class="btn btn-secondary btn-sm">Edit</a>
         @role('Super-admin')
            <form action="{{ route('admin.' . $route . '.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm removeItem">Delete</button>
            </form>
        @endrole
        
         @if (Route::is('admin.blogs.index'))
            <a href="{{ route('blogs.index', $item->slug) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
        @endif
    </div>
@else
    Soft Delete
@endif
