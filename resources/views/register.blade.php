@extends('admin.master')
@section('content')

        <form method="post" action="{{ route('register') }}">
            @csrf
        <div class="flex justify-center items-center my-4 sm:my-8 bg-blue-50 w-96 mx-auto">
            <div class="w-full max-w-xs my-8 ">
              <form class="bg-white  rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                      Name
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="name" placeholder="Username">
                  </div>
                  @error('name')
                  <small class="text-red-600">{{ $message }}</small>
                  @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                      Email
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Enter Your Email">
                  </div>
                  @error('email')
                  <small class="text-red-600">{{ $message }}</small>
                  @enderror
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                      Phone
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="integer" name="phone" placeholder="xxxxxxxxxxxxxxx">
                  </div>
                  @error('phone')
                  <small class="text-red-600">{{ $message }}</small>
                  @enderror
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                      Address
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" type="text" name="address" placeholder="Enter Your Address">
                  </div>
                  @error('address')
                  <small class="text-red-600">{{ $message }}</small>
                  @enderror
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                  </label>
                  <input class=" border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">
                      Confirm Password
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" type="password" name="confirm_password" placeholder="******************">
                  </div>

                <div class="flex items-center justify-between">
                  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Register
                  </button>
                  <a class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-blue-800" href="{{ route('auth#loginPage') }}">
                    Login
                  </a>
                </div>
              </form>

            </div>

        </div>
        </form>
@endsection
