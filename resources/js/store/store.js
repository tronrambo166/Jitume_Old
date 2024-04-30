export default{
	state:{
		catData:[],
		proData:[]
	},
	getters:{
		getCat(state){
        return state.catData
		},
		getpro(state){
        return state.proData
		}
	},
	actions:{
		getCats(data){
			let t=this;
			axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/admin/manage-category').then(function(response){
        
            data.commit("cats",response.data.data)
            
    });
		
		},

		fetchpro(data){
			let t=this;
			axios.get('http://localhost/laravel_projects/Vue_eCommerce/public/admin/manage-product').then(function(response){
            console.log(response)
            data.commit("pro",response.data.product)
            
    });
		
		}
	},
	mutations:{
    cats(state,data){ 
     state.catData = data; 
    },
     pro(state,data){ 
     state.proData = data; 
    }

	}
}