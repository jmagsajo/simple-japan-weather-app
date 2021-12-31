<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card weather-card">
                    
                    <div class="card-header">Weather Forrcast</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelect1" class="form-label mt-4">Select a City from japan</label>
                            <form class="d-flex">
                                <select class="form-select" v-model="selected">
                                    <option v-for="(city) in cities" :key="city.name" :value="city">{{ city.name }}</option>
                                </select>
                                <button class="btn btn-primary  my-2 my-sm-0" type="button" @click="submit()">
                                    Search
                                    <div class="spinner-border text-success spinner-border-sm" role="status" v-if=loader>
                                        <span class="sr-only"></span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="result" v-if=result>

                        <div class="card text-white bg-primary mb-3" style="max-width: 40rem;">
                            <div class="card-header">Result</div>
                            <div class="card-body">
                                <h4 class="card-title">{{ selected.name }}</h4>
                                <img :src="getImage" alt="image">
                                <p class="card-text">{{ getWeather }}</p>
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
                selected: false,
                cities: [
                    { "id": 1, "name": "Tokyo" },
                    { "id": 2, "name": "Yokohama"},
                    { "id": 3, "name": "Kyoto"},
                    { "id": 4, "name": "Osaka"},
                    { "id": 5, "name": "Sapporo"},
                    { "id": 6, "name": "Nagoya"}
                ],
                result: false,
                loader: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            getWeather(){
                let res = this.$store.getters.getWeatherGetters;
                return res.data != undefined ? res.data.data.current.weather[0].description : null;
            },
            getImage(){
                let res = this.$store.getters.getWeatherGetters;
                if(res.data != undefined ){
                    let icon = res.data.data.current.weather[0].icon
                    return "http://openweathermap.org/img/wn/" + icon + "@2x.png"
                }else{
                    return null
                }
            }
        },
        methods: {
            async submit(){
                if(this.selected){
                    this.result = false;
                    this.loader = true;
                    await this.$store.dispatch("getWeather", this.selected.id)
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
.weather-card{
    margin-top: 30px;
}
</style>