<div id="invoice-container">
    <style>
        @media print { 
            /* Apply styles for printing only */
            body * {
                visibility: hidden;
            }
            #invoice-container, #invoice-container * {
                visibility: visible;
            }
            .invoice-container {
                max-width: unset;
                box-shadow: none;
                border: 0;
                background-color: #fffffff;
                height: 100%;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                margin: 0;
                padding: 15px;
                font-size: 14px;
                line-height: 1rem;
            }
            #print {
                display: none; /* Hide the "Print" button in print mode */
            }
        }
    </style>
    
    <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
        <div class="flex flex-row-reverse">
            <button type="button" id="print" class="text-green-700  hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                Print
            </button>
           @auth
           <a href="{{ route('dashboard') }}" class="text-green-700  hover:text-white border border-none hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
            Back to Merchant
          </a>
          @else
          <a href="/" class="text-green-700  hover:text-white border border-none hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
            Back to Merchant
          </a>
           @endauth
        </div>
        <h1 class="font-bold text-2xl my-4 text-center text-blue-600">KRP Services</h1>
        <hr class="mb-2">
        <div class="flex justify-between mb-6">
            <h1 class="text-lg font-bold">Invoice</h1>
            <div class="text-gray-700">
                <div>Date: 01/05/2023</div>
                <div>Invoice #: INV12345</div>
            </div>
        </div>
        <div class="mb-8">
            <h2 class="text-lg font-bold mb-4">Bill To:</h2>
            <div class="text-gray-700 mb-2">John Doe</div>
            <div class="text-gray-700 mb-2">123 Main St.</div>
            <div class="text-gray-700 mb-2">Anytown, USA 12345</div>
            {{-- <div class="text-gray-700">johndoe@example.com</div> --}}
        </div>
        <table class="w-full mb-8">
            <thead>
                <tr>
                    <th class="text-left font-bold text-gray-700">Description</th>
                    <th class="text-right font-bold text-gray-700">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left text-gray-700">Product 1</td>
                    <td class="text-right text-gray-700">$100.00</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Product 2</td>
                    <td class="text-right text-gray-700">$50.00</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Product 3</td>
                    <td class="text-right text-gray-700">$75.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-left font-bold text-gray-700">Total</td>
                    <td class="text-right font-bold text-gray-700">$225.00</td>
                </tr>
            </tfoot>
        </table>
        <div class="text-gray-700 mb-2">Thank you for your business!</div>
        <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div>
        
      
    </div>
   
</div>
<script src="{{ asset('js/html2.js') }}"></script>

<script>
 let printBtn = document.querySelector("#print")

 printBtn.addEventListener("click", function() {
    print();
 })

</script>