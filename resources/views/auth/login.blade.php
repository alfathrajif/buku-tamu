@extends('auth.layouts.main')
@section('content')
<div class="w-full max-w-sm">
    @if (Session::has('status'))
    <div class="alert alert-error shadow mb-3 rounded-lg">
        <div class="justify-center w-full">
            <span class="text-sm text-white font-medium">{{ Session::get('message') }}</span>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-error shadow mb-3 rounded-lg">
        <div class="justify-center w-full">
            <span class="text-sm text-white font-medium">Username dan password harap di isikan!</span>
        </div>
    </div>
    @endif
    <h1 class="mb-5 text-center font-bold text-white font text-3xl">Udacoding</h1>
    <div class="shadow bg-white rounded-lg p-6 px-7 w-full">
        <form action="" method="POST">
            @csrf
            <div class="form-control w-full mb-2">
                <label class="label px-0 pt-0 pb-1">
                    <span class="label-text font-semibold  text-gray-500">Email</span>
                </label>
                <input type="text" placeholder="Email" name="email"
                    class="input input-bordered w-full rounded bg-slate-50 border-slate-200 h-11 font-semibold placeholder:font-normal focus:outline-none" />
            </div>
            <div class="form-control w-full mb-1">
                <label class="label px-0 pt-0 pb-1">
                    <span class="label-text font-semibold  text-gray-500">Password</span>
                </label>
                <input type="password" placeholder="Password" name="password"
                    class="input input-bordered w-full rounded bg-slate-50 border-slate-200 h-11 font-semibold placeholder:font-normal focus:outline-none" />
            </div>
            <div class="flex justify-end mb-4">
                <a href="" class="text-sm font-semibold underline text-green-600">Forgot Password</a>
            </div>
            <button type="submit"
                class="btn w-full bg-green-500 hover:bg-green-600 border-none rounded-full mb-4">Login</button>
        </form>
        <div class="flex justify-center">
            <span class="text-sm font-medium">
                Don't have an account
                <a href="" class="underline text-green-600">
                    sign up
                </a>
            </span>
        </div>
    </div>
</div>
@endsection
