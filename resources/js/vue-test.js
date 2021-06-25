const { default: Axios } = require("axios");

var app = new Vue({
    el: '#root',
    data: {
        posts: [],
        queryString: ''
    },
    methods: {
        filterPosts(filter) {
            return this.posts.filter((post) => post.title.toLowerCase().includes(filter.toLowerCase()) )
        }
    },
    mounted() {
        axios.get('/api/user')
            .then((response) => {
                this.posts = response.data.posts;
                console.log(this.posts)
            })
    
    }

});