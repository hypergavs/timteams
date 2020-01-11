import Axios from 'axios';

export default{
    namespaced: true,
    state:{
        coaches: []
    },
    getters:{
        initializeCoaches(state){
            return state.players;
        }
    },
    mutations:{
        initializeCoaches(state, payload){
            state.coaches = payload
        },
        pushCoach(state, payload){
            state.coaches.push(payload);
        },
        updateCurrentCoach(state, payload){
            state.coaches[payload.index].coach_name = payload.coach_name;
            state.coaches[payload.index].type = payload.type;
            state.coaches[payload.index].team = payload.team;
        }
        
    },
    actions:{

        initializeCoaches(context){
            Axios.get('coaches')
                .then((res)=>{
                    context.commit('initializeCoaches', res.data)
                })
                .catch((err)=>{
                    console.log(err.response.data.message);
                });
        },


        addCoach(context, payload){
            Axios.post('store_coach', payload)
                .then((res)=>{
                    context.commit('pushCoach', res.data.coach);
                })
                .catch((err)=>{
                    swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: err.response.data.message
                    })
                  });
            
        },
        updateCoach(context, payload){
            Axios.post('update_coach', payload)
                .then(res=>{
                    console.log(res);
                    context.commit('updateCurrentCoach', payload);
                })
                .catch((err)=>{
                        
                });
            
            
        },
        deleteCoach(context, payload){
            Axios.post('delete_coach', {id: payload});
        }
    }

}



    

