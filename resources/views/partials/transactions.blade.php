<section class="w-full max-w-[1440px] p-4">
    @if(session()->get('role_id') == 1 && !$transactions)
        <p class="italic text-center">Currently no active transaction. <a href="{{ route('homepage') }}" class="!not-italic font-semibold hover:opacity-90 hover:underline active:opacity-85">Back to home.</a></p>
    @elseif(session()->get('role_id') != 1 && !$transactions)
        {{-- <p class="italic text-center">You don't have active transaction. <a href="{{ route('homepage') }}#rent-now" class="!not-italic hover:opacity-90 hover:underline active:opacity-85">Rent a car.</a></p> --}}
    @else
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($transactions as $transaction)
                <div class="p-4 rounded shadow-xl">
                    <img src="{{ $transaction['carImage'] }}" alt="{{ $transaction['carImage'] }}" class="object-cover w-full h-48 rounded-t">
                    <h3 class="mt-4 text-xl font-bold">{{ $transaction['carName'] }}</h3>
                    @if(session()->get('role_id') == 1)
                        <p>Renter name: {{ $transaction->renterName->name }}</p>
                    @endif
                    <p>Return date: {{ $transaction['returnDate'] }}</p>
                    <p class="mt-2 text-lg font-semibold text-gray-600">Rp. {{ number_format($transaction['totalPrice'], 0, ',', '.') }}</p>
                    <p class="text-erentGreen">&#10004; Active</p>
                    @if(session()->get('role_id') == 1)
                        <form action="{{ route('transaction-update') }}" method="POST">
                            @csrf
                            @method("PATCH")
                            <input type="number" name="id" value="{{ $transaction['id'] }}" required class="hidden">
                            <input type="number" name="car_id" value="{{ $transaction['car_id'] }}" required class="hidden">
                            <button type="submit" class="w-full px-4 py-2 mt-4 text-black transition duration-100 ease-in-out rounded-md bg-erentYellow active:bg-erentYellow/15 hover:bg-white hover:outline hover:outline-erentYellow">Set to Non-Active</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</section>