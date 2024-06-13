<h1>Users</h1>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ul>

@if ($users->hasPages())
    <div class="pagination">
        {{ $users->links() }}
    </div>
@endif