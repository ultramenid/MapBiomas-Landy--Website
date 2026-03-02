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
    <div class="bg-tabs-active bg-tabs-non "> </div>

    {{-- heroPage --}}

    <div class="">
        <img src="{{ asset('assets/landy-hero.jpeg') }}" alt="Mapbiomas Indonesia - Fire" class=" mt-2 z-10 sm:h-[45vh] h-[30vh] w-full object-top object-cover">
    </div>

    <div class="sm:px-0 px-4">
        <div x-data="{ tabs: 'karakteristik' }" class="max-w-3xl  mx-auto bg-white relative  -mt-20 z-20 rounded sm:px-6 px-4 sm:py-12 py-4 border-b border-landy min-h-[40vh] text-[15px]">
            <a class="text-3xl font-semibold capitalize">Methodology & ATBD</a>
            <p class="mt-4 sm:text-base text-sm">{{__('The sections below describe the characteristics, networks, and a brief summary of the methodology applied by MapBiomas Indonesia to produce a time-series of land-use and land-cover data showing annual transitions over the collection period.') }}</p>
            <p class="mt-4">{{__('The applied methodology is presented in the') }}
                @if (app()->getLocale() == 'id')
                    <a href="{{ asset('assets/files/ATBD Mapbiomas ID Col 4.1.pdf') }}"
                @else
                    <a href="{{ asset('assets/files/ATBD Mapbiomas ID Col 4.1 EN.pdf') }}"
                @endif

            class="underline font-bold">Algorithm Theoretical Basis Documents (ATBD)</a> </p>
            <div class="relative z-10 max-w-6xl mx-auto mt-12" >
                <!-- Tabs -->
                <div class="grid sm:grid-cols-3 grid-cols-1 sm:gap-4 gap-2 ">
                    <div :class="tabs === 'karakteristik' ? 'bg-tabs-active' : 'bg-tabs-non'" class="py-4 px-6 w-full cursor-pointer" @click="tabs = 'karakteristik'">
                        <a  class="flex justify-center font-bold  text-[#62a5bc] text-sm">
                            {{__('General Characteristics') }}
                        </a>
                    </div>
                    <div :class="tabs === 'jejaring' ? 'bg-tabs-active' : 'bg-tabs-non'" class="py-4 px-6 w-full cursor-pointer" @click="tabs = 'jejaring'">
                        <a  class="flex justify-center font-bold  text-[#62a5bc] text-sm">
                            {{__('Network') }}
                        </a>
                    </div>
                    <div :class="tabs === 'tahapan' ? 'bg-tabs-active' : 'bg-tabs-non'" class="py-4 px-6 w-full cursor-pointer" @click="tabs = 'tahapan'">
                        <a  class="flex justify-center font-bold  text-[#62a5bc] text-sm">
                            {{__('Methodology Stages') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="py-6 px-4 mt-2" style="background-color: #eeedbd;">
                {{-- karakteristik --}}
                <div class="" x-cloak style="display: none !important; color: #7f8282;" x-show="tabs === 'karakteristik'">
                    <p >{!!__('Land-use and land-cover maps of MapBiomas Indonesia were produced by applying a pixel-based approach on Landsat images. Machine-learning algorithms were developed to analyze the images using the tremendous cloud processing capacity provided by the Google Earth Engine.') !!}</p>
                    <div class="flex  justify-between items-center w-full mt-4">
                        <div class="flex flex-col justify-center items-center w-full">
                            <img src=" {{ asset('assets/atbd/1.png') }}" alt="" width="100px" height="100px" />
                            <a class="mt-4">{{__('Collection of Landsat Images') }}</a>
                            <a class="text-xs">({{__('30-meter resolution') }})</a>
                        </div>
                        <div class="flex flex-col justify-center items-center w-full">
                            <img src="{{ asset('assets/atbd/2.png') }}" alt="" width="100px" height="100px" />
                            <a class="mt-4">{{__('Pixel by Pixel Processing') }}</a>
                            <a class="text-xs">({{__('30 x 30 Meters') }})</a>
                        </div>
                        <div class="flex flex-col justify-center items-center w-full">
                            <img src="{{ asset('assets/atbd/3.png') }}" alt="" width="100px" height="100px" />
                            <a class="mt-4">{{__('Cloud Processing') }}</a>
                        </div>
                    </div>
                </div>

                {{-- jejaring --}}
                <div class="" x-cloak style="display: none !important; color: #7f8282;" x-show="tabs === 'jejaring'">
                    <p >{!!__('Following a series of discussions with technical experts from within Indonesia and from MapBiomas Brazil, the Mapiomas Indonesia team decided to classify 13 types of land-use and land-cover to be mapped, consisting 5 classes for basic themes and 8 classes for cross-cut themes.') !!}</p>
                    <p class="mt-4">
                        {!!__('The Indonesia team was divided into the core team and the regional team. The analysis for the basic themes was under the regional team’s responsibility being done by 9 of the civil society organizations. Meanwhile, the cross-cut themes were handled by the Auriga Nusantara and Woods & Wayside International.') !!}
                    </p>
                    @if (app()->getLocale() == 'id')
                        <img src="{{ asset('assets/atbd/jejaringID.png') }}" alt="mapbiomas indonesia network" class="w-full mt-12">

                    @else
                        <img src="{{ asset('assets/atbd/jejaringEN.png') }}" alt="mapbiomas indonesia network" class="w-full mt-12">
                    @endif
                </div>

                {{-- tahapan --}}
                <div class="flex flex-col gap-2" x-cloak style="display: none !important; color: #7f8282;" x-show="tabs === 'tahapan'">
                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{mosaik:false}'>
                        <div class="flex justify-between cursor-pointer " @click="mosaik = !mosaik">
                            <a style="color: #62a5bc;"> {{__('Mosaic Mapbiomas') }} </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="mosaik" x-cloak style="display: none !important; color: #7f8282;" class="py-2">
                            <p>{!!__('MapBiomas Mosaics are created from a collection of all available Landsat scenes within a particular unit of a grid during a certain period. From these, the best images for each pixel were selected to be combined into a Landsat grid. Each unit, or module, of the grid covered an area of 1<sup>o</sup> latitude x 1.5<sup>o</sup>; longitude with a total of 286 modules to cover all of Indonesia. A grid-based approach was run for every year during 2000-2022 to create the mosaics. The process used to create the MapBiomas Mosaics is briefly illustrated below:') !!}</p>

                             @if (app()->getLocale() == 'id')
                                <img class="mt-4" src="{{ asset('assets/atbd/1-1 mosaic-for-1-year_id.jpg') }}" alt="" width="100%" height="100%" />

                                <img src="{{ asset('assets/atbd/1-2 mosaic for 20 years_id.jpg') }}" alt="" width="100%" height="100%" />

                            @else
                                <img class="mt-4" src="{{ asset('assets/atbd/1-1 mosaic-for-1-year_en.jpg') }}" alt="" width="100%" height="100%" />
                                <img src="{{ asset('assets/atbd/1-2 mosaic for 20 years_en.jpg') }}" alt="" width="100%" height="100%" />
                            @endif

                        </div>
                    </div>

                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{klasifikasi:false}'>
                        <div class="flex justify-between cursor-pointer " @click="klasifikasi = !klasifikasi">
                            <a style="color: #62a5bc;"> {{__('Classification') }} </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="klasifikasi" x-cloak style="display: none !important; color: #7f8282;" class="py-2">
                            <p>{!!__('To classify land-cover categories, a supervised classification process was conducted using a guided sampling process. Spectral parameters were inputted to the Random Forest algorithm, which then was used to analyze the characteristics of the samples. Once the Random Forest algorithm had been trained with the combination of spectral parameters and samples, the algorithm classified all pixels for the entire area of Indonesia. The classification process is illustrated below:') !!}</p>

                            @if (app()->getLocale() == 'id')
                                 <img class="mt-4" src="{{ asset('assets/atbd/2- classification_id.jpg') }}" alt="" width="100%" height="100%" />
                            @else
                                 <img class="mt-4" src="{{ asset('assets/atbd/2- classification_en.jpg') }}" alt="" width="100%" height="100%" />
                            @endif

                        </div>
                    </div>

                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{filter:false}'>
                        <div class="flex justify-between cursor-pointer " @click="filter = !filter">
                            <a style="color: #62a5bc;"> {{__('Spatial & Temporal Filters') }} </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="filter" x-cloak style="display: none !important; color: #7f8282;" class="py-2">
                            <p>{!!__('MapBiomas Indonesia applied a post-classification process to stabilize the data and to reduce bias once the classification process was completed. The post-classification processes included&nbsp; the use of: a spatial filter; a temporal filter; a gap-fill filter; a frequency filter; and an incident filter.') !!}</p>

                            <h1 class="italic font-semibold mt-4">Spatial Filter</h1>
                            <p>{!!__("The spatial filter was used to prevent changes in classification values in groups of pixels. The filter is made based on 'connectPixelCount' where the function would position connected pixel components with the same pixel values. This filter requires at least five connected pixels as a minimum connection value.") !!} </p>

                            @if (app()->getLocale() == 'id')
                                <img src="{{ asset('assets/atbd/3-1 spatial-filter_id.jpg') }} " alt="mapbiomas indonesia network" class="w-full mt-4">

                            @else
                                  <img class="mt-4" src="{{ asset('assets/atbd/3-1 spatial-filter_en.jpg') }} " alt="" width="100%" height="100%" />
                            @endif


                            <h1 class="italic font-semibold mt-4">Temporal Filter</h1>
                            <p>{!!__('The temporal filter was used to identify unwanted transitions occurring over three to five years. The filter would examine and change the central position of non-sequential pixels for reclassification according to prior and subsequent classes.') !!}</p>

                            @if (app()->getLocale() == 'id')
                                <img src="{{ asset('assets/atbd/3-2 temporal-filter_id.jpg') }} " alt="mapbiomas indonesia network" class="w-full mt-4">
                            @else
                                  <img class="mt-4" src="{{ asset('assets/atbd/3-2 temporal-filter_en.jpg') }} " alt="" width="100%" height="100%" />
                            @endif

                            <h1 class="italic font-semibold mt-4">Gap-Fill Filter</h1>
                            <p>{!!__("In producing Landsat mosaics, areas containing clouds or shadows were often recorded as 'no-data' during the classification process. A gap-fill filter was applied to fill areas recorded as 'no-data' with data based on the previous year's land-cover for the same pixel.") !!}</p>

                            <h1 class="italic font-semibold mt-4">Frequency Filter</h1>
                            <p>{!!__('The frequency filter considered the occurrence of a particular class across the time series. All class occurrences with a persistence of less than 10% were filtered and classified as non-class.') !!} </p>

                            <h1 class="italic font-semibold mt-4">Incident Filter</h1>
                            <p>{!!__('The incident filter was used to stabilize pixel values that changed too frequently over the 20 years. This usually occurred at boundaries between classes. Pixel values that had changed more than eight times were replaced by stable pixel values in the time series.') !!}</p>
                        </div>
                    </div>

                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{integrasi:false}'>
                        <div class="flex justify-between cursor-pointer " @click="integrasi = !integrasi">
                            <a style="color: #62a5bc;"> {{__('Integration') }} </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="integrasi" x-cloak style="display: none !important; color: #7f8282;">
                            <p class="mt-4">{{__('Regional classification products that had undergone filtering processes for each year from 2000-2022 were then integrated with cross-sectoral themes by applying a set of specific hierarchical prevalence rules.') }}</p>
                            <p>
                            <br />
                            @if (app()->getLocale() == 'id')
                                <img src="{{ asset('assets/atbd/4- Integration_id.jpg') }} " alt="mapbiomas indonesia network" class="w-full mt-4">
                            @else
                                <img src="{{ asset('assets/atbd/4- Integration_en.jpg') }} " alt="" width="100%" height="100%" />
                            @endif
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{transisi:false}'>
                        <div class="flex justify-between cursor-pointer " @click="transisi = !transisi">
                            <a style="color: #62a5bc;"> {{__('Transitions') }} </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="transisi" x-cloak style="display: none !important; color: #7f8282;">
                            <p class="mt-4">{{__('Transitions show the dynamics of land-use and land-cover change for a particular geographic area over a defined period of time. MapBiomas Indonesia analyzed the transitions based on time periods as: (a) per year, (b) per 5 years, (c) per 10 years, (d) all observed years.') }}</p>
                            <p>
                            <br />
                            @if (app()->getLocale() == 'id')
                                <img src="{{ asset('assets/atbd/5- transition_id.jpg') }} " alt="" width="100%" />
                            @else
                                <img src="{{ asset('assets/atbd/5- transition_en.jpg') }} " alt="" width="100%" />
                            @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{statistik:false}'>
                        <div class="flex justify-between cursor-pointer " @click="statistik = !statistik">
                            <a style="color: #62a5bc;"> {{__('Statistics') }} </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="statistik" x-cloak style="display: none !important; color: #7f8282;">
                            <p class="mt-4">{{__('The statistics of the defined classes were calculated based on several spatial units, such as administrative boundaries, Indonesia&rsquo;s legally-defined Forest Estate, watersheds, forest and peatland moratorium areas, and concession areas that were included in zonal statistics.') }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col border px-4 py-2" style="border-color: #62a5bc" x-data='{validasi:false}'>
                        <div class="flex justify-between cursor-pointer " @click="validasi = !validasi">
                            <a style="color: #62a5bc;"> Validation </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #62a5bc" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="validasi" x-cloak style="display: none !important; color: #7f8282;">
                            <p class="mt-4">{{__('Validation will be conducted through an accuracy analysis based on statistical techniques using independent sample points with visual interpretation for the whole of Indonesia and for all observed years. The validation process has not yet been conducted for MapBiomas Indonesia&rsquo;s Collection 1.0. Samples intended for validation are being prepared and will be applied for the next collection of MapBiomas Indonesia.') }}</p>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>


    @include('partials.footer')
@endsection
