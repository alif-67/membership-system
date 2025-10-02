<x-app-layout>
    <h1>อนุมัติสมาชิก</h1>
    @foreach($pendingMembers as $member)
        <p>{{ $member->name }} ({{ $member->email }})
            <form method="POST" action="{{ route('staff.approve', $member) }}">
                @csrf
                <button type="submit">อนุมัติ</button>
            </form>
        </p>
    @endforeach
</x-app-layout>
