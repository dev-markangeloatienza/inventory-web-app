<x-layout>
  <x-sidebar></x-sidebar>
  <section  class="p-10 h-screen w-screen bg-gray-standard">
    <p><span class="text-2xl ">{{$user->name}} </span> <small class="uppercase font-bold text-gray-500">({{$user->role->name}})</small></p>
    <div>
      
    </div>
  </section>
</x-layout>