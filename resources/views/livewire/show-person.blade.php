<div>

    <h1> Show Person & Starship Details</h1>
    @if($message)
        <div class="alert alert-dark alert-{{$color}}">
            <h2>There are {{$person['noOfStarShips']}} starships related to {{$person['name']}} </h2>
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="row g-5 g-xl-6 mb-5 mb-xl-6">
        <div class="col-md-6">
            <div class="card card-flush h-xl-100">
                <!--begin::Body-->
                <div class="card-body py-9">

                    <!--begin::Row-->
                    <div class="row gx-9 h-100">
                        <!--begin::Col-->
                        <div class="col-sm-6 mb-10 mb-sm-0">
                            <!--begin::Overlay-->
                            <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales" href="">
                                <!--begin::Image-->
                                <div
                                    class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px h-100"
                                    style="background-image:url({{$person['image']}})">
                                </div>
                                <!--end::Image-->

                                <!--begin::Action-->
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="bi bi-eye-fill fs-2x text-white">{{$person['name']}}</i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column h-100">
                                <!--begin::Header-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <div class="mb-6">
                                        <span
                                            class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">BirthYear : {{$person['birthYear']}}</span>

                                        <a href=""
                                           class="text-gray-800 text-hover-primary fs-1 fw-bold">{{$person['name']}}</a>
                                    </div>
                                    <!--end::Title-->

                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center me-5 me-xl-13">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <img src="{{$person['image']}}" class="" alt="">
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <span
                                                    class="fw-semibold text-gray-400 d-block fs-8">Eye Color : {{$person['eyeColor']}}</span>
                                                <a href="#"
                                                   class="fw-bold text-gray-800 text-hover-primary fs-7">Gender
                                                    : {{$person['gender']}}</a>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div
                                    class="d-flex flex-column border border-1 border-gray-300 text-center pt-5 pb-7 mb-8 card-rounded">
                                    <span
                                        class="fw-semibold text-gray-600 fs-7 pb-1">Height: {{$person['height']}}</span>

                                    <span class="fw-bold text-gray-600 fs-4 pb-5">Mass: {{$person['mass']}}</span>

                                    <span
                                        class="fw-bold text-gray-600 fs-4 pb-5">Skin Color: {{$person['skinColor']}}</span>
                                    <span
                                        class="fw-semibold text-gray-600 fs-7 pb-1">Hair Color {{$person['hairColor']}}</span>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                        <!--begin::Number-->
                                        <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$person['noOfVehicles']}}">
                                    0
                                </span>
                                                    </span>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold text-gray-400"># of Vehicles</div>
                                        <!--end::Label-->
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                        <!--begin::Number-->
                                        <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$person['noOfFilms']}}">
                                    0
                                </span>
                                                    </span>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold text-gray-400"># of Films</div>
                                        <!--end::Label-->
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                        <!--begin::Number-->
                                        <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$person['noOfStarShips']}}">
                                    0
                                </span>
                                                    </span>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold text-gray-400"># of Starships</div>
                                        <!--end::Label-->
                                    </div>
                                </div>
                                <!--end::Body-->

                                <!--begin::Footer-->
                                <div class="d-flex flex-stack mt-auto bd-highlight">
                                    <!--begin::Actions-->
                                    <button wire:click="goBack()" class="btn btn-primary btn-sm flex-shrink-0 me-3">
                                        Go Back
                                    </button>
                                    <!--end::Svg Icon-->


                                    <!--end::Actions-->
                                </div>
                                <!--end::Footer-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Body-->
            </div>
        </div>

        <div class="col-md-6" style="min-width: 200px; min-height: 120px;">
            <div class="alert alert-info">
                <p>The two buttons found below this notification will allow you to access the API payload directly,
                    either normally, or in Wookiee format</p>
            </div>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="{{route('person.show', $personId)}}" target="_blank"
                   class="btn btn-sm btn-light btn-info">
                    View API Payload
                    <span class="fa fa-code-branch"></span>
                    <!--end::Svg Icon--></a>

                <a href="{{route('person.show', $personId, ['format' => 'wookiee'])}}" target="_blank"
                   class="btn btn-sm btn-dark">
                    View API Payload In Wookie Format
                    <span class="fa fa-code-commit"></span>
                    <!--end::Svg Icon--></a>
            </div>
            <hr/>
            <h3>API Details : <code>Person</code> <code>StarShip</code> Payload Response</h3>
            <h4>External Api Endpoint: <code>{{$person['url']}}</code></h4>
            <h4>Internal Api Endpoint: <code>{{route('person.show', $personId)}}</code></h4>
            <div class="alert alert-dark">
                <h6>
                    This internal API response is a PersonResource that has been merged with StarShipResourceCollection.
                    In a gist this payload is the result of the person fetch payload & the combined fetch payloads of
                    each starship(s) related to person if they exist.
                </h6>
            </div>
            <hr/>
            <h6><code>{{$person}}</code></h6>

        </div>
    </div>
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="alert alert-dark alert-{{$color}}">
            <h2>StarShipResource API Response</h2>
            <p>
                We first check whether starships exist for the person object, then we get fetch the details of each
                starship & convert it into a StarShipResource.
                This allows us to return all of the details from the starship endpoint although this data is not
                initially available on the person object returned from orginal payload.
                Cool right?
            </p>
        </div>

        @if(count($person['starships']))

            @foreach($person['starships'] as $ship)
                <div class="col-md-6">

                    <div class="card card-flush h-xl-100">
                        <!--begin::Body-->
                        <div class="card-body py-9">
                            <h4>External Api Endpoint: <code>{{$ship['url']}}</code></h4>
                            <!--begin::Row-->
                            <div class="row gx-9 h-100">
                                <!--begin::Col-->
                                <div class="col-sm-6 mb-10 mb-sm-0">
                                    <!--begin::Image-->
                                    <div
                                        class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                                        style="background-size: 100% 100%;background-image:url({{$ship['image']}})"></div>
                                    <!--end::Image-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-sm-6">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column h-100">
                                        <!--begin::Header-->
                                        <div class="mb-7">
                                            <!--begin::Headin-->
                                            <div class="d-flex flex-stack mb-6">
                                                <!--begin::Title-->
                                                <div class="flex-shrink-0 me-5">
                                                    <span
                                                        class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">{{$ship['manufacturer']}}</span>
                                                    <span class="text-gray-800 fs-1 fw-bold">{{$ship['name']}}</span>
                                                </div>
                                                <!--end::Title-->

                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Items-->
                                            <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center me-5 me-xl-13">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px symbol-circle me-3">
                                                        <img
                                                            src="https://cdn2.iconfinder.com/data/icons/space-flat-style/128/Space_-_Flat_Style_-_31-04-512.png"
                                                            class="" alt=""/>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <span
                                                            class="fw-semibold text-gray-400 d-block fs-8">{{$ship['manufacturer']}}</span>
                                                        <a href="#"
                                                           class="fw-bold text-gray-800 text-hover-primary fs-7">{{$ship['model']}}</a>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="mb-6">

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">$
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$ship['cost_in_credits']}}">
                                    0
                                </span>
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Cost</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true" data-kt-countup-value="{{$ship['length']}}">
                                    0
                                </span>
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Length</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <div class="mb-6">

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$ship['max_atmosphering_speed']}}">
                                    0
                                </span> MPH
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">ATM Speed</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true" data-kt-countup-value="{{$ship['crew']}}">
                                    0
                                </span>
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Crew Size</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <div class="mb-6">

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$ship['passengers']}}">
                                    0
                                </span>
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Passengers</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$ship['cargo_capacity']}}">
                                    0
                                </span>
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Cargo Capacity</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <div class="mb-6">

                                            <!--begin::Stats-->
                                            <div class="d-flex">
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$ship['max_atmosphering_speed']}}">
                                    0
                                </span> MPH
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Atmosphere Speed</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                    <!--begin::Number-->
                                                    <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true" data-kt-countup-value="{{$ship['crew']}}">
                                    0
                                </span>
                                                    </span>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-semibold text-gray-400">Crew Size</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>

                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="d-flex flex-stack mt-auto bd-highlight">
                                            <!--begin::Users group-->
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                     title="{{$person['name']}}">
                                                    <img alt="{{$person['name']}}" src="{{$person['image']}}"/>
                                                </div>
                                            </div>
                                            <!--end::Users group-->
                                        </div>
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Body-->
                    </div>


                </div>
            @endforeach

        @else
            <div class="alert alert-danger">
                <h4>
                    Sorry! There are no spaceships related to {{$person['name']}}
                </h4>
            </div>
        @endif
    </div>

</div>
