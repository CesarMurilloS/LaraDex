<template>
    <div class="row">


        <div class="col-12 col-sm-6 col-md-4 my-2" v-for="work in works">

            <div class="card">
                <img class="card-img-top" src="/images/Image" style="height:100px;width:auto;" alt="Card image cap">

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
export default {
    data(){
        return {
            works: [
                {id: 1, name: "Laravel layout designs"},
                {id: 2, name: "Controllers development"},
                {id: 3, name: "Material Theme addition"}

            ]
        }
    },
    mounted(){
        console.log('Component mounted')
    }
}
</script>

<style>

</style>
