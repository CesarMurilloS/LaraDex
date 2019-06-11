<template>
    <div class="row">

        <spinner v-show="loading"></spinner>
        <div class="col-12 col-sm-6 col-md-4 my-2" v-for="work in works" v-bind:key="work.id">

            <div class="card">
                <img class="card-img-top" style="height:100px; width:auto;" alt="Card image cap" v-bind:src="work.picture">

                <div class="card-body">

                    <h5 class="card-title">{{ work.name }}</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum dignissimos soluta placeat in commodi voluptatibus optio nulla non ex nisi pariatur fuga quia quaerat, sequi tempore, culpa modi blanditiis voluptatum?</p>

                    <a href="/works/" class="btn btn-primary">View Profile</a>

                </div>
            </div>

        </div>


    </div>
</template>

<script>
import EventBus from '../../event-bus';
export default {
    data(){
        return {
            works: [],
            loading: true
        }
    },
    created(){
        EventBus.$on('work-added', data => {
            this.works.push(data)//data is the work we have added
        })
    },
    mounted(){
        axios
            .get('http://127.0.0.1:8000/works')
            .then((res) => {
                this.works = res.data
                this.loading = false
            });
    }
}
</script>

<style>

</style>
