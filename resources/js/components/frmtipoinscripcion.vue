<template>
    <div class="container">
        <h3>Registro de Tipos de Inscrpciones</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="Nombre"></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="text" v-model="precio"></td>
                </tr>
                <tr>
                    <td>Periodo</td>
                    <td><input type="text" v-model="periodo"></td>
                </tr>
                <tr>
                    <td>Frecuencia</td>
                    <td><input type="text" v-model="frecuencia"></td>
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
            <input type="text" v-model="buscar" placeholder="Nombre TipoInscripcion">
            <button type="button" @click="listar(buscar)">Buscar por nombre</button>
        </form>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Periodo</th>
                    <th>Frecuencia</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tipoinscripcion in arrayTipoinscripcion" :key="tipoinscripcion.id">
                    <td v-text="tipoinscripcion.id"></td>
                    <td v-text="tipoinscripcion.nombre"></td>
                    <td v-text="tipoinscripcion.precio"></td>
                    <td v-text="tipoinscripcion.periodo"></td>
                    <td v-text="tipoinscripcion.frecuencia"></td>
                    <td><a href="#" @click="llenar(tipoinscripcion)">Seleccionar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                id_tipoinscripcion : 0,
                nombre :'',
                precio : '',
                periodo : '',
                frecuencia : '',
                buscar : '',
                arrayTipoinscripcion:[],
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/tipoinscripcion?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayTipoinscripcion= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            guardar(){
                let me = this;
                axios.post('tipoinscripcion/registrar',{
                    'nombre': this.nombre,
                    'precio' : this.precio,
                    'periodo' : this.periodo,
                    'frecuencia' : this.frecuencia
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            modificar(){
                let me = this;
                axios.put('tipoinscripcion/modificar',{
                    'nombre': this.nombre,
                    'precio' : this.precio,
                    'periodo' : this.periodo,
                    'frecuencia' : this.frecuencia
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
            eliminar(){
                let me = this;
                axios.put('tipoinscripcion/eliminar',{
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
                this.precio=data['precio'];
                this.periodo=data['periodo'];
                this.frecuencia=data['frecuencia'];
            },
            nuevo(){
                this.nombre = '';
                this.precio = '';
                this.periodo = '';
                this.frecuencia = '';
                this.id=0;
            },
        },
        mounted() {
            this.listar(this.buscar);
        }
    }
</script>