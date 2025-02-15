<x-layout>
  <x-sidebar/>
  <section  class="p-10 h-screen w-screen bg-gray-standard relative">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Purchases</h1>
      <small>View, select, modify or delete purchases.</small>
    </div>
    <div class="flex flex-col gap-4 ">
      <div class="flex gap-4 justify-end">
        <button data-button-target='create-supplier-modal' class="modal-trigger cursor-pointer outline-none border-none px-4 py-2 bg-secondary text-white rounded-[10px]">Add Supplier</button>
      </div>
      <table class="min-w-full">
        <thead>
          <tr class="text-left">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email Address</th>
            <th class="px-4 py-2">Contact Number</th>
            <th class="px-4 py-2">Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($suppliers as $supplier)
            <tr>
              <td class="border px-4 py-2">{{ $supplier->name }}</td>
              <td class="border px-4 py-2">{{ $supplier->email }}</td>
              <td class="border px-4 py-2">{{ $supplier->contact }}</td>
              <td class="border px-4 py-2">{{ $supplier->address }}</td>
            </tr>          
          @endforeach
        </tbody>
      </table>
    </div>
    <x-alert-toaster/>
    <x-success-toaster/>
  </section>
</x-layout>
