<x-app-layout>
    <h1>รายงานระบบ</h1>
    <p>จำนวนผู้ใช้ทั้งหมด: {{ $totalUsers }}</p>
    <h3>จำนวนผู้ใช้แยกตาม Role</h3>
    <ul>
        @foreach($byRole as $role => $users)
            <li>{{ $role }}: {{ $users->count() }}</li>
        @endforeach
    </ul>
</x-app-layout>
