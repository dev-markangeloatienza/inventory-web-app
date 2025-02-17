<x-layout>
  <x-sidebar></x-sidebar>
  <section  class="p-10 h-screen w-screen bg-gray-standard">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Profile View</h1>
      <small>View user details and inventory logs of user</small>
    </div>
    <div class='grid grid-cols-6'>
      <div class="col-span-2 max-h-fit shadow-lg p-5 rounded-[10px] bg-white">
        <div class="flex flex-col justify-between gap-2">
          <div class="leading-1 flex flex-col">
            <p><span class="text-2xl ">{{$data['user']->name}} </span> <small class="uppercase font-bold text-gray-500">({{$data['user']->role->name}})</small></p>
            <small class="text-gray-700">Email: {{ $data['user']->email}}</small>
            <small class="text-gray-700">Joined: {{ date('l, F j, Y',strtotime($data['user']->created_at))}}</small>
          </div>
        </div>
      </div>
      <div class="col-span-1 flex justify-center">
        
      </div>
      <div class="col-span-3 bg-white p-5 shadow-lg rounded-[10px]">
        <p class="text-2xl">Inventory Logs</p>
        <div class='max-h-[500px]'>
          <div class="flex flex-col gap-2 mt-2">
            @foreach( $data['inventory_logs'] as $log)
              <div class="grid grid-cols-3 mb-3 shadow-lg px-3 py-2">
                <div class="col-span-1">
                  <div class="flex flex-col gap-1 ">
                    <small class="text-gray-700">{{date('l, F j, Y',strtotime($log->created_at))}}</small>
                    <small class="text-gray-700">{{date('g:i A',strtotime($log->created_at))}}</small>
                  </div>

                </div>
                <div class="col-span-2 relative">
                  <div class="pl-4">
                    <p class="text-sm">Product: {{ $log->product->name}}</p>
                    <p class="text-sm">Action: {{ strtoupper($log->change_type)}}</p>
                    <p class="text-sm">Total quantity {{ $log->change_type}}: x {{ $log->quantity}}</p>
                  </div>
                </div>
              </div>
            @endforeach
            {{ $data['inventory_logs']->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>