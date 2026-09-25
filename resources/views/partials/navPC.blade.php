
<div class="max-w-6xl mx-auto px-4  ">
    <div class="lg:flex hidden justify-between px-3">
        <a></a>
        <div class="text-gray-300 px-12 py-1 bg-landy text-sm rounded-b flex space-x-4">
            <a href="{{ route(Route::currentRouteName(), 'en') }}" class=" @if(App::getLocale() == 'en') text-white @endif  ">English</a>
            <a href="{{ route(Route::currentRouteName(), 'id') }}" class="@if(App::getLocale() == 'id') text-white @endif">Indonesia</a>
        </div>
    </div>
    <div class="lg:flex hidden lg:justify-between justify-center items-center  py-2 mt-4">
        <a href="{{ route('index', [app()->getLocale()]) }}"><img src="{{ asset('assets/logo-landy.png') }}" alt="Mapbiomas Fire Indonesia" class="sm:h-12 h-10 select-none"></a>
    <div class="lg:flex hidden gap-10 items-center select-none">
        <a href="{{ route('about', [app()->getLocale()]) }}" class="text-landy">{{__('about') }}</a>
        {{-- <a href="{{ route('faq', [app()->getLocale()]) }}" class="text-landy">FAQ</a> --}}
        <a href="#" class="text-landy">FAQ</a>
        {{-- <a href="{{ route('contacts', [app()->getLocale()]) }}" class="text-landy">{{__('contact') }}</a> --}}
        <div class="flex-col flex" x-data="{pages:false}">
            <a @click="pages = ! pages" @click.away="pages=false"  class=" text-landy cursor-pointer inline-flex   items-center " >{{__('map & data') }}
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': pages, 'rotate-0': !pages}" class="w-4 ml-1 -mb-1 transition-transform duration-200 transform" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            <div class="absolute mt-8 z-20 bg-white px-2 py-2 flex flex-col  w-56 border-landy border-b text-landy" x-show="pages" x-cloak style="display: none !important">
                <a href="https://plataforma.mapbiomas.org/coverage/coverage_lclu?t[regionKey]=indonesia" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('platform/map') }}</a>
                <a href="{{ route('termsofuse', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('terms of use') }}</a>
                <a href="{{ route('statistics', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('statistics') }}</a>
                <a href="{{ route('accuracy-assessment', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('accuracy assessment') }}</a>
            </div>
        </div>

        <div class="flex-col flex" x-data="{pages:false}">
            <a @click="pages = ! pages" @click.away="pages=false"  class=" text-landy cursor-pointer inline-flex   items-center " >{{__('methodology') }}
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': pages, 'rotate-0': !pages}" class="w-4 ml-1 -mb-1 transition-transform duration-200 transform" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            <div class="absolute mt-8 z-20 bg-white px-2 py-2 flex flex-col  w-52 border-landy border-b text-landy" x-show="pages" x-cloak style="display: none !important">
                <a href="{{ route('atbd', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{_('methodology & ATBD') }}</a>
                <a href="{{ route('refmap', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('references map') }}</a>
                <a href="{{ route('gee', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">google earth engine</a>
                <a href="{{ route('glossary', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('glossary') }}</a>

            </div>
        </div>
        <a href="{{ route('newsnevent', [app()->getLocale()]) }}" class="text-landy">{{__('news & event') }}</a>
        {{-- <a href="{{ route('downloads', [app()->getLocale()]) }}" class="text-landy">{{__('downloads') }}</a> --}}
        <div class="flex-col flex" x-data="{pages:false}">
            <a @click="pages = ! pages" @click.away="pages=false"  class=" text-landy cursor-pointer inline-flex   items-center " >{{__('downloads') }}
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': pages, 'rotate-0': !pages}" class="w-4 ml-1 -mb-1 transition-transform duration-200 transform" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            <div class="absolute mt-8 z-20 bg-white px-2 py-2 flex flex-col  w-52 border-landy border-b text-landy" x-show="pages" x-cloak style="display: none !important">
                <a href="{{ route('landsatmosaics', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{_('landsat mosaics') }}</a>
                <a href="{{ route('collectionmap', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('map collection') }}</a>
                <a href="{{ route('infographics', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('infographics') }}</a>
                <a href="{{ route('legendcode', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('legend code') }}</a>
                <a href="{{ route('murals', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('mural maps') }}</a>
                <a href="{{ route('factsheet', [app()->getLocale()]) }}" class="text-sm mr-6 hover:bg-gray-200 p-1">{{__('fact sheet') }}</a>



            </div>
        </div>
    </div>
    </div>

</div>
