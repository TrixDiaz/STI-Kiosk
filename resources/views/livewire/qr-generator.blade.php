<div>
    

    <!-- component -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="min-w-screen h-screen fixed  left-0 top-0  flex justify-center items-center inset-0 z-50 bg-green-100 overflow-y-scroll bg-cover"
	style="background-image: url(https://images.unsplash.com/photo-1628254747021-59531f59504b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2134&amp;q=80);">
	<div class="absolute bg-gradient-to-tl from-indigo-600  to-green-600 opacity-80 inset-0 "></div>
	<div class="relative border-8 overflow-hidden border-gray-900 bg-gray-900 h-4/6 sm:h-3/5 rounded-3xl flex-col w-64  flex justify-center items-center bg-no-repeat bg-cover shadow-2xl"
		style="background-image: url(https://images.unsplash.com/photo-1590520181753-3fff75292722?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2134&amp;q=80);">
		<div class="absolute bg-black opacity-60 inset-0 "></div>
		<div class="camera absolute top-4"></div>
		<div class="flex w-full flex-row justify-between items-center mb-2 px-2 text-gray-50 z-10 absolute top-7">
			<div class="flex flex-row items-center ">
				<svg xmlns="http://www.w3.org/2000/svg"
					class="h-8 w-8 p-2 cursor-pointer hover:bg-gray-500 text-gray-50 rounded-full mr-3" fill="none"
					viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
				</svg> <span class="text-sm">QR Code</span>
			</div>
			<div>
				<svg xmlns="http://www.w3.org/2000/svg"
					class="h-8 w-8 p-2 cursor-pointer hover:bg-gray-500 text-gray-50 rounded-full " viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
						clip-rule="evenodd"></path>
				</svg>
			</div>
		</div>
		<div class="text-center z-10">
			<div class="camera">
				<div class="relative border-corner 	 p-5  m-auto  rounded-xl bg-cover w-48 h-48 flex"
					style="background-image: url(https://images.unsplash.com/photo-1590520181753-3fff75292722?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2134&amp;q=80);">
					<span class="border_bottom">{!! QrCode::size(150)->generate(Session::get('checkout_url')) !!}</span>
				</div>
			</div>
			<p class="text-gray-300 text-xs mt-3">Scan a QR Code</p>
            <a href="{{ route('kiosk') }}" class="text-gray-300 text-xs mt-3">Return to Merchant</a>
			<div class="mt-5 w-full flex items-center justify-between space-x-3 my-3 absolute bottom-0 left-0 px-2">
				<div class="flex ">
					<svg xmlns="http://www.w3.org/2000/svg"
						class="h-8 w-8 p-2 cursor-pointer hover:bg-gray-600 text-gray-50 rounded-full "
						viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd"
							d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
				<div class="ml-0">
					<svg xmlns="http://www.w3.org/2000/svg"
						class="h-8 w-8 p-2 cursor-pointer hover:bg-gray-600 text-gray-50 rounded-full "
						viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd"
							d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.border-corner:before {
		display: block;
		content: "";
		width: 40px;
		height: 40px;
		position: absolute;
		top: 0;
		left: 0;
		border-top: 5px solid #0ed3cf;
		border-left: 5px solid #0ed3cf;
		border-radius: 12px 0;
	}

	.border-corner:after {
		display: block;
		content: "";
		width: 40px;
		height: 40px;
		position: absolute;
		top: 0;
		right: 0;
		border-top: 5px solid #0ed3cf;
		border-right: 5px solid #0ed3cf;
		border-radius: 0 12px;
	}

	.border-corner span.border_bottom:before {
		display: block;
		content: "";
		width: 40px;
		height: 40px;
		position: absolute;
		bottom: 0;
		left: 0;
		border-bottom: 5px solid #0ed3cf;
		border-left: 5px solid #0ed3cf;
		border-radius: 0 12px;
	}

	.border-corner span.border_bottom:after {
		display: block;
		content: "";
		width: 40px;
		height: 40px;
		position: absolute;
		bottom: 0;
		right: 0;
		border-bottom: 5px solid #0ed3cf;
		border-right: 5px solid #0ed3cf;
		border-radius: 12px 0;
	}

	.camera {
		z-index: 11;
	}

	.camera::before {
		content: "";
		position: absolute;
		top: 15%;
		left: 50%;
		width: 12px;
		height: 12px;
		border-radius: 50%;
		background-color: rgba(255, 255, 255, 0.3);
		transform: translate(-50%, -50%);
		border: solid 2px #2c303a;
	}

	.shadow-out {
		box-shadow: rgba(17, 24, 39, 0.2) 0px 7px 29px 0px;
	}

    .camera {
  z-index: 11;
  animation: fadeIn 1s ease-in 1;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>

</div>
