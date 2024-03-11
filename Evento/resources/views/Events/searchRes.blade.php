


        @foreach ($events as $event )
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($event->media)
                <img src="{{ asset('storage/' . $event->media) }}" alt="Event Media" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 id="searchResults" class="card-title">{{ $event->title }}</h5>
                    <p id="searchResults" class="card-text">{{ $event->description }}</p>
                    <p id="searchResults" class="card-text"><strong>Date:</strong> {{ $event->date}}</p>
                    <p id="searchResults" class="card-text"><strong>Lieu:</strong> {{ $event->lieu }}</p>

                </div>
            </div>
        </div>
        @endforeach


