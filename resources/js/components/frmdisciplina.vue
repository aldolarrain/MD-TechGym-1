<template>
    <div class="container">
        <h3>Registro de Disciplinas</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="Nombre"></td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><input type="text" v-model="descripcion"></td>
                </tr>
                <tr>
                    <td>Categoria</td>
                    <td>
                        <select v-model="id">
                            <option value="0" disabled>Seleccione</option>
                            <option v-for="disciplina in arrayDisciplina" :key="disciplina.id" :value="disciplina.id" 
                            v-text="disciplina.nombre"></option>
                        </select>
                    </td>
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
            <input type="text" v-model="buscar" placeholder="Descripcion disciplinas">
            <button type="button" @click="listar(buscar)">Buscar por nombre</button>
        </form>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="disciplina in arrayDisciplina" :key="disciplina.id">
                    <td v-text="disciplina.id"></td>
                    <td v-text="disciplina.nombre"></td>
                    <td v-text="disciplina.descripcion"></td>
                    <td><a href="#" @click="llenar(disciplina)">Seleccionar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre :'',
                descripcion : '',
                buscar : '',
                arrayDisciplina:[],
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/disciplina?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayDisciplina= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            selectDisciplina(){
                let me = this;
                axios.get('/disciplina/selectDisciplina').then(function(response){
                    me.arrayDisciplina= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            guardar(){
                let me = this;
                axios.post('disciplina/registrar',{
                    'nombre': this.nombre,
                    'descripcion' : this.descripcion
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            modificar(){
                let me = this;
                axios.put('disciplina/modificar',{
                    'nombre': this.nombre,
                    'descripcion' : this.descripcion
                    
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
            eliminar(){
                let me = this;
                axios.put('disciplina/eliminar',{
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
                this.descripcion=data['descripcion'];
                
            },
            nuevo(){
                this.nombre = '';
                this.descripcion = '';
                this.id=0;
            },
        },
        mounted() {
            this.listar(this.buscar);
            this.selectDisciplina();
        }
    }
</script>
