export default {

	state: {
            cities: [],
            city: 0,
	},

	getters: {
            getWeatherGetters(state){ //take parameter state
                  return state.cities
            }
	},

	actions: {
            async  getWeather(context, payload){
                let res = await axios.post("/api/weather",{ id: payload})
                if(res){
                    console.log(res)
                    context.commit("cities",res)
                }else{
                    console.log("Error........")
                }
            
            }
	},

	mutations: {
            cities(state,data) {
                  return state.cities = data
            }
	}
}