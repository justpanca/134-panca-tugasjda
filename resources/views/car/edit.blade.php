@extends("layouts.app")

@section("title")
  Edit Car
@endsection

@section("content")
  <div class="w-full max-w-[1440px] p-6 flex flex-col items-center gap-4">
    <h1 class="text-3xl font-bold">Edit {{ $car['name'] }}</h1>
    <form action="{{ route('car-update', $car['id']) }}" method="POST" class="max-w-[450px] flex flex-col w-full gap-4">
      @csrf
      @method("PATCH")
      <input type="number" name="id" value="{{ $car['id'] }}" required class="hidden">
      <div class="flex flex-col gap-1">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $car['name'] }}" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
      </div>
      <div class="flex flex-col gap-1">
        <label for="image">Image</label>
        <input type="text" name="image" id="image" value="{{ $car['image'] }}" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
      </div>
      <div class="flex flex-col gap-1">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" value="{{ $car['year'] }}" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
      </div>
      <div class="flex flex-col gap-1">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="3" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>{{ $car['description'] }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ $car['price'] }}" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
      </div>
      <div>
        <button type="submit" class="w-full mt-4 bg-erentGreen active:bg-erentGreen/15 transition duration-100 ease-in-out text-white px-4 py-2 rounded-md hover:bg-white hover:text-erentGreen hover:outline hover:outline-erentGreen">Edit</button>
      </div>
    </form>
    <!-- @isset($payload)
        <h1>{{ $payload['name']}}</h1>
        <h1>{{ $payload['image']}}</h1>
        <h1>{{ $payload['year']}}</h1>
        <h1>{{ $payload['description']}}</h1>
        <h1>{{ $payload['price']}}</h1>
        <h1>{{ $payload['id'] }}</h1>
    @endisset -->
  </div>
@endsection