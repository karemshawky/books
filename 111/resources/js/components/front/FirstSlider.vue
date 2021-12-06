<template>
    <div class="slider-wrap slider-carousel">
    <div class="top-product-carousel">

        <div class="tpc-content" v-for="slider in sliders" :key="slider.id">
            <img src="{{ '/uploads/book/' + slider.pic }}" class="img-responsive" alt="{{ slider.title }}" />
            <div class="tpc-overlay">
                <div class="tpc-overlay-inner">
                    <div class="tpc-info">
                        <h4><a href="@{{ route('books.slug', slider.slug) }}"> {{ slider.title }} </a></h4> <a
                            href="@{{ route('books.slug', slider.slug) }}" class="cart-btn">المزيد</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</template>

<script>
    export default {
        props :['data'],
        data() {
            return {
                sliders : [],
            }
        },
        created() {
            this.sliders = this.data.firstSlider;
        },
        methods: {
            getData() {
                axios.get('/').then((response) => {
                    this.sliders = response.data.firstSlider;
                }).catch((error) => {
                    console.log(error.message);
                });
            }
        },
    }
</script>
