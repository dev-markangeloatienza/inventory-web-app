<div class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 w-1/2 sm:min-h-screen md:min-h-[300px] shadow-lg bg-white border border-transparent rounded-[10px]" id="create-product-modal">
  <form class="flex flex-col gap-4 p-10 group " action="{{route('action.products.store')}}" method="POST">
    @csrf
    <div class="flex flex-col">
      <label for="product">Product name</label>
      <input type="text" name="name" value="{{old('name')}}" id="product" class="h-10 px-2 bg-gray-standard">
    </div>
    
    <div class="flex flex-col">
      <label for="category_dropdown">Category</label>
      <select name="category_id" id="category_dropdown" value="{{old('category_id')}}" class="text-center h-10 px-2">
        <option disabled>--Select category--</option>
      </select>
    </div>

    <div class="flex flex-col">
      <label for="supplier_dropdown">Supplier</label>
      <select name="supplier_id" value="{{old('supplier_id')}}" id="supplier_dropdown" height="100" class="text-center h-10 px-2">
        <option disabled>--Select supplier--</option>
      </select>
    </div>

    <div class="flex flex-col">
      <label for="sku">SKU</label>
      <input type="text" name="sku" value="{{old('sku')}}" id="sku" class="h-10 px-2 bg-gray-standard">
    </div>

    <div class="flex flex-col">
      <label for="price">Price</label>
      <input type="number" name="price" value="{{old('price')}}" id="price" min="1" class="h-10 px-2 bg-gray-standard">
    </div>

    <div class="flex flex-col">
      <label for="stock">Stock</label>
      <input type="number" name="stock" value="{{old('stock')}}" id="stock" min="1" class="h-10 px-2 bg-gray-standard">  
    </div>

    <div class="flex justify-center gap-3">
      <button type="submit" class="py-2 px-4 border-2 rounded-[10px] border-transparent bg-primary text-white font-bold hover:border-secondary hover:bg-secondary hover:text-primary">Save</button>
      <button type="reset" data-modal-target="create-product-modal" class="modal-close-trigger py-2 px-4 border-2 rounded-[10px] border-transparent bg-secondary text-white font-bold hover:border-primary hover:bg-primary hover:text-secondary" id="close-product-modal">Close</button>
    </div>
  </form>
</div>

@push("scripts")
<script>
  (function(){

    const categoryDropdown = document.querySelectorAll('#category_dropdown');
    const supplierDropdown = document.querySelectorAll('#supplier_dropdown');
    const optionElement =  ({
      id,
      name
    })=> {
      let option = document.createElement('option')
      option.value = id
      option.textContent = name
      return option
    }

    const categoryData = fetch("{{url('/api/categories')}}")
    .then(response => response.json())
    .then(response => {
      let data = response.data
      data.map(item => {
        categoryDropdown[0].appendChild(optionElement({
          id: item.id,
          name: item.name
        }))
      });
    })
    .catch(error => {
      console.log("ERROR @ categories: ", error)
    })

    const supplierData = fetch("{{url('/api/suppliers')}}")
    .then(response => response.json())
    .then(response => {
      let data = response.data
      data.map(item => {
        supplierDropdown[0].appendChild(optionElement({
          id: item.id,
          name: item.name
        }))
      });
    })
    .catch(error => {
      console.log("ERROR @ suppliers: ", error)
    })
  
  })()
</script>
@endpush()