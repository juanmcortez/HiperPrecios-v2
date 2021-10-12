<div class="flex flex-wrap pb-6 z-10">
    <div class="w-full">
        <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-gray-500 rounded">
            <div class="w-full px-4 mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
                    <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                        href="{{ route('dashboard') }}">
                        {{ config('app.name') . ' ' . config('app.version') }}
                    </a>
                    <button
                        class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                        type="button">
                        <span class="block relative w-6 h-px rounded-sm bg-white"></span>
                        <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                        <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                    </button>
                </div>
                <div class="flex lg:flex-grow items-center" id="example-navbar-info">
                    <ul class="flex flex-col lg:flex-row list-none ml-auto">
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="{{ route('dashboard') }}">
                                <i class="fas fa-chart-line text-lg leading-lg text-white opacity-75 mr-2"></i>
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="{{ route('products.list') }}">
                                <i class="fas fa-gifts text-lg leading-lg text-white opacity-75 mr-2"></i>
                                {{ __('Products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="{{ route('stores.list') }}">
                                <i class="fas fa-store text-lg leading-lg text-white opacity-75 mr-2"></i>
                                {{ __('Stores') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="{{ route('categories.list') }}">
                                <i class="fas fa-clipboard-list text-lg leading-lg text-white opacity-75 mr-2"></i>
                                {{ __('Product Categories') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
