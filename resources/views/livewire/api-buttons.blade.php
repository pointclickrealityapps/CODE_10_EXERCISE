<div>
    <div class="alert alert-light alert-danger">
        <h2> IMPORTANT - Quick Links To Coding Exercise Task Requirements </h2>
        <b>(Hover Over Buttons for more Details)</b>
        <p>
            If you would like to directly access the REQUIRED API coding exercises, please use the links below to
            quickly access those endpoints.
            On the other hand the section below contains an interactive Livewire component that renders the same desired
            outcome as well. No DB connection required. Livewire Component communicates directly with the External
            StarWars API

        </p>
        <hr/>

        <div class="btn-group btn-group-justified btn-group-sm">
            <a href="{{route('person.show', 1)}}" target="_blank" class="btn btn-sm btn-light btn-success"
               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
               title="This links to the API response for all starships related to Luke Skywalker"
            >
                Task #1 Luke & all related starships (API Endpoint)
            </a>

            <a href="{{route('films.show', 1)}}" target="_blank" class="btn btn-sm btn-light btn-info"
               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
               title="This links to the API response for all species for Episode 1"
            >
                Task #2 All Species for Episode 1 (API Endpoint)
            </a>
            <a href="{{route('galaxy.show', 1)}}" target="_blank" class="btn btn-sm btn-light btn-danger"
               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
               title="This links to the API response for the sum of all planets in the Star wars Galaxy"
            >
                Task #3 Total population of all planets in Galaxy (API Endpoint)
            </a>
            <a href="{{route('person.show', [1, 'format' => 'wookiee'])}}" target="_blank" class="btn btn-sm btn-dark"
               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
               title="This links to the API response for all starships related to Luke Skywalker in Wookiee format "
            >
                Task #1-A Show Starships for Luke In Wookiee Format (API Endpoint)
            </a>
            <a href="{{route('films.get')}}" target="_blank" class="btn btn-sm btn-dark"
               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
               title="This links to the API response for all films in the Star Wars Canon"
            >
                Task #2-A List all films (API Endpoint)
            </a>

        </div>

    </div>

</div>
