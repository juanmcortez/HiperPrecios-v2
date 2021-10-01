@if (session('info') || session('success') || session('warning') || $errors->any())
<div class="absolute right-0 top-0 m-3 z-50">
    @if (session('info'))
    <div class="flex items-center justify-center bg-blue-400 border-l-4 border-blue-600 py-2 px-3 shadow-md">
        <div class="text-white rounded-full mt-0.5 mr-3"><i class="text-xl fas fa-info-circle"></i></div>
        <div class="text-white max-w-lg ">{!! session('info') !!}</div>
    </div>
    @elseif (session('success'))
    <div class="flex items-center justify-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md">
        <div class="text-white rounded-full mt-0.5 mr-3"><i class="text-xl fas fa-check-circle"></i></div>
        <div class="text-white max-w-lg ">{!! session('success') !!}</div>
    </div>
    @elseif (session('warning'))
    <div class="flex items-center justify-center bg-yellow-500 border-l-4 border-yellow-700 py-2 px-3 shadow-md">
        <div class="text-white rounded-full mt-0.5 mr-3"><i class="text-xl fas fa-exclamation-circle"></i></div>
        <div class="text-white max-w-lg ">{!! session('warning') !!}</div>
    </div>
    @elseif ($errors->any())
    <div class="flex items-start justify-center bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md">
        <div class="text-white rounded-full mt-0.5 mr-3"><i class="text-xl fas fa-times-circle"></i></div>
        <div class="text-white max-w-lg ">
            <ul>
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            </ul>
        </div>
    </div>
    @endif
</div>
@endif
