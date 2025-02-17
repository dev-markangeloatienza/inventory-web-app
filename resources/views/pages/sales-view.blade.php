<x-layout>
  <x-sidebar></x-sidebar>
  <section  class="p-10 h-screen w-screen bg-gray-standard">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Sales View</h1>
      <small>View sales details and sales logs</small>
    </div>
    <div class="">
      <div class="grid grid-cols-12 gap-4">
        <div class="col-span-8">
          <table class=" w-full table-auto">
            <thead>
              <tr class="text-left">
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Processed By</th>
                <th class="px-4 py-2">Date sold</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sales as $sale)
                <tr>
                  <td class="border px-4 py-2">{{ $sale->product->name }}</td>
                  <td class="border px-4 py-2">{{ $sale->quantity }}</td>
                  <td class="border px-4 py-2">P {{ $sale->product->price }}</td>
                  <td class="border px-4 py-2">P {{ $sale->sale->total_price }}</td>
                  <td class="border px-4 py-2">{{ $sale->sale->user->name }}</td>
                  <td class="border px-4 py-2">{{ $sale->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
            
          </table>
          {{ $sales->links() }}
          
        </div>

        <div class="col-span-4 bg-white shadow-lg rounded-[10px] p-5 ">
          <h2 class="text-xl border-b-2 border-gray-standard">Sales logs</h2>
        </div>
      </div>
    </div>
  </section>
</x-layout>