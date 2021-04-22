<template>
    <div class="container">
        <h3>Registro de paquetes</h3>
        <!--Listado de paquetes-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="nombre"></td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><input type="text" v-model="descripcion"></td>
                </tr>
                <tr>
                    <td>Cupos</td>
                    <td><input type="text" v-model="cupos"></td>
                </tr>
                <tr> 
                    <td>Disciplina</td>
                    <td>
                        <select v-model="id_disciplina">
                            <option value="0" disabled>Seleccione</option>
                            <option v-for="disciplina in arrayDisciplina" :key="disciplina.id" :value="disciplina.id" v-text="disciplina.nombre"></option>
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
            <input type="text" v-model="buscar" placeholder="nombre">
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
                    <th>Cupos</th>
                    <th>Disciplina</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="paquete in arrayPaquete" :key="paquete.id">
                    <td v-text="paquete.id"></td>
                    <td v-text="paquete.nombre"></td>
                    <td v-text="paquete.descripcion"></td>
                    <td v-text="paquete.cupos"></td>
                    <td v-text="paquete.nom_disciplina"></td>
                    <td v-text="paquete.des_disciplina"></td>
                    <td><a href="#" @click="llenar(paquete)">editar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre : '',
                descripcion : '',
                cupos : '',
                id_disciplina : 0,
                id_paquete : 0,
                nomb_disciplina: '',
                buscar : '',
                arrayDisciplina: [],
                arrayPaquete: []
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/paquete?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayPaquete= response.data;
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
                axios.post('paquete/registrar',{
                    'nombre':this.nombre,
                    'descripcion': this.descripcion,
                    'cupos': this.cupos,
                    'id_disciplina': this.id_disciplina
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            modificar(){
                let me = this;
                axios.put('paquete/modificar',{
                     'nombre':this.nombre,
                    'descripcion': this.descripcion,
                    'cupos': this.cupos,
                    'id_disciplina': this.id_disciplina,
                    'id': this.id_paquete
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
             eliminar(){
                let me = this;
                axios.put('paquete/eliminar',{
                    'id': this.id_paquete
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
             },
            llenar(data=[]){
                this.id_paquete=data['id'];
                this.nombre=data['nombre'];
                this.descripcion=data['descripcion'];
                this.cupos=data['cupos'];
                this.id_disciplina=data['id_disciplina'];
            },
            nuevo(){
                this.nombre = '';
                this.descripcion='';
                this.cupos='';
                this.id_disciplina=0;

            },
        },
        mounted() {
            this.listar(this.buscar);
            this.selectDisciplina();
        }
    }
</script>