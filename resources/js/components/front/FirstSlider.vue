<template>
    <div>
        <div class="tpc-content" v-for="slider in sliders" :key="slider.id">
            <img :src="slider.pic" class="img-responsive" :alt="slider.title" />
            <div class="tpc-overlay">
                <div class="tpc-overlay-inner">
                    <div class="tpc-info">
                        <h4><a :href="'/books/' + slider.slug"> {{ slider.title }} </a></h4>
                        <a :href="'/books/' + slider.slug" class="cart-btn">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props :['slider'],
        data() {
            return {
                sliders : [],
            }
        },
        mounted() {
            this.sliders = this.slider;
        },
        methods: {
            getData() {
                axios.get('/').then((response) => {
                    this.sliders = response.data.slider;
                }).catch((error) => {
                    console.log(error.message);
                });
            }
        },
    }
</script>
