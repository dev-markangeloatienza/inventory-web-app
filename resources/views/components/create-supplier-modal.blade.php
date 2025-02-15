<div class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 w-1/2 sm:min-h-screen md:min-h-[200px] shadow-lg bg-white border border-transparent rounded-[10px]" id="create-supplier-modal">
  <form class="flex flex-col gap-4 p-10 group " action="{{route('action.suppliers.store')}}" method="POST">
    @csrf
    <div class="flex flex-col">
      <label for="supplier">Supplier name</label>
      <input type="text" name="name" id="supplier" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="supplier_email">Email Address</label>
      <input type="email" name="email" id="supplier_email" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="supplier_contact">Supplier name</label>
      <input type="text" name="contact" id="supplier_contact" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="supplier_address">Address</label>
      <input type="text" name="address" id="supplier_address" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>
  
    <div class="flex justify-center gap-3">
      <button type="submit" class="py-2 px-4 border-2 rounded-[10px] border-transparent bg-primary text-white font-bold hover:border-secondary hover:bg-secondary hover:text-primary">Save</button>
      <button type="reset" data-modal-target="create-supplier-modal" class="modal-close-trigger py-2 px-4 border-2 rounded-[10px] border-transparent bg-secondary text-white font-bold hover:border-primary hover:bg-primary hover:text-secondary" id="close-supplier-modal">Close</button>
    </div>
  </form>
</div>