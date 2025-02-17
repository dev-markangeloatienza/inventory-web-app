<div class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 w-1/3 sm:min-h-screen md:min-h-[200px] shadow-lg bg-white border border-transparent rounded-[10px]" id="create-user-modal">
  <form class="flex flex-col gap-4 p-10 group " action="{{route('action.users.store')}}" method="POST">
    @csrf
    <div class="flex flex-col">
      <label for="name_id">Name</label>
      <input type="text" name="name" id="name_id" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="email_id">Email Address</label>
      <input type="email" name="email" id="email_id" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="password">Password</label>
      <input type="password" name="password" id="password_id" class="h-10 px-2 bg-gray-standard" value="{{old('name')}}" autocomplete="false">
    </div>

    <div class="flex flex-col">
      <label for="role_dropdown">Role</label>
      <select name="role_id" value="{{old('role_id')}}" id="role_dropdown" height="100" class="text-center h-10 px-2">
        <option disabled>--Select role--</option>
      </select>
    </div>
  
    <div class="flex justify-center gap-3">
      <button type="submit" class="py-2 px-4 border-2 rounded-[10px] border-transparent bg-primary text-white font-bold hover:border-secondary hover:bg-secondary hover:text-primary">Save</button>
      <button type="reset" data-modal-target="create-user-modal" class="modal-close-trigger py-2 px-4 border-2 rounded-[10px] border-transparent bg-secondary text-white font-bold hover:border-primary hover:bg-primary hover:text-secondary" id="close-supplier-modal">Close</button>
    </div>
  </form>
</div>

@push("scripts")
  @vite(['resources/js/modalScript.js'])
  <script>
    (function(){

      const roleDropdown = document.querySelectorAll('#role_dropdown');
      const optionElement =  ({
        id,
        name
      })=> {
        let option = document.createElement('option')
        option.value = id
        option.textContent = name
        return option
      }

      const roleData = fetch("{{url('/api/roles')}}")
      .then(response => response.json())
      .then(response => {
        let data = response.data
        data.map(item => {
          console.log('role item: ', item)
          roleDropdown[0].appendChild(optionElement({
            id: item.id,
            name: (item.name).toUpperCase()
          }))
        });
      })
      .catch(error => {
        console.log("ERROR @ roles: ", error)
      })
    
    })()
  </script>
@endpush()