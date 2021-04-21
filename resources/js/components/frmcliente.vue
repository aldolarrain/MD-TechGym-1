<template>
    <div class="container">
        <h3>Registro de Clientes</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="Nombre"></td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td><input type="text" v-model="apellido"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="button" @click="nuevo()">Nuevo</button>
                        <button type="button" @click="guardar()">Guardar</button>
                        <button type="button" @click="modificar()">Modificar</button>
                        <button type="button" @click="eliminar()">Eliminar</button>
                    </td>
                </tr>
            </table>
            <input type="text" v-model="buscar" placeholder="Nombre cliente">
            <button type="button" @click="listar(buscar)">Buscar por nombre</button>
        </form>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cliente in arrayCliente" :key="cliente.id">
                    <td v-text="cliente.id"></td>
                    <td v-text="cliente.nombre"></td>
                    <td v-text="cliente.apellido"></td>
                    <td><a href="#" @click="llenar(cliente)">Seleccionar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                id_cliente : 0,
                nombre :'',
                apellido : '',
                buscar : '',
                arrayCliente:[],
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/cliente?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayCliente= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            guardar(){
                let me = this;
                axios.post('cliente/registrar',{
                    'nombre': this.nombre,
                    'apellido' : this.apellido
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            modificar(){
                let me = this;
                axios.put('cliente/modificar',{
                    'nombre': this.nombre,
                    'apellido' : this.apellido
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
            eliminar(){
                let me = this;
                axios.put('cliente/eliminar',{
                    'id': this.id
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
            llenar(data=[]){
                this.id=data['id'];
                this.nombre=data['nombre'];
                this.apellido=data['apellido'];
                
            },
            nuevo(){
                this.nombre = '';
                this.apellido = '';
                this.id=0;
            },
        },
        mounted() {
            this.listar(this.buscar);
        }
    }
</script>