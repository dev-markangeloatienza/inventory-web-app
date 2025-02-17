<x-login-layout>
  <div class="flex h-full w-full items-center justify-center relative bg-secondary">
    {{-- <div class="absolute inset-0">
      <img src="{{ asset('images/backgrounds/login-bg-inventory.jpg') }}" alt="inventory image" class="w-full h-full object-cover opacity-60">
    </div> --}}
    <div class="relative sm:h-[70%] md:h-auto z-10 sm:w-[90%] md:w-[70%] lg:w-[60%] xl:w-[50%] flex flex-col justify-center bg-white bg-opacity-90 p-7 rounded-lg">
      <div class="flex flex-col justify-center gap-4 mb-5">
        <img src="{{ asset('images/logo-png.png') }}" alt="Mark Angelo Atienza Web Solutions" class="sm:h-auto md:h-[150px] lg:h-[200px] w-auto mx-auto">
        <h1 class="text-2xl font-bold px-5">Login</h1>
      </div>
      <form action="{{ route('auth.login') }}" method="post" class="flex flex-col px-5 gap-2">
        @csrf
        <label for="email">Email address</label>
        <input type="email" name="email" id="email" placeholder="Email" class="h-[50px] pl-2 border border-black rounded-[10px] bg-gray-standard text-xl" value="{{old('email')}}" autocomplete="off" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" class="h-[50px] pl-2 border border-black rounded-[10px] bg-gray-standard text-xl" autocomplete="off" required>
        <button type="submit" class="text-white mt-5 rounded-[10px] bg-primary border-2 border-transparent hover:border-black py-3 text-xl">Login</button>
      </form>
      @if($errors->any())
        <ul class="bg-red-100 border border-red-400 text-red-700 p-2 rounded relative text-xs text-center">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      @endif
    </div>
    
    </form>
  </div>
</x-login-layout>