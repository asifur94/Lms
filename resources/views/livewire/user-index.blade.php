{{-- <div>
    <table class="w-full table-auto">
<tr>
    <th class="border px-4 py-2 text-left">Name</th>
    <th class="border px-4 py-2 text-left">Permissions</th>
    <th class="border px-4 py-2 text-left">Actions</th>
</tr>
@foreach ($users as $user )
<tr>
    <td class="border px-4 py-2 ">{{ $user->name }}</td>
    <td class="border px-4 py-2 ">
        @foreach ($role->$users as $user )
            <span class="px-2 py-1 bg-blue-500 text-white rounded text-sm"> {{ $user->name }}</span>
        @endforeach
    </td>

    <td class="border px-4 py-2 text-center">
        <div class="flex items-center justify-center">
            <a class="mr-2" href="{{ route('user.edit' , $user->id) }}">@include('components.icons.edit')</a>
        <form onsubmit="return comfirm(Are You Sure?);" wire:submit.prevent="roleDelete({{ $user->id }})">
            <button type="submit">
                @include('components.icons.trash')
            </button>
        </form>
        </div>
    </td>
</tr>

@endforeach
    </table>

</div> --}}
<div>
    <table class="w-full table-auto">
<tr>
    <th class="border px-4 py-2 text-left">Name</th>
    <th class="border px-4 py-2 text-left">Email</th>
    <th class="border px-4 py-2 text-left">Actions</th>
</tr>
@foreach ($users as $user )
<tr>
    <td class="border px-4 py-2 ">{{ $user->name }}</td>
    <td class="border px-4 py-2 ">
        @foreach ($users as $user )
            <span class="px-2 py-1 bg-blue-500 text-white rounded text-sm"> {{ user->email }}</span>
        @endforeach
    </td>

    <td class="border px-4 py-2 text-center">
        <div class="flex items-center justify-center">
            <a class="mr-2" href="{{ route('user.edit' , $user->id) }}">@include('components.icons.edit')</a>
        <form onsubmit="return comfirm(Are You Sure?);" wire:submit.prevent="roleDelete({{ $user->id }})">
            <button type="submit">
                @include('components.icons.trash')
            </button>
        </form>
        </div>
    </td>
</tr>

@endforeach
    </table>

</div>
