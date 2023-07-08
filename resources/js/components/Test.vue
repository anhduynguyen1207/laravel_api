<template>
    <div class="container-fluid border">
		<div class="row flex-nowrap">
			<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 border">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">					
					<ul class="w-100 nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="w-100">
							<a href="#submenu0" data-bs-toggle="collapse" class="nav-link px-0 align-middle parent">
								<span class="ms-1 d-none d-sm-inline">Item Parent</span> </a>							
						</li>
            <hr class="hrLine">   		
						<li class="w-100">
							<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle parent" aria-expanded="true">
								<span class="ms-1 d-none d-sm-inline ">Item Parent</span> </a>
							<ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
								<li class="w-100">
									<a href="#" class="nav-link px-0">Item childrent</a>
								</li>
								<li>
									<a href="#" class="nav-link px-0">Item childrent</a>
								</li>
                <li class="w-100">
									<a href="#" class="nav-link px-0">Item childrent</a>
								</li>
								<li>
									<a href="#" class="nav-link px-0">Item childrent</a>
								</li>
                <li>
									<a href="#" class="nav-link px-0">Item childrent</a>
								</li>
                <li>
									<a href="#" class="nav-link px-0">Item childrent</a>
								</li>
							</ul>
						</li>	
            <hr class="hrLine">   	
            <li class="w-100">
							<a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle parent">
								<span class="ms-1 d-none d-sm-inline">Item Parent</span> </a>							
						</li>								
					</ul>
          <hr class="hrLine">   	
				</div>
			</div>
			<div class="col py-3 bg-body-secondary">
				<!-- DASHBOARD -->
				<div class="row">
					<div class="col-6">
						<h3 class="text-danger">DASHBOARD</h3>
					</div>
					<div class="col-6">
						<div class="tetx-end d-flex justify-content-end">
							<input id="txtTicketPNm" class="ph-i" placeholder="New list">
							<button type="button" class="btn btn-danger ms-1" onclick="CreateTicket()">Create</button>
						</div>
					</div>
				</div><!-- DASHBOARD -->			
        <div id="ticket-parent" class="row">          
          <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6 mb-2">
            <div class="bg-danger text-white d-flex p-2">
              <span class="fw-bold">Ticket1</span>
              <span class="ms-auto"><i class="bi bi-plus-lg" onclick="AddItem(1)"></i></span>
            </div>
            <div id="ticket-list1" class="ticket-child p-2 bg-white overflow-y-auto scroll-height">
              <div class="d-flex mb-2">
                <div>
                  <input class="form-check-input myCheckbox" type="checkbox" value="" id="chkName1" onchange="SetLineThrough('Name1')">
                  <label class="form-check-label" id="lblName1" for="chkName1">
                    Item-1
                  </label>
                </div>
                <div class="ms-auto"><i class="bi bi-x" onclick="DelItem(this)"></i></div>
              </div>
              <div class="d-flex mb-2">
                <div>
                  <input class="form-check-input myCheckbox" type="checkbox" value="" id="chkName2" onchange="SetLineThrough('Name2')">
                  <label class="form-check-label" id="lblName2" for="chkName2">
                    Item-2
                  </label>
                </div>
                <div class="ms-auto"><i class="bi bi-x" onclick="DelItem(this)"></i></div>
              </div>
            </div>
          </div>
          <input type="hidden" id="cntTicket" value="1"/>
        </div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        data(){
            return{
               
            }
        },
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
