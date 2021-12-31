<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card venue-card">
                    <div class="card-header">Search Venues</div>

                    <div class="card-body">
                        <form class="d-flex">
                            <input class="form-control me-sm-2" type="text" placeholder="Including but not limited to venue name, category, taste, and tips." v-model="search">
                            <button class="btn btn-primary my-2 my-sm-0" @click.prevent="submit()">
                                Search
                                <div class="spinner-border text-success spinner-border-sm" role="status" v-if=loader>
                                    <span class="sr-only"></span>
                                </div>
                            </button>
                        </form>

                        <div class="container">
                            <div class="result row" v-if=result>
                                <div class="col-lg-4" v-for="venue in getAllVenues" :key=venue>
                                    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                                        <div class="card-header"><img :src="venue.categories[0].icon.prefix + '44' + venue.categories[0].icon.suffix" alt="icon"></div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ venue.name }}</h4>
                                            <p class="card-text">address: {{ venue.location.address }}</p>
                                            <p class="card-text">postcode: {{ venue.location.postcode }}</p>
                                            <p class="card-text">locality: {{ venue.location.locality }}</p>
                                            <p class="card-text">region: {{ venue.location.region }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                result: false,
                loader: false,
                search: "",
            }
        },
        mounted() {
            console.log('Component mounted.')
            // this.$store.dispatch("getVenues")
        },
        computed: {
            getAllVenues(){
                let res = this.$store.getters.getVenuesGetters
                return res.data != undefined ? res.data.data.results : null
            }
        },
        methods: {
            async submit(){
                if(this.search){
                    this.result = false;
                    this.loader = true;
                    await this.$store.dispatch("getVenues", this.search)
                    this.result = true;
                    this.loader = false;
                }
            }
        }
    }
</script>

<style scoped>
.result {
  margin-top: 100px;
}
.venue-card{
    margin-top: 30px;
}
</style>
