@props([
    'users'
])
<div class="bg-white p-2 rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach ($users as $user)
            <li">
                <div class="border-gray-200 flex items-start justify-between">
                    <div>
                        {{ $user->name . " | " . $user->email }}
                    </div>
                    @if($user->role === 1)
                    <div>
                        {{-- 編集と削除 --}}
                        <x-admin.user.options :userId="$user->id">
                        </x-admin.user.options>
                    </div>
                    @else
                    <div>
                        管理者
                    </div>
                    @endif
                </div>
                <x-admin.tweet.list :user="$user"/>
            </li>
        @endforeach
    </ul>
</div>
