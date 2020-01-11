import Axios from 'axios';

export default{
    namespaced: true,
    state:{
        teams: []
    },
    getters:{
        initializeTeams(state){
            return state.teams;
        }
    },
    mutations:{
        initializeTeams(state, payload){
            state.teams = payload
        },
        pushTeam(state, payload){
            state.teams.push(payload);
        },
        updateCurrentTeam(state, payload){
            state.teams[payload.index].team_name = payload.team_name;
            state.teams[payload.index].coach = payload.coach;
        }
        
    },
    actions:{

        initializeTeams(context){
            Axios.get('teams')
                .then((res)=>{
                    context.commit('initializeTeams', res.data)
                })
                .catch((err)=>{
                    console.log(err.response.data.message);
                });
        },


        addTeam(context, payload){
            Axios.post('store_team', payload)
                .then((res)=>{
                    context.commit('pushTeam', res.data.team);
                })
                .catch((err)=>{
                    swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: err.response.data.message
                    })
                  });
            
        },
        updateTeam(context, payload){
            Axios.post('update_team', payload)
                .then(res=>{
                    console.log(res);
                    context.commit('updateCurrentTeam', payload);
                })
                .catch((err)=>{
                        
                });
            
            
        },
        deleteTeam(context, payload){
            Axios.post('delete_team', {id: payload});
        }
    }

}



    

