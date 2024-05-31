<section class="w-full max-w-[1440px] p-4">
    @if($cars == null || count($cars) == 0)
        <h1 id="rent-now" class="text-center font-bold text-3xl pb-[25px]">mottor</h1>
        @if(request()->is('/'))
            <p class="italic text-center">No cars available. <a href="{{ route('cars') }}" class="text-semibold !not-italic 
            hover:opacity-90 hover:underline active:opacity-85">See all cars.</a></p>
        @else
            @if(session()->get('role_id') == 1)
                <p class="italic text-center">No cars on database. <a href="{{ route('add') }}" class="text-semibold !not-italic 
                hover:opacity-90 hover:underline active:opacity-85">Add Car.</a></p>
            @else
                <p class="italic text-center">No cars on the list. <a href="{{ route('contact') }}" class="text-semibold !not-italic 
                hover:opacity-90 hover:underline active:opacity-85">Contact us.</a></p>
            @endif
        @endif
    @else
        <h1 id="rent-now" class="{{ request()->is('/') ? 'pt-[70px]' : '' }} text-center font-bold text-3xl pb-[25px]">Car List</h1>
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($cars as $car)
                <div class="p-4 rounded shadow-xl">
                    <img src="{{ $car['image'] }}" alt="{{ $car['image'] }}" class="object-cover w-full h-48 rounded-t">
                    <h3 class="mt-4 text-xl font-bold">{{ $car['name'] }}</h3>
                    <p class="mt-2 text-lg font-semibold text-gray-600">Rp. {{ number_format($car['price'], 0, ',', '.') }}</p>
                    @if($car["isAvailable"])
                    @else
                        <p class="text-red-700">&#10006; Unavalibale</p>
                    @endif
                    @if(session()->get('role_id') == 1)
                        <a href="/edit/{{ $car['id'] }}">
                            <button class="w-full px-6 py-4 mt-4 text-black transition duration-100 ease-in-out 
                            rounded-md">Edit Car</button>
                        </a>
                        @if($car["isAvailable"])
                            <a href="/delete/{{ $car['id'] }}">
                                <button class="w-full px-4 py-2 mt-4 text-white transition duration-100 ease-in-out rounded-md 
                                bg-erentRed active:bg-erentRed/15 hover:bg-white hover:text-erentRed hover:outline 
                                hover:outline-erentRed">Delete Car</button>
                            </a>
                        @endif
                    @endif
                    <a href="/car/{{ $car['id'] }}">
                        <button class="w-full px-4 py-2 mt-4 text-white transition 
                        duration-100 ease-in-out rounded-md bg-emerald-500">Buy</button>
                    </a>
                    
                </div>
            @endforeach
        </div>
    @endif
</section>