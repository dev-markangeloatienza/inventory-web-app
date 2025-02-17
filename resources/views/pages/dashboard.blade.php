<x-layout>
  <x-sidebar></x-sidebar>
  <section class="px-10 pt-10 h-screen w-screen bg-gray-standard">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Dashboard</h1>
      <small>Welcome to the dashboard</small>
    </div>
    <div class="grid grid-cols-2 grid-rows-4 grid-flow-col gap-4 ">
      <div class="row-span-2 bg-white p-5 shadow-lg rounded-[10px]">
        <h2 class="text-xl border-b-2 border-gray-standard mb-2">Latest Products</h2>

        <table class="table-auto w-full text-[14px]">
          <thead>
            <tr class="text-left">
              <th>SKU</th>
              <th>Product</th>
              <th>Stock</th>
              <th>Date Added</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['products'] as $product)
              <tr>
                <td>{{$product->sku}}</td>
                <td class="hover:text-blue-500 cursor-pointer">
                  <a href="{{route('pages.product.view',$product->id)}}">{{$product->name}}</a>
                </td>
                <td>{{$product->stock}}</td>
                <td>{{ date('F j, Y',strtotime($product->created_at))}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
      <div class="row-span-2 bg-white p-5 shadow-lg rounded-[10px]">
        <h2 class="text-xl border-b-2 border-gray-standard mb-2">Latest Sales items</h2>

        <table class="table-auto w-full text-[14px]">
          <thead>
            <tr class="text-left">
              <th>Reference #</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Sold Date</th>
              <th>Processed by:</th>
            </tr>
          </thead>
          {{--  --}}
          <tbody>
            @foreach ($data['sale_items'] as $sale)
              <tr>
                <td>
                  {{str_pad($sale->id,5,0, STR_PAD_LEFT)}}
                </td>
                <td>
                  <a href="{{route('pages.products.view',$sale['product']->id)}}" class="hover:text-blue-500">{{$sale['product']->name}}</a>
                </td>
                <td>{{$sale->quantity}}</td>
                <td>{{ date('F j, Y',strtotime($sale->created_at))}}</td>
                <td>
                  <a href="{{route('pages.user.show', $sale->sale->user->id)}}" class="hover:text-blue-500">
                    {{$sale->sale->user->name}}
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row-span-3 bg-white p-5 shadow-lg rounded-[10px]">
        <h2 class="text-xl border-b-2 border-gray-standard">Latest Inventory Logs</h2>

        <table class="table-auto w-full text-[14px]">
          <thead>
            <tr class="text-left">
              <th>Product</th>
              <th>Quantity</th>
              <th>Date</th>
              <th>Processed by:</th>
            </tr>
          </thead>
          {{--  --}}
          <tbody>
            @foreach ($data['inventory_logs'] as $log)
              <tr>
                <td>
                  <a href="{{route('pages.products.view',$log->product->name)}}" class="hover:text-blue-500">{{$sale['product']->name}}</a>
                </td>
                <td>
                  <span class="flex gap-2 items-center">
                    <small>{{strtoupper($log->change_type)}}</small> - {{$log->quantity}}
                  </span>
                </td>
                <td>{{ date('F j, Y',strtotime($log->created_at))}}</td>
                <td>
                  <a href="{{route('pages.user.show', $log->user->id)}}" class="hover:text-blue-500">
                    {{$log->user->name}}
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</x-layout>