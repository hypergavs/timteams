<template>
    <v-container>
    <v-row>
        <v-col
          cols="12"
          md="4"
        >

        <v-text-field
            v-model="form.team_name"
            label="Team name"
            required
          ></v-text-field>
        </v-col>
    </v-row>

    <v-row>
        <v-col
        cols="12"
          md="4"
        >

        <v-select
          :items="coaches"
          item-text="coach_name"
          item-value="id"
          label="Coach"
          v-model="form.coach"
        ></v-select>
        </v-col>
    </v-row>

    
    <v-row
    >
        <v-col
        cols="12"
          md="4"
        >
            <v-btn
            color="primary"
            @click="addTeam"
            >
                Submit
            </v-btn>
        </v-col>
    </v-row>
    </v-container>
</template>
<script>
export default {
    data(){
        return {
            form: {
                team_name: "",
                coach: "",

            },
            coaches: [],
            
        }
    }
    ,
    mounted(){
        this.getCoaches();
    },
    methods:{
        getCoaches(){
            axios.get('/coaches')
                .then((res)=>{
                    this.coaches = res.data;
                })
                .catch((err)=>{
                    console.log(err);
                })
        },
        addTeam(){
            this.$store.dispatch('addTeam', this.form)
                .then((res)=>{
                    this.$router.push({name: 'team'});
                })
                .catch((err)=>{
                    swal.fire({
                        icon: 'error',
                        title: 'Ooops...',
                        text: err.response.data.message,
                      })
                })
        }

    }
}
</script>