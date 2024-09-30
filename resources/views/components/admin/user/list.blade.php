@props([
    'users'
])
{{-- <div class="bg-blue-100 p-2 rounded-md shadow-lg mt-5 mb-5"> --}}
<div>
    <ul>
        @foreach ($users as $user)
        <li class="border-transparent px-2 py-2 items-start bg-blue-50 shadow-lg rounded-xl">
            <div class="border-gray-200 flex items-start justify-between">
                <div class="text-slate-700">
                    <p class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 15" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>&nbsp;{{ $user->name }}
                    </p>
                    <p class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 15" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>&nbsp;{{ $user->email }}
                    </p>
                </div>
                @if($user->role === 1)
                <div class="p-1">
                    {{-- 編集と削除 --}}
                    <x-admin.user.options :userId="$user->id">
                    </x-admin.user.options>
                </div>
                @else
                <div class="text-slate-700">
                    管理者
                </div>
                @endif
            </div>
            <x-admin.tweet.list :user="$user"/>
        </li>
        <div class="pb-1 last:pb-0">

        </div>
        @endforeach
    </ul>
</div>
