<div>
    <h1> Person Collection Table</h1>
    <h4>External Api Endpoint: <code
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            title="This url is the current endpoint that was fetched to display this view."
        >
            {{$externalUrl}}</code></h4>
    <h4>Internal Api Endpoint: <code
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            title="This url shows the internal api endpoint respective to this request. It also renders custom resources to provide any additional parameters"
        >
            {{$internalUrl}}</code></h4>
    <hr/>
    @if($message)
        <div class="alert alert-dark alert-info">
            <h2>What features does this component have?</h2>
            <p>{{$message}}</p>
            <em>
                Livewire Component Features
                <ul>
                    <li>
                        Enter a term into search field, component will dynamically fetch & re-render the component
                        without reloading the page. Similar to how Hot-reloading works in Vue.JS or React.JS
                    </li>
                    <li>
                        We can paginate through the payload response dynamically by using Next Page or Previous page via
                        the buttons on top right.
                    </li>
                    <li>
                        We can click on a person name, (ANY PERSON) to render the showPerson view for that person. The
                        show response also includes the list of all SpaceShips related to that user. This works for any
                        person.
                    </li>
                </ul>
            </em>

        </div>
    @endif

    @if($page == 0)
        <div class="row">
            <label for="search Field">Person Lookup Search Field</label>
            <input
                wire:model="search"
                placeholder="Use this field to search for {{$searchType}} in the Star Wars Empire"
                type="text"
                class="border border-black input-lg form-control">
        </div>
    @endif
    <div class="table-responsive">
        <!--begin::Table-->
        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0 table-striped">
            <!--begin::Table head-->
            <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="p-0 pb-3 min-w-275px text-start">NAME</th>
                <th class="p-0 pb-3 min-w-175px text-start">BIRTH YEAR</th>
                <th class="p-0 pb-3 min-w-100px text-end">HEIGHT</th>
                <th class="p-0 pb-3 min-w-100px text-end">MASS</th>
                <th class="p-0 pb-3 min-w-100px text-end pe-12">HAIR COLOR</th>
                <th class="p-0 pb-3 min-w-100px text-end pe-12">EYE COLOR</th>
                <th class="p-0 pb-3 min-w-100px text-end pe-12">SKIN COLOR</th>
                <th class="p-0 pb-3 min-w-50px text-end pe-12"># FILMS</th>
                <th class="p-0 pb-3 min-w-50px text-end pe-12"># STARSHIPS</th>
                <th class="p-0 pb-3 min-w-50px text-end pe-12"># VEHICLES</th>
            </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>
            @if($records)
                @foreach($records['persons'] as $key => $result)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <img src="{{$result['image']}}" class="" alt=""/>
                                </div>

                                @php($urlArray = explode('/',$result['url']))
                                @php($urlArray = array_filter($urlArray))
                                @php($personId = array_pop($urlArray))

                                <div class="d-flex justify-content-start flex-column ">
                                    <a wire:click="showPerson({{$personId}})"
                                       class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6"
                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                       title="View this person profile directly"
                                    >{{$result['name']}}</a>

                                </div>
                                <hr/>
                                <div class="btn-group btn-group-xs btn-group-justified">

                                    <button class="btn btn-xs btn-light" wire:click="showPerson({{$personId}})"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                            title="View person api response"
                                    ><i
                                            class="fa fa-eye"></i>
                                    </button>
                                    <a class="btn btn-xs btn-light" href="{{route('person.show',$personId)}}"
                                       target="_blank"
                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                       title="View the api response for this person"
                                    ><i
                                            class="fa fa-code"></i>
                                    </a>
                                    <a class="btn btn-xs btn-light" href="{{route('person.wookiee',$personId)}}"
                                       target="_blank"
                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                       title="View the api response for this specific person in Wookiee language"
                                    ><i
                                            class="fa fa-code-branch"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="pe-0">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="symbol symbol-30px me-3">
                                    <img src="{{$result['homeWorldImage']}}" class="" alt="">
                                </div>

                                <span class="text-gray-600 fw-bold d-block fs-6">{{$result['birthYear'] ?? ''}}</span>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                        <span class="fs-6 text-gray-700 fw-bold">
								{{$result['birthYear'] ?? ''}}
                        </span>

                        </td>
                        <td class="text-end pe-0">
                        <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$result['height']}}">
                                    0
                                </span>
                        </span>
                        </td>
                        <td class="text-end pe-0">
                        <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true" data-kt-countup-value="{{$result['mass']}}">
                                    0
                                </span>
                        </span>
                        </td>

                        <td class="text-end pe-0">
                            <span class="text-gray-600 fw-bold fs-6">{{$result['hairColor']}}</span>
                        </td>
                        <td class="text-end pe-0">
                            <span class="text-gray-600 fw-bold fs-6">{{$result['eyeColor']}}</span>
                        </td>
                        <td class="text-end pe-0">
                            <span class="text-gray-600 fw-bold fs-6"> {{$result['skinColor']}}</span>
                        </td>
                        <td class="text-end pe-0">
                       <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$result['noOfFilms']}}">
                                    0
                                </span>
                        </span>
                        </td>
                        <td class="text-end pe-0">
                        <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$result['noOfStarShips']}}">
                                    0
                                </span>
                        </span>
                        </td>
                        <td class="text-end pe-0">
                      <span class="fs-6 text-gray-700 fw-bold">
								<span class="ms-n1" data-kt-countup="true"
                                      data-kt-countup-value="{{$result['noOfVehicles']}}">
                                    0
                                </span>
                        </span>
                        </td>
                    </tr>
                @endforeach
            @else

                <div class="alert alert-warning">
                    <h2>No records found</h2>
                </div>

            @endif

            </tbody>
            <!--end::Table body-->
        </table>
    </div>
</div>
