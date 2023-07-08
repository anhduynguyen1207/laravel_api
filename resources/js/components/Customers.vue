<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Customers Component</h1>
                    <ul class="pagination">
                        <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                            <a class="page-link" href="#" @click="fetchCustomers(pagination.prev_page_url)">Previous</a>
                        </li>
                        <li class="page-item"  v-for="(perpage,index) in pagination.last_page"><a class="page-link" href="#">{{index}}</a></li>
                       
                        <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
                            <a class="page-link" href="#" @click="fetchCustomers(pagination.next_page_url)">Next</a>
                        </li>
                    </ul>
                    <div class="card-body" v-for="cust in customers" v-bind:key="cust.id_customer">
                        <p>{{cust.name_customer}}</p>
                        <p>{{cust.phone_customer}}</p>
                        <p>{{cust.email_customer}}</p>
                        <p>{{cust.city_customer}}</p>
                        <button class="btn btn-primary" style="margin-right: 5px;">Edit</button> 
                        <button class="btn btn-danger" @click="delCustomers(cust.id_customer)">Delete</button>
                        <br>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                customers:[],

                customer:{
                    id_customer:'',
                    name_customer:'',
                    phone_customer:'',
                    email_customer:'',
                    city_customer:'',                   
                },
                id_customer:'',
                pagination:{},
                edit:false
            }
        },
        // loaded(){
        //     this.fetchCustomers();
        // },
        beforeMount(){
            this.fetchCustomers();
        },
        methods:{            
            fetchCustomers:function(page_url){
                let vm = this;
                page_url =page_url || 'api/v1/customer'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.customers=res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err=>'Error');
            },
            makePagination:function(meta, links){
                let pagination ={
                    current_page:meta.current_page,
                    last_page:meta.last_page,
                    next_page_url:links.next,
                    prev_page_url:links.prev,
                    page:meta.links[2].label,             
                }
                this.pagination=pagination;
            },
            delCustomers:function(id){
                if(confirm("Are you sure you want to delete")){
                    axios.delete('api/v1/customer/'+id)                      
                    .then(res => {
                        alert('Delete successful!');
                        this.fetchCustomers();
                    })
                    .catch(err => console.error(err));                    
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
