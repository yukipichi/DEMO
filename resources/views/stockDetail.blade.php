<x-app-layout>
	<div class="container-fluid">
		<div class="mx-auto" style="max-width:1200px">
			<h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
			<div class="">
				<div class="grid grid-cols-4 gap-4 flex-wrap">
                    <div class="mycart_box text-sm text-center rounded shadow-lg bg-white p-6">
                    {{ $stock->id }}<br>
                    {{ $stock->name }}<br>
                    {{ $stock->fee }}円<br>
                    <img src="/image/{{$stock->imagePath}}" alt="" class="incart" ><br>
                    {{-- {{ $stock->imagePath }}<br> --}}
                    {{ $stock->explane }}<br>

                    <form method="post" action="{{ url('/addMyCart') }}">
                        @csrf
                        <input type="hidden" name="stockId" value="{{ $stock->id }}">
                        <button class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded ">カートに入れる</button>
                    </form>
                </div>
				<div class="text-center rounded shadow-lg bg-white p-6 m-4">
					{{ $stock->name }}<br>
					{{ number_format($stock->fee) }}円<br>
					<div class="incart flex justify-center p-4 m-4">
						<img src="/image/{{ $stock->imagePath }}" alt="" width="600"><br>
					</div>
					{{ $stock->explain }}<br>
					<form action="/deleteMyCartStock" method="post">
						@csrf
						<input type="hidden" name="stockId" value="{{ $stock->id }}">
						{{-- <input type="submit" value="カートから削除する"> --}}
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>,
