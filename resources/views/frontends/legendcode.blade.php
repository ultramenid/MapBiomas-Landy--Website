@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')

    @include('partials.navMobile')
    <div class="bg-white sticky top-0 z-50">
        @include('partials.navPC')
    </div>
    <div class="border-b-[0.4px] border-landy"></div>

    {{-- heroPage --}}

    <div class="">
        <img src="{{ asset('assets/landy-hero.jpeg') }}" alt="MapBiomas Indonesia - Landy" class=" mt-2 z-10 sm:h-[45vh] h-[30vh] w-full object-top object-cover">
    </div>

    <div class="sm:px-0 px-4">
        <div class="max-w-3xl mx-auto bg-white relative  -mt-20 z-20 rounded sm:px-6 px-4 sm:py-12 py-4 border-b border-landy min-h-[40vh]">
            <a class="text-3xl font-semibold capitalize">{{__('legend code') }}</a>
            <div class="flex mt-4 w-full">
                <div class="bg-landy-2 w-full py-4 px-4 text-center">
                    <a class="font-semibold text-xl"> {{__('Code') }}</a>
                    <ul class="list-number mt-3">
                        @if (app()->getLocale() == 'id')
                            <li>Koleksi 1 [<a href="{{ asset('assets/legendcode/Kode Legenda - Legend Code.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Koleksi 2 [<a href="{{ asset('assets/legendcode/Indonesia Coll 2_Legend Code.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Koleksi 3 [<a href="{{ asset('assets/legendcode/Kode Legenda-Legend Code.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Koleksi 4 [<a href="{{ asset('assets/legendcode/Integration and Layers MB Indonesia - Col 4 - ID.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Koleksi 4.1 [<a href="{{ asset('assets/legendcode/Integration and Layers MB Indonesia - Col 4 - ID.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>

                        @else
                            <li>Collection 1 [<a href="{{ asset('assets/legendcode/Kode Legenda - Legend Code.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 2 [<a href="{{ asset('assets/legendcode/Indonesia Coll 2_Legend Code.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 3 [<a href="{{ asset('assets/legendcode/Kode Legenda-Legend Code.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 4 [<a href="{{ asset('assets/legendcode/Integration and Layers MB Indonesia - Col 4 - EN .pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 4.1 [<a href="{{ asset('assets/legendcode/Integration and Layers MB Indonesia - Col 4 - EN .pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                        @endif

                    </ul>
                </div>
                <div class="bg-landy-2 w-full py-4 px-4 text-center">
                    <a class="font-semibold text-xl"> {{__('Description') }}</a>
                    <ul class="list-number mt-3 ">
                        @if (app()->getLocale() == 'id')
                            <li>Collection 1 [<a href="{{ asset('assets/legendcode/Deskripsi Legenda-Koleksi 1.0.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 2 [<a href="{{ asset('assets/legendcode/Indonesia Coll 2_Legend Description_BA.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 3 [<a href="{{ asset('assets/legendcode/legend_description_id.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 4 [<a href="{{ asset('assets/legendcode/Integration and Layers MB Indonesia - Col 4 - pdf Legend DESCRIP ID.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 4.1 [<a href="{{ asset('assets/files/Col 4.1 - Legend Description ID.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                        @else
                            <li>Collection 1 [<a href="{{ asset('assets/legendcode/Legend Description Collection 1.0.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 2 [<a href="{{ asset('assets/legendcode/Indonesia Coll 2_Legend Description_EN.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 3 [<a href="{{ asset('assets/legendcode/Legend_description_EN.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 4 [<a href="{{ asset('assets/legendcode/Integration and Layers MB Indonesia - Col 4 - pdf Legend DESCRIP EN.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                            <li>Collection 4.1 [<a href="{{ asset('assets/files/Col 4.1 - Legend Description EN.pdf') }}" class="underline cursor-pointer text-orange-600">Link</a>]</li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>


    @include('partials.footer')
@endsection
