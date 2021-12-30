export default {

    state: {
        venues: []
    },

    getters: {

            getVenuesGetters(state){ //take parameter state
                return state.venues
            }
    },

    actions: {
        async getVenues(context, payload){
            let res = await axios.post("/api/venue",{ search: payload})
            if(res){
                console.log(res)
                context.commit("venues",res)
            }else{
                console.log("Error........")
            }
        }
    },

    mutations: {
        venues(state,data) {
            return state.venues = data
        }
    }
}