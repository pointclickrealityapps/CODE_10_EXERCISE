<div>

    <h1> Show Person & Starship Details</h1>
    @if($message)
        <div class="alert alert-dark alert-{{$color}}">
            <h2>There are {{$person['noOfStarShips']}} starships related to {{$person['name']}} </h2>
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">

            <button type="button" class="btn btn-block btn-danger" wire:click="goBack()"> go Back</button>
            <hr/>

            <div class="card card-xl-stretch mb-xl-4">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                        <a href="#" class="fw-bold text-dark fs-4 mb-2 text-hover-primary">Name: {{$person['name']}}</a>

                        <span class="fw-semibold text-muted fs-5">BirthYear: {{$person['birthYear']}}</span>
                    </div>
                    <img src="{{$person['image']}}" alt="" class="align-self-end h-100px">
                </div>
                <!--end::Body-->
            </div>
            <ul class="list-group">
                <li class="list-group-item">Eye Color {{$person['eyeColor']}}</li>
                <li class="list-group-item">Hair Color {{$person['hairColor']}}</li>
                <li class="list-group-item">SkinColor {{$person['skinColor']}}</li>
                <li class="list-group-item">Height {{$person['height']}}</li>
                <li class="list-group-item">Mass {{$person['mass']}}</li>
                <li class="list-group-item">Gender {{$person['gender']}}</li>
                <li class="list-group-item">Last Edit {{$person['editedOn']}}</li>
            </ul>

            <hr/>
            <div class="card card-flush p-2 m-2">


                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="text-gray-700 fw-semibold fs-6 me-2"># of Films</div>
                        <!--end::Section-->

                        <!--begin::Statistics-->
                        <div class="d-flex align-items-senter">

                            <!--begin::Number-->
                            <span class="text-gray-900 fw-bolder fs-6">{{$person['noOfFilms']}}</span>
                            <!--end::Number-->

                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->

                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="text-gray-700 fw-semibold fs-6 me-2"># of StarShips</div>
                        <!--end::Section-->

                        <!--begin::Statistics-->
                        <div class="d-flex align-items-senter">

                            <!--begin::Number-->
                            <span class="text-gray-900 fw-bolder fs-6">{{$person['noOfStarShips']}}</span>
                            <!--end::Number-->

                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="text-gray-700 fw-semibold fs-6 me-2"># of Vehicles</div>
                        <!--end::Section-->

                        <!--begin::Statistics-->
                        <div class="d-flex align-items-senter">

                            <!--begin::Number-->
                            <span class="text-gray-900 fw-bolder fs-6">{{$person['noOfVehicles']}}</span>
                            <!--end::Number-->

                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Item-->

                </div>
                <!--end::Body-->
            </div>
        </div>

        <div class="col-md-8">
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
            <h2>StarShipResource API Collection</h2>
            <p>
                How we generate the list of starship details below is first check whether starships exist for the person
                object, then we get fetch the details of each
                starship & convert it into a StarShipResource.
                This allows us to return all of the details from the starship endpoint although this data is not
                initially available on the person object returned from orginal payload.
                Cool right?
            </p>
        </div>

        @if(count($person['starships']))
            <!--begin::Col-->
            <div class="col-xl-12">

                <!--begin::Engage widget 7-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">List of Starships for {{$person['name']}}</span>

                        </h3>
                        <!--end::Title-->

                    </div>
                    <!--end::Header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-7">

                        <!--begin::Row-->
                        <div class="row align-items-end h-100 gx-5 gx-xl-10">
                            @foreach($person['starships'] as $ship)
                                <!--begin::Col-->
                                <div class="col-md-4 mb-11 mb-md-0">
                                    <h6>External Api Endpoint: <code>{{$ship['url']}}</code></h6>
                                    <!--begin::Overlay-->
                                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                       href="{{$ship['image']}}">
                                        <!--begin::Image-->
                                        <div
                                            class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                            style="height: 266px;background-image:url({{$ship['image']}})">
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Overlay-->

                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <!--begin::Title-->
                                        <a href="#"
                                           class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">{{$ship['name']}}</a>
                                        <!--end::Title-->

                                        <!--begin::Time-->
                                        <span
                                            class="fw-bold fs-6 text-gray-400 d-block lh-1">{{$ship['manufacturer']}}</span>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Info-->

                                    <hr/>
                                    <ul class="list-group">
                                        <li class="list-group-item">Model: {{$ship['model']}}</li>
                                        <li class="list-group-item">Cost: ${{$ship['cost_in_credits']}}</li>
                                        <li class="list-group-item">Length: {{$ship['length']}}</li>
                                        <li class="list-group-item">Max Speed: {{$ship['max_atmosphering_speed']}}</li>
                                        <li class="list-group-item">Crew: {{$ship['crew']}}</li>
                                        <li class="list-group-item">Passengers: {{$ship['passengers']}}</li>
                                        <li class="list-group-item">Cargo Capacity: {{$ship['cargo_capacity']}}</li>
                                        <li class="list-group-item">Consumables: {{$ship['consumables']}}</li>
                                        <li class="list-group-item">Hyperdrive
                                            Rating: {{$ship['hyperdrive_rating']}}</li>
                                        <li class="list-group-item">Starship Class: {{$ship['starship_class']}}</li>
                                    </ul>
                                </div>
                                <!--end::Col-->
                            @endforeach

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Engage widget 7-->


            </div>
            <!--end::Col-->

        @else
            <div class="alert alert-danger">
                <h4>
                    Sorry! There are no spaceships related to {{$person['name']}}
                </h4>
            </div>
        @endif


    </div>


</div>


