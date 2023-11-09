<x-kiosk-layout>

    <div class="py-10">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                <!-- Product 1 -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                    <a href="{{ route('donmono') }}">
                        <div class="shadow-lg">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1PJP1yETL6YMVHvnr6zpr8kksRLkheZLScbqxy6cwWIPUfdq6jT2CBDmuBPkG5onCXf8&usqp=CAU"
                                alt="Product Image" class="w-full h-60 p-3 shadow-md"> <!-- Set the height here -->
                                <div class="items-center text-center">
                                    <h2 class="text-lg font-semibold p-3">Donmono</h2>
                                </div>
                        </div>
                    </a>
                </div>

                <!-- Repeat the above structure for more products -->
            </div>
        </div>
    </div>



</x-kiosk-layout>
