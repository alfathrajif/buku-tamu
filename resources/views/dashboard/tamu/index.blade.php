@extends('dashboard.layouts.main')
@section('title', 'Tamu - Dashboard')
@section('content')
<h1 class="font-semibold text-lg mb-5">Tamu</h1>
<div class="w-full max-w-5xl px-5">
    <div class="w-full pb-4 border-b-2 flex items-end gap-5">
        <a href="/dashboard/event/create"
            class="btn rounded-none w-[150px] gap-3 justify-start bg-green-500 hover:bg-green-600 border-none normal-case">
            <i data-feather="plus"></i>
            Tambah
        </a>
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
            <div>Show</div>
            <input type="text" class="border w-34 rounded-sm outline-none px-2 py-1" placeholder="Search">
        </div>
    </div>
    <div>
        <div class="border-b-2 pb-5">
            <table class="table table-compact w-full border rounded-sm">
                <thead>
                    <tr>
                        <th class="normal-case rounded-tl-none pl-4">Kegiatan</th>
                        <th class="normal-case pl-4">Jumlah Tamu</th>
                        <th class="normal-case pl-4">PIC</th>
                        <th class="normal-case pl-4">Tanggal</th>
                        <th class="normal-case pl-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td class="font-normal pl-4 py-0">{{ $event->name }}</td>
                        <td class="font-normal pl-4 py-0">{{ $event->tamus->count() }}</td>
                        <td class="font-normal pl-4 py-0">{{ $event->pic }}</td>
                        <td class="font-normal pl-4 py-0">{{ date('d-m-Y', strtotime($event->tanggal)) }}</td>
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
                                        <a href="/dashboard/event/{{ $event->id }}"
                                            class="active:bg-green-500 justify-between hover:bg-gray-100">
                                            Detail
                                            <i data-feather="edit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="/dashboard/event/destroy/{{ $event->id }}" method="POST"
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
            </table>
            <div class="mt-5">
                {{ $events->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection
