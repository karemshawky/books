const { default: axios } = require('axios');

Vue.component('create-book', {
    props:['categories','tags','authors'],
    data() {
        return {
            newTags : [],
            newAuthors : [],
            newCategories : [],
            errors: [],
            form : {
                title : '',
                slug : '',
                cover : '',
                link : '',
                categories : [],
                tags : [],
                authors : [],
                status : '',
                description : ''
            }
        }
    },
    methods: {
        submit() {
            axios.post('/admin/books', this.getFormData())
            .then((response) => {
                window.location.href = '/admin/books';
            }, (error) => {
                this.errors = error.response.data.errors;
            });

        },
        fileUpload(event) {
            this.form.cover = event.target.files[0];
        },
        getFormData() {
            const data = new FormData();

            data.append('title', this.form.title);
            data.append('slug', this.form.slug);
            data.append('cover', this.form.cover);
            data.append('link', this.form.link);
            data.append('status', this.form.status);
            data.append('description', this.form.description);
            data.append('categories', this.newCategories);
            data.append('tags', this.newTags);
            data.append('authors', this.newAuthors);

            return data;
        }
    },
});
