<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WELCOME TO BOOKSTORE') }}
        </h2>
    </x-slot>

    <div class="card" style="width: 18rem;">
      <img src="resources/gambar/Nabi.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Kisah Nabi</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Buy Now
          </a>
        </div>
      </div>
</x-app-layout>


