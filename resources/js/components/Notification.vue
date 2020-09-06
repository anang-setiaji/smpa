<template>
    <li class="dropdown" id="markasread">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px !important;background-color: #273c75; color:#fff;"><i class= "fa fa-bell" ></i> Notifikasi
      <span class="badge" style="background-color:red;font-size:15px">{{unreads.lenght}}</span></a>
      <ul class="dropdown-menu" style="background-color: #000; font-size: 20px">

       <li>

       
       </li>
      </ul>
    </li>
</template>

<script>
    export default {
        props:['unreads'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
