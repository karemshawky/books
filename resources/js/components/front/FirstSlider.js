Vue.component('first-slider', {
    props :['slider'],
        data() {
            return {
                sliders : [],
            }
        },
        created() {
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
});
