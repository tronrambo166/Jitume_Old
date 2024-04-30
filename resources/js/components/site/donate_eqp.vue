<template>
    <div class="container">
        
             
    
    
        <div class="heading row w-75 mx-auto my-5"> 
       
<table class="eq table table-bordered " id="">
    <thead>
        <tr>
            <th>Equipment </th>
            <th>Amount </th>
            <th>Value </th>
            <th>Details </th>  
            <th class="text-center"></th>        
        </tr>

    </thead>
    

    
    <tbody>

        <tr v-for="( equipment, index ) in equipments" >
            <td>{{equipment.eq_name }}</td>
                <td>{{equipment.amount }}</td>
                    <td>{{equipment.value }}</td>
                        <td>{{equipment.details }}</td>
   
            <td class="text-center">

            <a style="cursor:pointer;" id="invest" v-if="equipment.status == 'active'" @click="Invest(equipment.listing_id,equipment.id,equipment.value,equipment.amount)" class="text-light buttonEq my-2">Donate</a>
            <button  v-else  disabled class="text-secondary buttonEq my-2">Donate</button>

            </td>
        </tr>
        <td v-if="empty" > No data found! </td>
    
    </tbody> 
    
    
</table>

        
        </div>   




        
        
        
        
        
        <!-- Body -->
        
        
    </div> 
   
</template>

<script> 
   
export default {

   props: ['auth_user'],
   data: () =>({
    form: new Form({
    }),
    equipments:[],
    empty:false
    }),

    methods:{

    getEquipment:function(){ 
    var id=this.$route.params.id; var t=this;
    axios.get('equipments/'+id).then( (data) =>{console.log(data);
    t.equipments = data.data.data;
    if (t.equipments == null ) t.empty = true; 
    });
    
    },

    Invest(listing_id,id,value,amount){
    var t=this;
     axios.get('invest/'+listing_id+'/'+id+'/'+value+'/'+amount+'/donate').then( (data) =>{console.log(data.data.response);
         toastr.success(data.data.response) 
    });

    },
    getPhoto(){
   return '../';
}
  },
  

     mounted() { 
     this.getEquipment(); 
      }

    }
</script>
