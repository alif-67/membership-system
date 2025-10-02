<x-app-layout>
    <h1>โปรไฟล์ของฉัน</h1>
    <form method="POST" action="{{ route('member.profile.update') }}">
        @csrf
        <label>ชื่อ</label>
        <input type="text" name="name" value="{{ $user->name }}">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
        <button type="submit">บันทึก</button>
    </form>
</x-app-layout>
