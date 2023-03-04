<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Home - Udacoding</title>
    <style>
        .banner {
            height: calc(100vh - 70px);
        }

        .banner .caption {
            height: calc(100vh - 70px);
            background: rgb(248, 249, 250);
            background: linear-gradient(74deg,
                    rgba(248, 249, 250, 1) 10%,
                    rgba(222, 226, 230, 0) 100%);
        }
    </style>
</head>

<body class="font-montserrat">
    {{-- @if (Session::has('status')) --}}
    <x-alert message="{{ Session::get('message') }}Your purchase has been confirmed!"
        content="bg-green-500/70 text-white text-xl font-semibold" close="bg-green-600/50 hover:bg-green-600/70"
        icon="check" />
    {{-- @endif --}}
    <header class="h-[70px]  bg-white flex items-center">
        <div class="flex justify-between mx-auto w-10/12 items-center">
            <a href="" class="font-bold text-xl">Udacoding.</a>
            <ul class="flex items-center">
                <li>
                    <a href="#" class="font-medium p-2 px-3">Home</a>
                </li>
                <li>
                    <a href="#" class="font-medium p-2 px-3">About</a>
                </li>
                <li>
                    <a href="#" class="font-medium p-2 px-3">Contact</a>
                </li>
                @auth
                <li class="ml-3">
                    <a href="/logout"
                        class="border-green-500 border-2 p-2 bg-white hover:bg-white hover:border-green-500 px-8 text-green-500 font-medium rounded-full">Logout</a>
                </li>
                @else
                <li class="ml-3">
                    <a href="/login"
                        class="border-green-500 border-2 p-2 bg-white hover:bg-white hover:border-green-500 px-8 text-green-500 font-medium rounded-full">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </header>
    <main>
        <div class="banner relative">
            <img src="https://source.unsplash.com/random/1920x1080/?company" alt=""
                class="h-full object-cover absolute w-full" />
            <div class="caption bg-white/20 relative w-full">
                <div class="w-10/12 mx-auto flex min-h-full justify-start items-center">
                    <div class="flex flex-col gap-6">
                        <h1 class="text-5xl font-bold flex flex-col gap-2">
                            <div>Halo...!</div>
                            <div>Selamat datang</div>
                            <div>di perusahaan kami</div>
                        </h1>
                        <p class="text-2xl max-w-2xl">
                            Kami siap melayani dan membantu dengan hati
                            untuk mengembangkan bisnis yang anda inginkan
                        </p>
                        <!-- The button to open modal -->
                        <label for="my-modal"
                            class="btn btn-lg text-sm bg-green-500 px-8 rounded-full border-none hover:bg-green-600 w-fit">Berkunjung
                            Sekarang</label>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <h1 class="text-lg font-bold mb-5">Buku Tamu</h1>
            <form action="" method="POST">
                @csrf
                <div class="form-control w-full mb-3">
                    <label class="label px-0 pt-0 pb-1">
                        <span class="label-text text-xs font-semibold text-gray-500">NAMA LENGKAP</span>
                    </label>
                    <input type="text" placeholder="Type here" name="nama_lengkap"
                        class="input input-bordered w-full rounded bg-slate-50 border-slate-200 h-11 font-semibold placeholder:font-normal focus:outline-none" />
                </div>
                <div class="form-control w-full mb-3">
                    <label class="label px-0 pt-0 pb-1">
                        <span class="label-text text-xs font-semibold text-gray-500">ALAMAT</span>
                    </label>
                    <textarea name="alamat"
                        class="textarea text-base input-bordered w-full rounded bg-slate-50 border-slate-200 font-semibold placeholder:font-normal focus:outline-none"
                        placeholder="Type here"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <label class="label px-0 pt-0 pb-1">
                        <span class="label-text text-xs font-semibold text-gray-500">NO HP</span>
                    </label>
                    <input type="text" placeholder="Type here" name="no_hp"
                        class="input input-bordered w-full rounded bg-slate-50 border-slate-200 h-11 font-semibold placeholder:font-normal focus:outline-none" />
                </div>
                <div class="form-control w-full mb-3">
                    <label class="label px-0 pt-0 pb-1">
                        <span class="label-text text-xs font-semibold text-gray-500">KEGIATAN</span>
                    </label>
                    <select name="event_id" class="select select-bordered focus:outline-none">
                        <option disabled value="">Pilih Kegiatan</option>
                        @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-4">
                    <div class="form-control w-full mb-3">
                        <label class="label px-0 pt-0 pb-1">
                            <span class="label-text text-xs font-semibold text-gray-500">Tanggal</span>
                        </label>
                        <input type="date" placeholder="Type here" name="tanggal"
                            class="input input-bordered w-full rounded bg-slate-50 border-slate-200 h-11 font-semibold placeholder:font-normal focus:outline-none" />
                    </div>
                    <div class="form-control w-full mb-3">
                        <label class="label px-0 pt-0 pb-1">
                            <span class="label-text text-xs font-semibold text-gray-500">Waktu</span>
                        </label>
                        <input type="time" placeholder="Type here" name="waktu"
                            class="input input-bordered w-full rounded bg-slate-50 border-slate-200 h-11 font-semibold placeholder:font-normal focus:outline-none" />
                    </div>
                </div>
                <div class="flex justify-end items-center gap-4">
                    <div class="modal-action">
                        <label for="my-modal"
                            class="btn px-8 border-2 hover:border-green-500 border-green-500 hover:bg-white bg-white text-green-500 rounded-full">Close</label>
                    </div>
                    <div class="modal-action">
                        <button type="submit"
                            class="btn hover:bg-green-600 border-2 hover:border-green-600 text-lg font-medium normal-case px-8 rounded-full bg-green-500 border-green-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        feather.replace()

        window.onload = function() {
            document.getElementById('clickButton').click();
            setTimeout(() => {
                document.getElementById('closeButton').click();
            }, 100000);
        }
    </script>

</body>

</html>
