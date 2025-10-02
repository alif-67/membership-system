<x-app-layout>
    <h1>จัดการผู้ใช้</h1>
    <a href="{{ route('admin.users.create') }}">+ เพิ่มผู้ใช้</a>
    <table>
        <tr><th>ชื่อ</th><th>Email</th><th>Role</th><th>Action</th></tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}">แก้ไข</a>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                    @csrf @method('DELETE')
                    <button type="submit">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
