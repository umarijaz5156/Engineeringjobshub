@extends('frontend.layouts.app')

@section('description')
@php
$data = metaData('home');
@endphp
Explore the Civil Engineering Jobs in Australia with the help of a top level job portal that helps you to get recruited in your dream enterprise.
@endsection
@section('og:image')
    {{ asset($data->image) }}
@endsection
@section('title')
Latest Civil Engineering Jobs in Australia | Civil Engineering Roles
@endsection

@section('main')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <section class="hero-section-3">
        <div class="container">
            <div class="tw-flex tw-justify-center tw-items-center tw-relative tw-z-50">
                <div class="tw-max-w-3xl tw-text-white tw-text-center">
                    <h1 class="tw-text-white">{!! __('Civil Engineering Jobs in Australia') !!}</h1>
                    <p>{{ __('job_seekers_stats') }}</p>
                    <form action="{{ route('website.job') }}" method="GET" id="job_search_form">
                        <div class="jobsearchBox d-flex flex-column flex-md-row bg-gray-10 input-transparent rt-mb-24"
                            data-aos="fadeinup" data-aos-duration="400" data-aos-delay="50">
                            <div class="flex-grow-1 fromGroup has-icon">
                                <input id="index_search" name="keyword" type="text"
                                    placeholder="{{ __('job_title_keyword') }}" value="{{ request('keyword') }}"
                                    autocomplete="off" class="text-gray-900">
                                <div class="icon-badge">
                                    <x-svg.search-icon />
                                </div>
                                <span id="autocomplete_index_job_results"></span>
                            </div>
                            <input type="hidden" name="lat" id="lat" value="">
                            <input type="hidden" name="long" id="long" value="">
                            @php
                                $oldLocation = request('location');
                                $map = $setting->default_map;
                            @endphp

                            @if ($map == 'google-map')

                                <div class="flex-grow-1 fromGroup has-icon banner-select no-border">
                                    <input type="text" id="searchInput" placeholder="{{ __('enter_location') }}"
                                        name="location" value="{{ $oldLocation }}" class="text-gray-900">
                                    <div id="google-map" class="d-none"></div>
                                    <div class="icon-badge">
                                        <x-svg.location-icon stroke="{{ $setting->frontend_primary_color }}" width="24"
                                            height="24" />
                                    </div>
                                </div>
                            @else
                            @php
                                 $country = App\Models\SearchCountry::where('name','Australia')->first();
                                 $states = App\Models\State::where('country_id',$country->id)->get();
                            @endphp

                            <div class="flex-grow-1 fromGroup has-icon banner-select no-border">
                                <input name="long" class="leaf_lon" type="hidden">
                                <input name="lat" class="leaf_lat" type="hidden">
                                <select style="border: none;font-size: 16px;color: #a3a4a7 !important;" name="state_id" class="text-gray-900">
                                    <option value="" selected disabled>{{ __('Select state') }}</option>
                                    @php
                                        $orderedStates = [
                                            'NSW (New South Wales)',
                                            'VIC (Victoria)',
                                            'QLD (Queensland)',
                                            'TAS (Tasmania)',
                                            'NT (Northern Territory)',
                                            'SA (South Australia)',
                                            'ACT (Australian Capital Territory)',
                                            'NZ (New Zealand)',
                                             'WA (Western Australia)'
                                        ];
                                    @endphp
                                    @foreach($orderedStates as $stateName)
                                        @if($state = $states->where('name', $stateName)->first())
                                            <option {{ request('state_id') == $state->id ? 'selected' : '' }}  value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endif
                                    @endforeach
                                </select>


                                <div class="icon-badge">
                                    <x-svg.location-icon stroke="{{ $setting->frontend_primary_color }}" width="24" height="24" />
                                </div>
                            </div>

                               {{-- <div class="flex-grow-1 fromGroup has-icon banner-select no-border">
                                <input name="long" class="leaf_lon" type="hidden">
                                <input name="lat" class="leaf_lat" type="hidden">
                                <input type="text" id="leaflet_search" placeholder="{{ __('enter_location') }}"
                                       name="location" value="{{ $oldLocation }}" autocomplete="off"
                                       class="text-gray-900">

                                <div class="icon-badge">
                                    <x-svg.location-icon stroke="{{ $setting->frontend_primary_color }}" width="24" height="24" />
                                </div>

                            </div> --}}

                            @endif
                            <div class="flex-grow-0">
                                <button type="submit"
                                    class="btn btn-primary d-block d-md-inline-block ">{{ __('find_job_now') }}</button>
                            </div>
                        </div>
                    </form>
                    {{-- @if ($top_categories->count())
                        <div class="f-size-14 banner-quciks-links" data-aos="" data-aos-duration="1000"
                            data-aos-delay="500">
                            <span class="!tw-text-gray-300">{{ __('suggestion') }}: </span>
                            @foreach ($top_categories as $item)
                                @if ($item->slug)
                                    <a class="!tw-text-white tw-underline"
                                        href="{{ route('website.job.category.slug', ['category' => $item->slug]) }}">>
                                        {{ $item->name }} {{ !$loop->last ? ',' : '' }}</a>
                                @endif
                            @endforeach
                    @endif
                </div> --}}
            </div>
        </div>
    </section>


    <section class="bg-light rounded shadow-sm md:tw-py-20 tw-py-12">
        <div class="container ">
            {{-- <div class="text-center">
                <h1></h1>
            </div> --}}
            <div class="tw-mt-8 tw-relative tw-z-50">
                 <div class="row justify-content-center">
                    <div class="col-md-12 ">
                        <div class=" p-4 " style="font-size: 1.2rem;">

                            <p>
                                If you want to boost your career as a civil engineer, you might have thought about coming to Australia. Civil Engineering jobs in Australia have been in demand for the past 5 years. A civil engineering job in Australia requires a master in any branch of maintenance or production engineering.
                            </p>
                            <p>
                                Australia is a place of high humidity due to which they need civil engineers to boost the demand of production . Top jobs for civil engineers in Australia include infrastructure,construction and mining expertise.
                            </p>
                            <p>
                                The Australian civil engineering industry is always in need of mining experts as the major economy of Australia depends on extraction of minerals which shows that the urban country needs civil engineers.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_thin_ad_after_counter_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_thin_ad_after_counter_section') !!}
            </div>
        @endif
    @endif

    <!-- jobs card -->
    <section class="tw-bg-primary-50 md:tw-py-20 tw-py-12">
        <div class="container">
            <div class="row md:tw-pb-12 tw-pb-8">
                <div class="col-12">
                    <div class="tw-flex tw-gap-3 tw-items-center tw-flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="tw-mb-0">
                                {{ __('top') }}
                                <span class="text-primary-500 has-title-shape">{{ __('featured_jobs') }}
                                    <img src="{{ asset('frontend') }}/assets/images/all-img/title-shape.png"
                                        alt="">
                                </span>
                            </h2>
                        </div>
                        <a href="{{ route('website.job') }}" class="flex-grow-0 rt-pt-md-10">
                            <button class="btn btn-outline-primary !tw-border-primary-500">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-right">
                                        <i class="ph-arrow-right"></i>
                                    </span>
                                    <span>
                                        {{ __('view_all') }}
                                    </span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($mechanical && count($mechanical) > 0)
                    @foreach ($mechanical as $job)
                        <div class="col-xl-3 col-md-4 fade-in-bottom  condition_class rt-mb-24 tw-self-stretch">
                            <a href="{{ route('website.job.details', $job->slug) }}"
                                class="tw-h-full card tw-card tw-block jobcardStyle1 tw-border-gray-200 hover:!-tw-translate-y-1 hover:tw-bg-primary-50 tw-bg-gray-50"
                                tabindex="0">
                                <div class="tw-p-6 tw-flex tw-gap-3 tw-flex-col tw-justify-between tw-h-full">
                                    <div>
                                        <div class="tw-mb-1.5">
                                            <span class="tw-text-[#18191C] tw-text-lg tw-font-medium">
                                                {{ $job->title }}
                                            </span>
                                        </div>
                                        <div class="tw-flex tw-flex-wrap tw-gap-2 tw-items-center tw-mb-1.5">
                                            <div class="tw-w-[56px] tw-h-[56px]">
                                                <img class="tw-rounded-lg tw-w-[56px] tw-h-[56px]"
                                                    src="{{ $job?->company?->logo_url }}" alt=""
                                                    draggable="false">

                                            </div>
                                            {{-- <span
                                                class="tw-text-[#0BA02C] tw-text-[12px] tw-leading-[12px] tw-font-semibold tw-bg-[#E7F6EA] tw-px-2 tw-py-1 tw-rounded-[3px]">
                                                {{ $job->job_type ? $job->job_type->name : '' }}
                                            </span> --}}
                                        </div>
                                        {{-- <div>
                                            <span class="tw-text-sm tw-text-[#767F8C]">
                                                @if ($job->salary_mode == 'range')
                                                    {{ currencyAmountShort($job->min_salary) }} -
                                                    {{ currencyAmountShort($job->max_salary) }}
                                                    {{ currentCurrencyCode() }}
                                                @else
                                                    {{ $job->custom_salary }}
                                                @endif
                                            </span>
                                        </div> --}}
                                    </div>
                                    <div class="tw-flex tw-items-center tw-gap-2">
                                        {{-- <span>

                                        </span> --}}
                                        <div class="iconbox-content">
                                            <div class="tw-mb-1 tw-inline-flex">
                                                <span
                                                    class="tw-text-base tw-font-medium tw-text-[#18191C]">{{ $job->company->user->name ?? " "}}</span>
                                            </div>
                                            <span class="tw-flex tw-items-center tw-gap-1">
                                                <i class="ph-map-pin"></i>
                                                <span class="tw-location">{{  $job->state->name ?? '' }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="btn hover:tw-text-white hover:tw-bg-primary-700 tw-px-2.5 tw-py-1 tw-text-white tw-bg-primary-500">{{ __('apply_now') }}</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_featuredjob_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_featuredjob_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->




    <section class="bg-light rounded shadow-sm md:tw-py-20 tw-py-12">
        <div class="container">
            <div class="text-center">
                <h2>Civil Engineering Roles</h2>
            </div>
            <div class="tw-mt-8 tw-relative tw-z-50">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="p-4" style="font-size: 1.2rem;">
                            <p>
                                Civil engineers have different roles, Some of them work as structural engineers and build bridges, tunnels and other infrastructure projects. One of the most common roles that civil engineers play is as a transportation engineer. They focus on improving the traffic flow along-with enhancing the safety and efficiency of the transportation system.
                            </p>
                            <p>
                                More civil engineering roles include environmental engineer, water resource engineer and construction engineer. Civil engineering roles are diverse and one can do masters in each niche to pursue a career in each field.
                            </p>
                            <h3 class="pt-5">Civil Engineering Jobs in Australia with Visa Sponsorship</h3>
                            <p>
                                Australia provides visa sponsorship to international workers.One can work in Australia after getting visa sponsorship from different companies.These companies recruit you and after interview provide sponsorship including different health care services as well. There is Temporary Short Skill Visa (TSS) which allows overseas workers to work in Australia on short term bases.
                               </p>
                               <p>
                                Skilled Employer Sponsored Regional (Provisional) Visa provides an opportunity to secure residential security in Australia. When an applicant has worked for 3 years in Australia, they are granted an Employer Nomination Scheme (ENS) Visa. Skilled Independent Visa is given to those skilled workers who have passed the time period of 5 years.They can work anywhere in Australia.                               </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <section class="bg-light rounded shadow-sm ">
        <div class="container">
            <div class="text-center">
                <h2>Civil Engineering Recruitment Agencies</h2>
            </div>
            <div class="tw-mt-8 tw-relative tw-z-50">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="p-4" style="font-size: 1.2rem;">
                            <p>
                                We at Engineering Jobs Hub advertise various  civil engineering jobs to help our readers get in touch with right job providers.We help various companies to advertise the jobs in order to get linked with the most suitable worker. Engineering Jobs Hub is a marketplace to advertise the need and get the handful of skilled civil engineers of your own choice.
                            </p>
                            <p>
                                We update our records and engage the community of civil engineers by publishing about the most authentic job updates in the market. The Australian market is full of companies that recruit civil engineers on daily bases. In order to keep yourself updated with the Australian civil engineering job market, stay connected with the Engineering Jobs Hub !
                                                        </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- create profile -->
    <section class="md:tw-py-20 tw-py-12 !tw-border-t !tw-border-b !tw-border-primary-100">
        <div class="container">
            <div class="row tw-items-center">
                <div class="col-lg-6">
                    <img class="tw-rounded-lg" src="{{ asset('home_page.webp') }}"
                        alt="jobBox">
                </div>
                <div class="col-lg-6">
                    <div class="lg:tw-ps-12 tw-pt-6 lg:tw-pt-0">
                        <h2 class="tw-text-primary-500 tw-mb-4">{{ __('create_profile') }}</h2>
                        <h2 class="">{{ __('create_your_personal_account_profile') }}</h2>
                        <p class="">{{ __('work_profile_description') }}</p>
                        <div class="">
                            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('create_profile') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item border" style="border-color: #6894A7;">
                    <p class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="border-color: #6894A7; color: #6894A7;">
                            <strong>Is there a demand for civil engineers in Australia?</strong>
                        </button>
                    </p>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, there is a huge demand for civil engineers in Australia. Transportation engineers earn the most as Australia, being an urban country, requires a stable transportation system.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border" style="border-color: #6894A7;">
                    <p class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="border-color: #6894A7; color: #6894A7;">
                            <strong>Can a Civil Engineer get a job in Australia?</strong>
                        </button>
                    </p>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, a civil engineer can get a job in Australia after obtaining certification from the Australian Engineers Association (AEA).
                        </div>
                    </div>
                </div>
                <div class="accordion-item border" style="border-color: #6894A7;">
                    <p class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="border-color: #6894A7; color: #6894A7;">
                            <strong>Is Australia good for civil engineers?</strong>
                        </button>
                    </p>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Australia is a prime destination for civil engineers. The country requires civil engineers in various fields and offers competitive salaries.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border" style="border-color: #6894A7;">
                    <p class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="border-color: #6894A7; color: #6894A7;">
                            <strong>What is the net salary of a Civil Engineer in Australia?</strong>
                        </button>
                    </p>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <ul>
                                <li><strong>Entry-Level Civil Engineer:</strong> Approximately AUD 70,000 to AUD 80,000 per year.</li>
                                <li><strong>Mid-Level Civil Engineer:</strong> Around AUD 80,000 to AUD 100,000 per year.</li>
                                <li><strong>Senior Civil Engineer:</strong> Typically between AUD 100,000 and AUD 130,000 per year.</li>
                                <li><strong>Principal or Lead Civil Engineer:</strong> Can earn AUD 130,000 to AUD 160,000 or more annually.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border" style="border-color: #6894A7;">
                    <p class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="border-color: #6894A7; color: #6894A7;">
                            <strong>What civil engineering jobs pay the most?</strong>
                        </button>
                    </p>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Transportation and geopolitical civil engineers are among the highest-paid in the field.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <style>
        .accordion-button:focus {
            box-shadow: none;
        }
        .accordion-button:not(.collapsed) {
            color: #6894A7;
            background-color: #e0e0e0;
        }
        .accordion-button:not(.collapsed) .icon {
            content: "-";
        }
        .accordion-button.collapsed .icon {
            content: "+";
        }
        .accordion-button {
            font-size: 1.25rem; /* Increase the font size of the questions */
        }
        .accordion-body {
            font-size: 1.15rem; /* Increase the font size of the answers */
        }
        .accordion-button .icon {
            margin-left: auto;
            font-size: 1.25rem; /* Adjust the size of the icon */
        }
    </style>


    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_client_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_client_section') !!}
            </div>
        @endif
    @endif


    <section class="bg-light rounded shadow-sm md:tw-py-20 tw-py-12">
        <div class="container text-center">
            <div>
                <h2>Why Engineering Jobs Hub?</h2>
            </div>
            <div class="tw-mt-8 tw-relative tw-z-50">
                 <div class="row justify-content-center">
                    <div class="col-md-12 ">
                        <div class=" p-4 " style="font-size: 1.2rem;">

                            <p>
                                Engineering Jobs Hub is a platform which collects authentic data from various recruiting agencies and advertises the jobs. We provide job listings which  ensures that users have access to a broad spectrum of career options and can find roles that align with their skills and career goals. Let us know in the comment box about your journey of finding a civil engineering job in Australia !
                                                        </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    @php
    $cms = App\Models\Cms::first('home_page_banner_image');
    $bannerImage = $cms->home_page_banner_image ?? 'frontend/assets/images/hero-bg-3.jpeg';
@endphp

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <x-map.leaflet.autocomplete_links />
    @include('map::links')
    <style>
        .hero-section-3 {
            padding: 100px 0px;
            background-image: url('{{ asset($bannerImage) }}');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-section-3::after {
            background-color: black;
            content: "";
            height: 100%;
            left: 0;
            opacity: .5;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        span.select2-container--default .select2-selection--single {
            border: none !important;
        }

        span.select2-selection.select2-selection--single {
            outline: none;
        }

        .marginleft {
            margin-left: 10px !important;
        }

        .category-slider .slick-slide {
            margin: 0px 8px;
        }

        .category-slider .slick-dots {
            bottom: -32px;
        }

        .category-slider .slick-dots li {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0px;
        }

        .category-slider .slick-dots li button {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            width: 10px;
            height: 10px;
        }

        .category-slider .slick-dots li.slick-active button {
            background: rgba(255, 255, 255, 1);
            width: 12px;
            height: 12px;
        }

        .category-slider .slick-dots li button::before {
            display: none;
        }

        body:has(.hero-section-2) .n-header--bottom {
            box-shadow: none; !important;
        }
    </style>
@endsection

@section('script')
    <script>
        $('.category-slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
