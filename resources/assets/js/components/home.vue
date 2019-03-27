<template>

    <div>

    <nav class="panel column is-offset-2 is-8">
        <p class="panel-heading">
            Vue.js Crud
            <button class="button is-link is-outlined" @click="openadd">
            Add New
            </button>
        </p>
        <div class="panel-block">
            <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
            <span class="icon is-small is-left">
                <i class="fa fa-search" aria-hidden="true"></i>
            </span>
            </p>
        </div>
        
        <a class="panel-block" v-for="item,key in temp">
            <span class="column is-9">
            {{ item.name }}
            </span>
            <span class="panel-icon column is-1">
            <i class="has-text-danger fa fa-trash" aria-hidden="true" @click="del(key,item.id)"></i>
            </span>
            <span class="panel-icon column is-1">
            <i class="has-text-info fa fa-edit" aria-hidden="true" @click="openUpdateBisa(key)"></i>
            </span>
            <span class="panel-icon column is-1">
            <i class="has-text-primary fa fa-eye" aria-hidden="true" @click="openShowBisa(key)"></i>
            </span>
        </a>
        </nav>

        <add :openmodal='addActive' @closeRequest='close'></add>

        <Show :openmodal='showActive' @closeRequest='close'></Show>

        <update :openmodal='editActive' @closeRequest='close'></update>

    </div>

</template>

<script>

let add = require('./add.vue');
let Show = require('./Show.vue');
let update = require('./update.vue');

export default {
    components:{add, Show, update},
    data(){
        return{
            addActive : '',
            showActive : '',
            editActive : '',
            lists:{},
            errors:{},
            searchQuery:'',
            temp:''
        }
    },

    watch:{

        searchQuery(){

            if(this.searchQuery.length>0){
                this.temp = this.lists.filter((item)=>{
                    return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                });
                // console.log(result)
            }else{
                this.temp = this.lists
            }

        }

    },

    mounted(){
        axios.post('/getData').then((response)=> this.lists = this.temp = response.data)
            .catch((error)=> this.errors = error.response.data.errors)
    },

    methods:{
        openadd(){
            this.addActive = 'is-active';
        },
        openShowBisa(key){
            this.$children[1].list = this.lists[key]
            this.showActive = 'is-active';
        },
        openUpdateBisa(key){
            this.$children[2].list = this.lists[key]
            this.editActive = 'is-active';
        },
        close(){
            this.addActive = this.showActive = this.editActive = ''
        },
        del(key,id){
            if(confirm("Are you Sure ?")){
                axios.delete(`/crud/${id}`)
                    .then((response)=> this.lists.splice(key,1))
                    .catch((error)=> this.errors = error.response.data.errors)
            }
        }
    }
}
</script>

