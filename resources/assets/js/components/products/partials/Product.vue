<template>
    <div class="product">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail" style="border:none; height: 400px">
                <img src="/images/products/mascara.jpg" :alt="product.name" class="image" style="min-height:150px; height:230px;">
                <div class="caption text-center">
                    <h5 class="text-uppercase">{{ product.name }}</h5>
                    <p>{{ product.description }}</p>
                    <p>${{ product.price }}</p>
                    <p>
                        <a href="#" class="btn btn-primary" role="button">Shop now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['product'],
        data() {
            return {
            }
        }
    }
</script>