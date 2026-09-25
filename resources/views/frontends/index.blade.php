@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')
    @include('partials.navMobile')

    <div class="bg-white sticky top-0 z-50">
        @include('partials.navPC')
    </div>

    <!-- border -->
     <div class="border-b-[0.4px] border-landy"></div>

     <!-- hero -->
      <div class="relative mt-2">
        <img src="{{ asset('assets/landy-hero.jpeg') }}" alt="Mapbiomas Landy - Indonesia" class="sm:h-[70vh] h-[40vh] w-full object-top object-cover relative">
        <div class="absolute sm:bottom-32 bottom-16 sm:left-[8rem] lg:left-[22rem] left-5">
            <p class="text-white sm:text-5xl text-4xl font-black mb-6 leading normal sm:w-7/12 w-full">{{__('Learning from the Past for the Future') }}</p>
            <a href="https://plataforma.mapbiomas.org/coverage/coverage_lclu?t[regionKey]=indonesia" class=" bg-landy text-white  px-4 py-1 font-semibold">{{__('Access The Platform') }}</a>

        </div>
      </div>


       <!-- content -->
       <div class="max-w-6xl mx-auto flex sm:flex-row flex-col gap-5 px-4 mt-12">
            <div class=" w-full  ">
                <a class="bg-landy px-4 py-1 text-white font-semibold capitalize">{{__('news') }}</a>
                <div class="flex flex-row  h-full   gap-4  overflow-x-auto snap-x snap-mandatory mt-4">
                    @foreach ($news as $item)
                        <!-- card -->
                        <div class="sm:flex-shrink flex-shrink-0 snap-center sm:6/12 w-full ">
                            <a href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}"  class="sm:w-7/12 w-full">
                                <img src="{{ asset('storage/files/photos/'.$item->img) }}"  alt="{{ $item->title }}" class="bg-red-200 h-96 w-full object-cover object-center" />
                            </a>

                            <a href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}" class="md:mt-6 mt-3 font-semibold flex-shrink-0 flex ">{{ $item->title }}</a>
                            <div class="mt-2 text-sm  font-light">
                                {{ $item->description }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            {{-- <div class="sm:w-3/12 w-full  ">
                <a class="bg-landy px-4 py-1 text-white font-semibold capitalize">Event</a>
                <div class=" flex flex-col gap-4 mt-4">
                    @foreach ($event as $item)
                        <!-- card -->
                        <div class="sm:flex-shrink flex-shrink-0 snap-center w-full  ">
                            <a href="{{ route('detailevent', [app()->getLocale(), $item->id, $item->slug]) }}"  class="sm:w-7/12 w-full">
                                <img src="{{ asset('storage/files/photos/'.$item->img) }}"  alt="{{ $item->title }}" class="bg-red-200 h-36 w-full" />
                            </a>
                        </div>
                    @endforeach
                </div>

            </div> --}}

       </div>

       <br>
       <!-- understand how -->
        <div class=" bg-landy-2 mt-12">
            <div class=" z-20 max-w-6xl mx-auto py-16 px-4" >
                <div class=" mb-8 w-full sm:justify-start justify-center items-center flex">
                    <a class="bg-landy p-2 text-white font-semibold sm:text-base text-xs mb-8 sm:text-left text-center ">{{__('Understand How MapBiomas Indonesia Works') }}</a>
                </div>

                <div class="flex sm:flex-row flex-col items-center space-y-4 sm:space-x-8 space-x-0 sm:flex-wrap sm:justify-center mt-8">
                    <a href="" class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_1-Mapbiomas_Mosaic.png') }}" alt="" class="w-16 h-16 inline-flex justify-center">
                        <p style="color: #7f8282;" class="mt-2 font-semibold "> {{__('Mosaic MapBiomas')}}</p>
                    </a>
                    <div class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas-Panah-Lurus.png') }}" alt="" class="w-12 -mt-6 sm:block hidden" >
                    </div>
                    <a href="" class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_2-Classification.png') }}" alt="" class="w-16 h-16 inline-flex justify-center">
                    <p style="color: #7f8282;"  class="mt-2 font-semibold "> {{__('Classification')}}</p>
                    </a>
                    <div class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas-Panah-Lurus.png') }}" alt="" class="w-12 -mt-6 sm:block hidden" >
                    </div>
                    <a href="" class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_3-Spatial_&_Temporal_Filter.png') }}" alt="" class="w-16 h-16 inline-flex justify-center">
                        <p style="color: #7f8282;" class="mt-2 font-semibold "> Filter</p>
                    </a>
                    <div class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas-Panah-Lurus.png') }}"alt="" class="w-12 -mt-6 sm:block hidden" >
                    </div>
                    <a href="" class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_4-Integration.png') }}" alt="" class="w-16 h-16 inline-flex justify-center">
                        <p style="color: #7f8282;" class="mt-2 font-semibold "> {{__('Integration')}}</p>
                    </a>
                    <div class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas-Panah-Lurus.png') }}" alt="" class="w-12 -mt-6 sm:block hidden " >
                    </div>
                    <a href="" class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_6-Spatial_Filter_Transitions.png') }}" alt="" class="w-16 h-16 inline-flex justify-center">
                        <p style="color: #7f8282;" class="mt-2 font-semibold "> {{__('Transition')}}</p>
                    </a>

                    <div class="text-center">
                        <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas-Panah-2.png') }}" alt="" class="w-20 -mt-6 transform rotate-90 sm:transform-none" >
                    </div>
                    <div class="text-center items-center flex sm:flex-col flex-row sm:space-x-0 space-x-8 ">
                        <div class="flex flex-col justify-center">
                            <a href="" class="text-center">
                                <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_icon_7.png') }}" alt="" class="sm:w-20 w-20 sm:-mt-6 -mt-0">
                            </a>
                            <a style="color: #7f8282;" class="font-semibold " > {{__('Statistics')}}</a>
                        </div>
                        <div class="flex flex-col justify-center">
                            <a href="" class="text-center">
                                <img loading="lazy" src="{{ asset('assets/methodology/MapBiomas_8-Accuracy_Analysis.png') }}" alt="" class="sm:w-20 w-20 sm:mt-6 mt-1">
                            </a>
                            <a style="color: #7f8282;" class="font-semibold" > Validation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- infographic -->
         <div class="max-w-6xl mx-auto px-4 mt-12">
            <a class="bg-landy py-2 px-2 text-white font-semibold ">Infographic</a>
            <div class="mt-4 flex flex-col gap-2">
                @if ($infographic)
                    <div class="mt-4 flex flex-col gap-2">
                        <a href="{{ asset('storage/files/photos/' . $infographic->img) }}">
                            <img src="{{ asset('storage/files/photos/' . $infographic->img) }}"
                                alt="{{ $infographic->title }}"
                                class="w-full h-full mt-4" loading="lazy">
                        </a>
                        <a href="{{ asset('storage/files/photos/' . $infographic->img) }}"
                        class="text-landy text-xl font-semibold">
                            {{ $infographic->title }}
                        </a>
                    </div>
                @else
                    <p class="mt-4 text-landy font-semibold">No infographic available.</p>
                @endif
                {{-- <a href="{{ asset('storage/files/photos/'.$infographic->img) }}"><img src="{{ asset('storage/files/photos/'.$infographic->img) }}" alt="{{$infographic->title}}" class="w-full h-full mt-4"></a> --}}
                {{-- <a href="{{ asset('storage/files/photos/'.$infographic->img) }}" class="text-landy text-xl font-semibold ">{{$infographic->title}}</a> --}}
            </div>
         </div>



       @include('partials.footer')
@endsection
