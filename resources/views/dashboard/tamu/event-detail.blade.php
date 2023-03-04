@extends('dashboard.layouts.main')
@section('title', 'Tamu - Dashboard')
@section('content')
<h1 class="font-semibold text-lg mb-5">Tamu Kegiatan {{ $event->name }}</h1>
<div class="w-full max-w-5xl px-5">
    <div class="w-full pb-4 border-b-2 flex items-end gap-5">
        <form action="" class="flex gap-5 w-full">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">From</span>
                </label>
                <input type="date" placeholder="Type here"
                    class="text-sm font-semibold input input-bordered w-full rounded-none" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">To</span>
                </label>
                <input type="date" placeholder="Type here"
                    class="font-semibold text-sm input input-bordered w-full rounded-none" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Filter</span>
                </label>
                <select class="select select-bordered w-full focus:outline-none rounded-none">
                    <option disabled selected>Today</option>
                    <option value="">Han Solo</option>
                    <option value="">Greedo</option>
                </select>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Export</span>
                </label>
                <select class="select select-bordered w-full focus:outline-none rounded-none">
                    <option disabled selected>Export</option>
                    <option value="">Han Solo</option>
                    <option value="">Greedo</option>
                </select>
            </div>
        </form>
    </div>
    <div class="w-full mt-8 flex justify-between gap-5 mb-5">
        <div class="flex gap-2 text-sm items-center">
            <div>Show</div>
            <input type="text" class="border w-24 rounded-sm outline-none text-center py-1">
            <div>entries</div>
        </div>
        <div class="flex gap-2 text-sm items-center">
            <form action="">
                <div>Show</div>
                <input type="text" name="search" class="border w-34 rounded-sm outline-none px-2 py-1"
                    placeholder="Search">
            </form>
        </div>
    </div>
    <div>
        <div class="border-b-2 pb-5">
            <table class="table table-compact w-full border rounded-sm mb-4">
                <thead>
                    <tr>
                        <th class="normal-case rounded-tl-none pl-4">No</th>
                        <th class="normal-case rounded-tl-none pl-4">Nama Lengkap</th>
                        <th class="normal-case pl-4">Alamat</th>
                        <th class="normal-case pl-4">No Hp</th>
                        <th class="normal-case pl-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($tamus->count())
                    @foreach ($tamus as $tamu)
                    <tr>
                        <td class="font-normal pl-4 py-0">{{ $loop->iteration }}</td>
                        <td class="font-normal pl-4 py-0">{{ $tamu->nama_lengkap }}</td>
                        <td class="font-normal pl-4 py-0">{{ $tamu->alamat }}</td>
                        <td class="font-normal pl-4 py-0">{{ $tamu->no_hp }}</td>
                        <td class="font-normal pl-4 py-0">
                            <div class="dropdown dropdown-end py-1">
                                <label tabindex="0"
                                    class="btn bg-green-500 border-none hover:bg-green-600 p-1.5 px-3 text-white font-medium rounded-md m-1 gap-4">
                                    Action
                                    <i data-feather="chevron-down"></i>
                                </label>
                                <ul tabindex="0"
                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-10">
                                    <li>
                                        <a href="/dashboard/event/tamu/detail/{{ $tamu->id }}"
                                            class="active:bg-green-500 justify-between hover:bg-gray-100">
                                            Detail
                                            <i data-feather="edit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="/dashboard/event/tamu/destroy/{{ $tamu->id }}" method="POST"
                                            class="p-0 active:bg-white">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn border-none normal-case hover:bg-gray-100 bg-white h-full text-red-500 justify-between flex w-full">
                                                Batalkan
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>`
                        <td colspan="4" class="text-center font-semibold text-gray-400 italic">Tamu tidak ada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div>
                {{ $tamus->withQueryString()->links('pagination::tailwind') }}
            </div>
        </div>

    </div>
</div>@endsection
