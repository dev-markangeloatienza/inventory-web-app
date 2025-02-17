<x-layout>
  <x-sidebar/>
  <section  class="p-10 h-screen w-screen bg-gray-standard relative">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Product View</h1>
      <small>View product details and history</small>
    </div>
    <div class="grid grid-cols-6  gap-4">
      <div class="col-span-2 max-h-fit bg-white shadow-lg p-5  rounded-[10px]">
        <div class="flex flex-col justify-between gap-4">
          <div class="leading-1 flex flex-col">
            <p class="text-2xl">{{$data['product']->name }}</p>
            <small class="text-gray-700">SKU: {{ $data['product']->sku}}</small>
            <small class="text-gray-700">Category: {{ $data['product']->category->name }}</small>
            <small class="text-gray-700">Quantity: {{ $data['product']->stock }}</small>
            <small class="text-gray-700">Price: P{{ $data['product']->price }}</small>
          </div>

          <div class="leading-1 flex flex-col">
            <p class="text-xl"> Supplier Details</p>
            <small class="text-gray-900 text-base">{{ $data['product']->supplier->name}}</small>
            <small class="text-gray-700">Address: {{ $data['product']->supplier->address }}</small>
            <small class="text-gray-700">Email: {{ $data['product']->supplier->email }}</small>
            <small class="text-gray-700">Contact: {{ $data['product']->supplier->contact }}</small>
          </div>

          <button class="cursor-pointer modal-trigger border border-transparent px-4 py-2 bg-secondary text-white rounded-[10px] hover:bg-white hover:border-secondary hover:text-secondary" data-button-target="create-supplier-modal">Purchase product</button>
        </div>
      </div>
      <div class="col-span-1"></div>
      <div class="col-span-3  ">
        <p class="text-2xl">Product History</p>

        <div class='max-h-[500px] border-b-2 overflow-y-auto'>
          <div class="flex flex-col gap-4 mt-2">
            @foreach( $data['purchase_items'] as $item)
              <div class="grid grid-cols-3 mb-5">
                <div class="col-span-1">
                  <div class="flex flex-col gap-1 pl-3">
                    <small class="text-gray-700">{{date('l, F j, Y',strtotime($item->created_at))}}</small>
                    <small class="text-gray-700">{{date('g:i A',strtotime($item->created_at))}}</small>
                  </div>

                </div>
                <div class="col-span-2 border-2 border-y-0 border-r-0 border-l border-secondary relative">
                  <div class="pl-4">
                    <p class="text-sm">Total cost of order: P {{ $item['purchase']->total_cost}}</p>
                    <p class="text-sm">Total quantity ordered: x {{ $item->quantity}}</p>
                  </div>
                  
                </div>
                <div class='border border-x-0 border-t-0 border-b border-secondary '></div>
                <!-- Include Font Awesome (if you're using Font Awesome) -->
                
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <x-alert-toaster/>
    <x-success-toaster/>
    <x-purchase-product-modal 
      product_id="{{$data['product']->id}}"
      supplier_id="{{$data['product']->supplier->id}}"
      supplier_name="{{$data['product']->supplier->name}}"  
      current_stock="{{$data['product']->stock}}"
      product_price="{{$data['product']->price}}"
    />
  </section>

  @push('scripts')
    @vite(['resources/js/modalScript.js'])
  @endpush
</x-layout>