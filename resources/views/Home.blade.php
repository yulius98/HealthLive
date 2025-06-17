<x-leandingpage>
  <!-- Navigation-->
  <x-nav-bar-home/>
  <!-- App features section-->
  <section class="masthead" id="features">
    <div id="sec1" class="shopify-section thematic homepage-hero hero p-b-0 sm-p-b-0">
      <style>
        #Thematic.homepage-hero{ 
            background-color: transparent; 
            padding-top: 4rem;
            padding-bottom: 4rem;
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        } 
        #Thematic .hero-title{ 
            color: #12452c; 
            font-size: 64px; 
            line-height:110%; 
            margin-bottom: 1rem;
        } 
        #Thematic .hero-subtitle{ 
            color: #000000; 
            font-size: 24px; 
            line-height:132%; 
            margin-bottom: 2rem;
            max-width: 480px;
        } 
        #Thematic a.btn-primary {
            background-color: #2937f0;
            border-color: #2937f0;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }
        #Thematic a.btn-primary:hover {
            background-color: #1f29b4;
            border-color: #1f29b4;
        }
        .thematic.homepage-hero{ 
            background: url("//www.nakedpress.co/cdn/shop/files/May_Homepage_Desktop_7cc6d1a8-c53c-4dfa-ba25-075addd7fc6b.jpg?v=1715831661") !important; 
            background-size: cover !important; 
            background-position: 100% 50% !important; 
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        } 
        .thematic.homepage-hero::after{ 
            background-image: none !important; 
            position: relative; width:0px; 
        } 
        #Thematic.homepage-hero::after{ 
            background-image: none !important; 
            position: relative; width:0px; 
        } 
        #Thematic .button-outlined { 
            color: ; 
            background-color: transparent; 
            border: 1px solid ; 
        } 
        #Thematic.homepage-hero::after { 
            background-image: none !important; 
            position: relative; 
            width: 0px; 
        } 
        @media only screen and (max-width: 767px){ 
            #Thematic .hero-title{ 
                color: #12452c; 
                font-size: 32px; 
                line-height:110%; 
            } 
            #Thematic .hero-subtitle{ 
                color: #000000; 
                font-size: 16px; 
                line-height:132%; 
                width: 60%; 
            } 
        } 
        @media only screen and (min-width: 475px){ 
            .thematic.homepage-hero{ 
                background: url("//www.nakedpress.co/cdn/shop/files/May_Homepage_Desktop_7cc6d1a8-c53c-4dfa-ba25-075addd7fc6b.jpg?v=1715831661") !important; 
                background-size: cover !important; 
                background-position: 100% 50% !important; 
            } 
        }
        @media only screen and (max-width: 475px){ 
            .thematic.homepage-hero{ 
                background: url("//www.nakedpress.co/cdn/shop/files/May_Homepage_Desktop_7cc6d1a8-c53c-4dfa-ba25-075addd7fc6b.jpg?v=1715831661") !important; 
                background-size: cover !important; 
                background-repeat: no-repeat !important; 
                background-position: 100% 50% !important; 
            } 
        }

      </style>
        
      <div id="Thematic" class="homepage-hero sm-p-b-0">
        <div class="container">
          <div class="row align-items-center">
              <div class="col-md-6 col-xs-12 sm-m-b-0 text-center text-md-start">
                <div class="hero-title fs-32 sm-fs-64 fw-semibold m-b-4">
                    Saatnya Detox
                </div>
                <p class="hero-subtitle m-b-12 sm-m-b-32">Puasa dengan 8 botol jus bantu Berat Badan ideal, Maag GERD aman, Mens lancar dan Kolesterol turun.</p>
                
              </div>
          </div>
        </div>
      </div>
    </div>   
  </section>
  <!-- Basic features section-->
  <section class="bg-light">
    <div class="bg-[rgb(221,194,175)] pt-0"> <!-- Added div for search results -->
      <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-0 lg:max-w-7xl lg:px-8 "> <!-- Increased padding -->
        <h2 class=" text-4xl font-bold tracking-tight text-black mt-0 text-left">Best Seller</h2> <!-- Added mb-6 for better spacing -->
      </div>
        <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 sm:mt-4 lg:mx-0 lg:max-w-none">
        @foreach ($dtproduct as $product)
            <div class="group relative border border-gray-200 shadow-xl rounded-lg p-4 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 group-hover:opacity-75">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                </div>
                <h5 class="mt-4 text-sm text-gray-700">{{ $product->nama_product }}</h5>
                <span class="block text-sm text-gray-500">{{ $product->description }}</span>
                @if ($product->discount == "yes")
                    <div class="flex items-center gap-8">
                        <h4 class="text-base font-bold  text-green-500 line-through" style=" font-size: medium; background-color: rgb(37, 217, 14);" ><del>Rp {{ number_format((float)$product->harga, 0, ',', '.') }}</del></h4>
                        <h5 class=" text-lg font-bold text-black">Rp {{ number_format((float)$product->harga_diskon, 0, ',', '.') }}</h5>
                    </div>
                @else
                    <h4 class="text-base font-medium text-black">Rp {{ number_format((float)$product->harga, 0, ',', '.') }}</h4>    
                @endif
                {{--<p class="mt-1 text-lg font-medium text-gray-900">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p> --}}
            </div>
        @endforeach
        </div>
    </div>
</section>
  
  <!-- App badge section-->
  <section class="bg-light" id="download">
          
      
  </section>
  <!-- Footer-->
    <footer class="py-4 mt-auto" style="background-color: rgb(11, 76, 3);">
        <div class="container px-1">
            <div class="text-white small">
                <div class="mb-2">PT ABC</div>
                <div class="mb-2">Jl. Contoh Alamat No.123, Jakarta</div>
                <div class="mb-2">Email: xxx@gmail.com</div>
                
            </div>
        </div>
    </footer>
        
</x-leandingpage>

