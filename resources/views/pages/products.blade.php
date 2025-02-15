<x-layout>
  <x-sidebar/>
  <section  class="p-10 h-screen w-screen bg-gray-standard relative">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Products</h1>
      <small>View, select, modify or delete products.</small>
    </div>
    <div class="flex flex-col gap-4 ">
      <div class="flex gap-4 justify-end">
        <button data-button-target='create-product-modal' class="modal-trigger cursor-pointer outline-none border-none px-4 py-2 bg-secondary text-white rounded-[10px]">Add Product</button>
        <button data-button-target='create-category-modal' class="modal-trigger cursor-pointer border-none px-4 py-2 bg-secondary text-white rounded-[10px]">Add Category</button>
      </div>
      <table class="min-w-full">
        <thead>
          <tr class="text-left">
            <th class="px-4 py-2">SKU</th>
            <th class="px-4 py-2">Product Name</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2">Supplier</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Quantity</th>
            <th class="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
              <td class="border px-4 py-2">
                <a href="{{route('pages.product.view',$product->id)}}" class="text-blue-500 cursor-pointer">{{ $product->sku }}</a>
              </td>
              <td class="border px-4 py-2">
                <a href="{{route('pages.product.view',$product->id)}}" class="text-blue-500 cursor-pointer">{{ $product->name }}</a>
              </td>
              <td class="border px-4 py-2">{{ $product->category->name }}</td>
              <td class="border px-4 py-2">{{ $product->supplier->name }}</td>
              <td class="border px-4 py-2">P {{ $product->price }}</td>
              <td class="border px-4 py-2">{{ $product->stock }}</td>
              <td class="border px-4 py-2">
                <a href="" class="text-blue-500">Edit</a>
                {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500">Delete</button>
                </form> --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <x-create-product-modal/>
    <x-create-category-modal/>
    <x-alert-toaster/>
    <x-success-toaster/>
  </section>
  @push('scripts')
    @vite(['resources/js/modalScript.js'])
  @endpush
</x-layout>



