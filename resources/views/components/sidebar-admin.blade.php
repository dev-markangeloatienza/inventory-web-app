
<nav class="w-[150px] h-screen flex flex-col gap-2 border-r border-gray-standard bg-secondary py-10">
  <a href="{{ route('pages.dashboard') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
  {{isActive('pages.dashboard','!border-primary bg-white !text-secondary font-bold')}} ">
      <span  class="pl-1">Dashboard</span>
  </a>

  <a href="{{ route('pages.user.show', auth()->user()->id) }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.user.show','!border-primary bg-white !text-secondary font-bold')}} ">
      <span  class="pl-1">Profile</span>
  </a>

  <a href="{{ route('pages.users.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.users.view','!border-primary bg-white !text-secondary font-bold')}} ">
      <span  class="pl-1">Users</span>
  </a>

  <a href="{{ route('pages.products.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.products.view','!border-primary bg-white !text-secondary font-bold')}} ">
      <span  class="pl-1">Products</span>
  </a>

  <a href="{{ route('pages.suppliers.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.suppliers.view','!border-primary bg-white !text-secondary font-bold')}} ">
      <span  class="pl-1">Suppliers</span>
  </a>

  <a href="{{ route('pages.sales.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.sales.view','!border-primary bg-white !text-secondary font-bold')}} ">
      <span  class="pl-1">Sales</span>
  </a>

  {{-- <div>
      <div class="sidebar-trigger px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary" id="users-sb-id" data-dropdown-target="users-dropdown">
          <span  class="pl-1">Users</span>
      </div>
      <div class="flex flex-col {{Route::currentRouteName() == 'pages.users.view'|| Route::currentRouteName() == 'pages.users.create' ? 'flex' : 'hidden'}} gap-2 " id="users-dropdown">
          <a href="{{ route('pages.users.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.users.view','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">View</span>
          </a>

          <a href="{{ route('pages.users.create') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.users.create','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">Create</span>
          </a>
      </div>
  </div> --}}
  {{-- TODO: Role management, depends if they want to be flexible --}}
  {{-- <div>
      <div class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary" id="roles-sb-id">
          <span  class="pl-1">Roles</span>
      </div>
      <div class="flex flex-col {{Route::currentRouteName() == 'pages.roles'|| Route::currentRouteName() == 'pages.roles' ? 'flex' : 'hidden'}} gap-2 " id="roles-dropdown">
          <a href="{{ route('pages.roles') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.roles','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">View</span>
          </a>

          <a href="{{ route('pages.users.create') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.users.create','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">Create</span>
          </a>
      </div>
  </div> --}}
  {{-- <div>
      <div class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary" id="categories-sb-id">
          <span  class="pl-1">Categories</span>
      </div>
      <div class="flex flex-col {{Route::currentRouteName() == 'pages.users.view'|| Route::currentRouteName() == 'pages.users.create' ? 'flex' : 'hidden'}} gap-2 " id="categories-dropdown">
          <a href="{{ route('pages.users.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.users.view','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">View</span>
          </a>

          <a href="{{ route('pages.users.create') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.users.create','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">Create</span>
          </a>
      </div>
  </div> --}}
{{-- 
  <div>
      <div class="sidebar-trigger px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary" id="products-sb-id" data-dropdown-target="products-dropdown">
          <span  class="pl-1">Products</span>
      </div>
      <div class="flex flex-col {{Route::currentRouteName() == 'pages.products.view'|| Route::currentRouteName() == 'pages.products.create' ? 'flex' : 'hidden'}} gap-2 " id="products-dropdown">
          <a href="{{ route('pages.products.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.products.view','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">View</span>
          </a>

          <a href="{{ route('pages.products.create') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.products.create','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">Create</span>
          </a>
      </div>
  </div>

  <div>
      <div class="sidebar-trigger px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary" id="users-sb-id" data-dropdown-target="suppliers-dropdown">
          <span  class="pl-1">Suppliers</span>
      </div>
      <div class="flex flex-col {{Route::currentRouteName() == 'pages.suppliers.view'|| Route::currentRouteName() == 'pages.suppliers.create' ? 'flex' : 'hidden'}} gap-2 " id="suppliers-dropdown">
          <a href="{{ route('pages.suppliers.view') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.suppliers.view','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">View</span>
          </a>

          <a href="{{ route('pages.suppliers.create') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
          {{isActive('pages.suppliers.create','!border-primary bg-white !text-secondary font-bold ')}} ">
              <span  class="pl-5">Create</span>
          </a>
      </div>
  </div> --}}
  
  <form action="{{ route('auth.logout')}}" method="POST" class="mt-auto">
      @csrf
      <button type="submit" class="min-w-full py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent hover:bg-white hover:text-secondary hover:border-primary ">Logout</button>
  </form>
</nav>


@push('scripts')
  <script>
      const sidebarTrigger = document.querySelectorAll('.sidebar-trigger');

      sidebarTrigger.forEach(trigger=>{
          trigger.addEventListener('click',()=>{
              let currentTargetTrigger = trigger.dataset.dropdownTarget;
              let currentDropdown = document.getElementById(currentTargetTrigger)
              currentDropdown.classList.toggle('hidden');
          })
      })
  </script>
@endpush

