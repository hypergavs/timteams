import Axios from 'axios';

export default{
    namespaced: true,
    state:{
        players: []
    },
    getters:{
        initializePlayers(state){
            return state.players;
        }
    },
    mutations:{
        initializePlayers(state, payload){
            state.players = payload
        },
        pushPlayer(state, payload){
            state.players.push(payload);
        },
        updateCurrentPlayer(state, payload){
            state.players[payload.index].player_name = payload.player_name;
            state.players[payload.index].team = payload.team;
        }
        
    },
    actions:{

        initializePlayers(context){
            Axios.get('players')
                .then((res)=>{
                    context.commit('initializePlayers', res.data)
                })
                .catch((err)=>{
                    console.log(err.response.data.message);
                });
        },


        addPlayer(context, payload){
            Axios.post('store_player', payload)
                .then((res)=>{
                    context.commit('pushPlayer', res.data.player);
                })
                .catch((err)=>{
                    swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: err.response.data.message
                    })
                  });
            
        },
        updatePlayer(context, payload){
            Axios.post('update_player', payload)
                .then(res=>{
                    console.log(res);
                    context.commit('updateCurrentPlayer', payload);
                })
                .catch((err)=>{
                        
                });
            
            
        },
        deletePlayer(context, payload){
            Axios.post('delete_player', {id: payload});
        }
    }

}



    

