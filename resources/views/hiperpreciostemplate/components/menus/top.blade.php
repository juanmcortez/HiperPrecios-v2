<div class="z-10 flex flex-wrap pb-6">
    <div class="w-full">
        <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-gray-500 rounded">
            <div class="flex flex-wrap items-center justify-between w-full px-4 mx-auto">
                <div class="relative flex justify-between w-full px-4 lg:w-auto lg:static lg:block lg:justify-start">
                    <a class="inline-block py-2 mr-4 text-sm font-bold leading-relaxed text-white uppercase whitespace-nowrap"
                        href="{{ route('dashboard') }}">
                        {{ config('app.name') . ' ' . config('app.version') }}
                    </a>
                    <button
                        class="block px-3 py-1 text-xl leading-none bg-transparent border border-transparent border-solid rounded outline-none cursor-pointer lg:hidden focus:outline-none"
                        type="button">
                        <span class="relative block w-6 h-px bg-white rounded-sm"></span>
                        <span class="relative block w-6 h-px mt-1 bg-white rounded-sm"></span>
                        <span class="relative block w-6 h-px mt-1 bg-white rounded-sm"></span>
                    </button>
                </div>
                <div class="flex items-center lg:flex-grow" id="example-navbar-info">
                    <ul class="flex flex-col ml-auto list-none lg:flex-row">
                        <li class="nav-item">
                            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
                                href="{{ route('dashboard') }}">
                                <i class="mr-2 text-lg text-white opacity-75 fas fa-chart-line leading-lg"></i>
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
                                href="{{ route('products.list') }}">
                                <i class="mr-2 text-lg text-white opacity-75 fas fa-gifts leading-lg"></i>
                                {{ __('Products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
                                href="{{ route('categories.list') }}">
                                <i class="mr-2 text-lg text-white opacity-75 fas fa-clipboard-list leading-lg"></i>
                                {{ __('Products Categories') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
                                href="{{ route('brands.list') }}">
                                <i class="mr-2 text-lg text-white opacity-75 fas fa-industry leading-lg"></i>
                                {{ __('Products Brands') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
                                href="{{ route('stores.list') }}">
                                <i class="mr-2 text-lg text-white opacity-75 fas fa-store leading-lg"></i>
                                {{ __('Stores') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
