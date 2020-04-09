export default {

	state: {

        status: ''

	},

	actions: {
       followUnFollow(context, user_id, follow){

        axios.post('/follow/' + user_id)
            .then(response => {
                this.status = !this.status;
                context.commit("data",this.status);
            })
            .catch(errors => {
                if (errors.response.status == 401) {
                    window.location = '/login';
                }
            });
       },

       setBooleanFlag(context, user_id, follow){
            context.commit("data",this.status);
       }
	},

	mutations: {
       data(state,data) {
          return state.status = data
       }
	}
}