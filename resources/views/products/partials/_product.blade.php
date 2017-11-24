<div class="col-sm-6 col-md-3">
    <div class="thumbnail" style="border: none;">
        <img src="{{ asset('images/products/mascara.jpg') }}" alt="..." class="image" style="min-height:200px; height:200px;">
        <div class="caption text-center">
            <h5 class="text-uppercase">{{ $product->name }}</h5>
            <p>{{ $product->description }}</p>
            <p>${{ $product->price }}</p>
            <p>
                <a href="#" class="btn btn-primary" role="button">Shop now</a>
            </p>
        </div>
    </div>
</div>