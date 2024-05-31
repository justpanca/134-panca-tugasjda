@extends("layouts.app")

@section("title")
    Add new car
@endsection

@section("content")
    <div class="w-full max-w-[1440px] p-6 flex flex-col items-center gap-4">
        <h1 class="text-3xl font-bold">Add Courses</h1>
        <form action="{{ route('car-store')}}" method="POST" class="max-w-[450px] flex flex-col w-full gap-4">
            @csrf
        <div class="flex flex-col gap-1">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"class="input w-full p-1 rounded-md focus:outline-2 
            focus:outline-erentGreen" required>
        </div>
        <div class="flex flex-col gap-1">
            <label for="image">Image</label>
            <input type="text" name="image" id="image"class="input w-full p-1 rounded-md focus:outline-2 
            focus:outline-erentGreen" required>
        </div>
        <div class="flex flex-col gap-1">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="3" class="input w-full p-1 rounded-md 
            focus:outline-2 focus:outline-erentGreen" required></textarea>
        </div>
        <div class="flex flex-col gap-1">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="input w-full p-1 rounded-md focus:outline-2 
            focus:outline-erentGreen" required>
        </div>
        <div>
            <button type="submit" class="w-full mt-4 bg-erentGreen active:bg-erentGreen/15 transition duration-100 
            ease-in-out text-white px-4 py-2 rounded-md hover:bg-white hover:text-erentGreen hover:outline 
            hover:outline-erentGreen">Add Courses</button>
        </div>
        </form>
    </div>
@endsection