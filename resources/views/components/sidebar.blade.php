
<nav class="w-[150px] h-screen flex flex-col gap-2 border-r border-gray-standard bg-secondary py-10">
    <a href="{{ route('pages.dashboard') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.dashboard','!border-primary bg-white !text-secondary font-bold')}} ">
        <span  class="pl-1">Dashboard</span>
    </a>

    <a href="{{ route('pages.users') }}" class="px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent  hover:bg-white hover:text-secondary hover:border-primary
    {{isActive('pages.users','!border-primary bg-white !text-secondary font-bold ')}} ">
        <span  class="pl-1">Users</span>
    </a>
    
    <form action="{{ route('auth.logout')}}" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="min-w-full px-4 py-4 text-white cursor-pointer border-r-0 border-t-0 border-b-0 border-l-[15px] border-transparent hover:bg-white hover:text-secondary hover:border-primary ">Logout</button>
    </form>
</nav>
