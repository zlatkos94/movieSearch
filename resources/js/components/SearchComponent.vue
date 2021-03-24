<template>
    <div>
        <input type="text" v-model="keywords">

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="result in results" :key="result.id">
                <td>{{ result.title }}</td>
                <td><img :src="'https://image.tmdb.org/t/p/w92/'+result.poster_path" alt="image">
                </td>
            </tr>

            </tbody>
        </table>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                keywords: null,
                results: []
            };
        },
        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },
        methods: {
            fetch() {
                axios.get('/res-search', { params: { keywords: this.keywords } })
                    .then(response => this.results = response.data)
                    .catch(error => {});
            }
        }
    }
</script>
