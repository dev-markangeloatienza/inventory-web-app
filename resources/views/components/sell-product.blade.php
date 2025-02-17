@props([
  'product_id',
  'current_stock',
  'product_name'
])

<div class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 w-1/3 sm:min-h-screen md:min-h-[200px] shadow-lg bg-white border border-transparent rounded-[10px]" id="create-supplier-modal">
  <form class="flex flex-col gap-4 p-10 group " action="{{route('action.purchases.store')}}" method="POST">
    @csrf
    <div class="flex flex-col">
      <label for="product_name_id">Product name</label>
      <input type="hidden" name="product_id" value="{{$product_id}}">
      <input type="text" name="name" id="product_name_id" class="h-10 px-2 bg-gray-standard" value="{{$product_name}}" autocomplete="false" disabled>
    </div>
    <div class="flex flex-col">
      <label for="cost_price">Cost price per unit</label>
      <input type="number" step="0.01" name="cost_price" id="cost_price" class="h-10 px-2 bg-gray-standard" value="{{old('cost_price')}}" placeholder="{{$product_price}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="supplier_address">Quantity</label>
      <input type="hidden" name="current_stock" value="{{$current_stock}}">
      <input type="number" name="quantity" id="quantity" class="h-10 px-2 bg-gray-standard" value="{{old('quantity')}}" autocomplete="false">
    </div>
  
    <div class="flex justify-center gap-3">
      <button type="submit" class="py-2 px-4 border-2 rounded-[10px] border-transparent bg-primary text-white font-bold hover:border-secondary hover:bg-secondary hover:text-primary">Save</button>
      <button type="reset" data-modal-target="create-supplier-modal" class="modal-close-trigger py-2 px-4 border-2 rounded-[10px] border-transparent bg-secondary text-white font-bold hover:border-primary hover:bg-primary hover:text-secondary" id="close-supplier-modal">Close</button>
    </div>
  </form>
</div>