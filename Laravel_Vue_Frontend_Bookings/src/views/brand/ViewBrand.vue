<template>
    <h1>Brand Information</h1>
   
<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 60rem; height:13rem; position:relative;
     left:7%;">  
          <div class="card-header">
                <button class="btn btn-sm bg-danger" style="color:white; position:relative; left: 93.5%;" @click="deleteBooking"> Delete</button>
                    <button class=" btn btn-sm bg-warning" @click="toggleEditor" style= "position:relative; left: -60px;">{{editor.label}}</button>
                      <table class="table table-hover text-center" style="margin-top:20px;">
                            <tr>

                                <th class="bg-info">Tv Brands</th>
                                <th class="bg-info">Name</th>
                                <th class="bg-info">Size</th>
                                <th class="bg-info">Prize</th>
                            </tr>
                          
                            <tr>
                                <td>{{brand.Tv Brands}}</td>
                                <td>{{brand.name}}</td>
                                <td>{{brand.size}}</td>
                                <td>{{brand.price}}</td>
                            </tr>             
                            
                    </table>
             </div>
            <div>
      
            <div class="card shadow-lg  mb-5 bg-white rounded" style="width:60rem; position:absolute; top:120%; left:0%; ">
             <div v-if="editor.show">
                  <h3 class="text-center bg-info" style="color:dimgray; padding-top:10px; padding-bottom: 10px;">
                      Edit Order
                  </h3>
                   <hr>
                  <div class="card-body bg-light">
                 <div>
                      <label for="title">&nbsp;&nbsp;Tv Brands &nbsp;</label>
                      <input type="text" v-model="booking.operator"  class="w3-input w3-border" >
                   
                      <label for="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name &nbsp;</label>
                      <input type="text" v-model="booking.bus_name"  class="w3-input w3-border" >
                      
                      <label for="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Size &nbsp;</label>
                      <input type="text" v-model="booking.point_of_origin"  class="w3-input w3-border" >
                      <br><br>
                   
                     </div>

                     <button class="btn btn-sm btn-success" style="color:white; position:relative; left: 93%;" @click="saveBooking">Update</button>
                   </div>
                 </div>
          </div>
        </div>
     </div>

</template>

<script>
export default{
    props:['id'],
  
   data(){
       return{
           booking: {},
           editor: {
               show: false,
               label: "Edit Booking"
           }
       }
   },

   methods: {

       toggleEditor(){
           if(this.editor.show){
               this.editor = {show:false, label:"Edit Booking"}
           }else{
                this.editor = {show:true, label:"Cancel"}
           }
       },
       saveBooking(){
                fetch('http://localhost:8000/api/bookings/' + this.booking.id,{
                    method: 'put',
                    headers: {
                        'Content-Type' : "application/json"
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify(this.booking)
                 })
                 .then(res=>res.json())
                 .then(data=>{
                     alert("Booking has been updated")

                 })
                 .catch(err => console.log(err))
       },
          deleteBooking(){
                 fetch('http://localhost:8000/api/bookings/' + this.booking.id,{
                       method:'delete'
                 })
                 .then(res=>res.json())
                 .then(data=>{
                     alert("Booking has been deleted")
                     this.$router.push({
                        name: 'all-bookings'
                     })
                    
                 })
                 .catch(err=>console.log(err))
         }
   },

   mounted(){
       fetch('http://localhost:8000/api/bookings/' + this.id)
       .then(res => res.json())
       .then(data => this.booking = data)
       .then(err => console.log(err))
   }

}

</script>

<style scoped>
 h1{
     color:DarkSlateGray;
     font-weight:normal;
     font-size:35px;
 }

 td{
     color:DarkSlateGray;
 }

</style>