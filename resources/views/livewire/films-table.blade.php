<div>
    <h1> Films Collection Table</h1>
    @if($message)
        <div class="alert alert-dark">
            <h3>{{$message}}</h3>
        </div>
    @endif
    <div class="table-responsive">
        <!--begin::Table-->
        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0 table-striped">
            <!--begin::Table head-->
            <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="p-0 pb-3 min-w-175px text-start">TITLE</th>
                <th class="p-0 pb-3 min-w-100px text-end">EPISODE ID</th>
                <th class="p-0 pb-3 min-w-200px text-end">OPENING CRAWL</th>
                <th class="p-0 pb-3 min-w-100px text-end pe-12">DIRECTOR</th>
                <th class="p-0 pb-3 min-w-100px text-end pe-12">PRODUCER</th>
                <th class="p-0 pb-3 min-w-100px text-end pe-12">RELEASE DATE</th>
                <th class="p-0 pb-3 min-w-50px text-end pe-12"># OF SPECIES</th>
            </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>

            @foreach($records['films'] as $key => $result)

                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-3">
                                <img src="{{$result['image']}}" class="" alt=""/>
                            </div>
                            @php($urlArray = explode('/',$result['url']))
                            @php($urlArray = array_filter($urlArray))
                            @php($filmId = array_pop($urlArray))
                            <div class="d-flex justify-content-start flex-column">
                                <a wire:click="showFilm({{$filmId}})"
                                   class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{$result['title']}}</a>
                                <span
                                    class="text-gray-400 fw-semibold d-block fs-7">{{$result['episodeId'] ?? ''}}</span>
                            </div>
                        </div>
                    </td>

                    <td class="text-end pe-0">
                        <!--begin::Label-->
                        <span class="badge badge-light-success fs-base">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
							<span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                          transform="rotate(90 13 6)" fill="currentColor"/>
									<path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor"/>
								</svg>
							</span>
                            <!--end::Svg Icon-->
                            {{$result['episodeId']}}
                            </span>
                        <!--end::Label-->
                    </td>
                    <td class="text-end pe-0">
                        <span class="text-gray-600 fw-bold fs-6">{{$result['opening_crawl']}}</span>
                    </td>


                    <td class="text-end pe-0">
                        <span class="text-gray-600 fw-bold fs-6">{{$result['director']}}</span>
                    </td>
                    <td class="text-end pe-0">
                        <span class="text-gray-600 fw-bold fs-6">{{$result['producer']}}</span>
                    </td>
                    <td class="text-end pe-0">
                        <span class="text-gray-600 fw-bold fs-6"> {{$result['release_date']}}</span>
                    </td>

                    <td class="text-end pe-0">
                        <span class="text-gray-600 fw-bold fs-6">{{$result['totalSpeciesCount'] ?? 0}}</span>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <!--end::Table body-->
        </table>
    </div>
</div>
