<div>
    @if($showPersonProfile)
        @include('livewire.show-person')
    @else

        <div class="alert alert-dark alert-info">
            <h2>How this Livewire component works?</h2>
            <p>
                The below component dynamically fetches data from the Star Wars Api based on how you as the user
                interact with component.
                We then get the payload & convert it into the necessary resources based on the request. You are also
                able to send query parameters during request such as format (eg: wookiee), page number, or search terms
                (eg: Darth Maul, JarJar Binks, etc)
                Although this application provides API Doc Specs & direct access to API Responses, it seemed suitable to
                create a front-end UI component that can talk directly to the API, without having to use API Docs.
                Please try it out.

            </p>
        </div>
        <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Code10 Coding Exercise - By JD Hawkins</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    @if($searchType == 'films')
                        <button
                            type="button"
                            wire:click="goBack()"
                            class="btn btn-sm btn-dark">
                            Reset Results
                        </button>
                    @endif
                    @if($previousPageUrl)
                        <button wire:click=setPage({{ $page-1 }})" type="button" class="btn btn-sm btn-info">Previous
                            Page
                        </button>
                    @endif

                    @if($nextPageUrl)
                        <button wire:click=setPage({{ $page+1 }})type="button" class="btn btn-sm btn-success">Next
                            Page
                        </button>
                    @endif


                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-6">

                @include('livewire.people-table')
            </div>
            <!--end: Card Body-->
        </div>
    @endif
</div>
