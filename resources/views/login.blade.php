@extends('admin.master')
@section('content')

 <form method="post" action="{{route('login')}}">
            @csrf
            <nav class="flex flex-row bg-white ">
                    <img src="{{ asset('admin/images/R.jpg') }}" class="w-16 h-14 ml-auto mb-1">
                    <h3 class="mt-1 p-2  text-xl mr-auto">Donation Information System</h3>
            </nav>
        <div class="my-32 sm:mr-10 flex justify-center items-center flex-col ">

                <div class="flex justify-center items-center  bg-white  border-4 border-indigo-400 ml-10 shadow-xl sm:w-1/4 w-auto sm:h-80 h-80 rounded-sm">
                    <div >
                        <div class="mx-32 mt-1">
                            <img src="{{ asset('admin/images/R.jpg') }}" class="sm:w-16 sm:h-16 w-10 h-10">
                        </div>
                            <h6 class="text-center  my-1 sm:text-lg text-md text-blue-900 text-mono"  >Shan State Buddhist University</h6>

                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-3">
                        <label class="block text-blue-700 text-sm font-bold mb-2 ml-4" for="email">
                            Email
                        </label>
                        <input class="shadow-md border-1 border-gray-300 rounded sm:w-11/12 w-10/12 sm:ml-4 ml-6 px-2  text-gray-700 bg-indigo-50 outline-none py-1.5 " id="username" type="email" name="email" placeholder="Enter Your Email">
                        </div>
                        @error('email')
                            <small class="text-red-700 mb-4">{{ $message }}</small>
                        @enderror
                        <div class="mt-2 mb-2">
                        <label class="block text-blue-700 text-sm font-bold mb-2 ml-4" for="password">
                            Password
                        </label>
                        <input class="shadow-md border-1 border-gray-300  rounded sm:w-11/12 w-10/12 sm:ml-4 ml-6 px-2  text-gray-700  bg-indigo-50 outline-none py-1.5 " id="password" type="password" name="password" placeholder="******************">
                        </div>
                        @error('password')
                            <small class="text-red-700 ">{{ $message }}</small>
                        @enderror
                        <div class="flex items-center justify-between sm:mt-4  sm:mb-2 ">
                        <button class="ml-10   shadow-lg bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1.5 px-3 rounded focus:outline-none " type="submit">
                            Login
                        </button>
                        <a class="mr-10  inline-block align-baseline font-bold text-sm text-indigo-500 hover:text-red-500" href="{{ route('auth#registerPage') }}">
                            Sign Up
                        </a>
                        </div>
                    </form>



                </div>
            </div>

</form>
@endsection
