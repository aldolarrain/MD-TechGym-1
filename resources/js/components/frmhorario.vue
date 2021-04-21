<template>
    <div class="container">
        <h3>Registro de Horarios</h3>
        <!--Listado de Horarios-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>HoraInicio</td>
                    <td><input type="time" v-model="horainicio" placeholder="HoraInicio Horario"></td>
                </tr>
                <tr>
                    <td>HoraFin</td>
                    <td><input type="time" v-model="horafin"></td>
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
            <input type="text" v-model="buscar" placeholder="HoraInicio Horario">
            <button type="button" @click="listar(buscar)">Buscar por hora</button>
        </form>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>HoraInicio</th>
                    <th>HoraFin</th>
                    <th>Disciplina</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="horario in arrayHorario" :key="horario.id">
                    <td v-text="horario.id"></td>
                    <td v-text="horario.horainicio"></td>
                    <td v-text="horario.horafin"></td>
                    <td v-text="horario.nom_disciplina"></td>
                    <td v-text="horario.des_disciplina"></td>
                    <td><a href="#" @click="llenar(horario)">editar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                horainicio : '',
                horafin : '',
                id_disciplina : 0,
                id_horario : 0,
                nomb_disciplina: '',
                buscar : '',
                arrayDisciplina: [],
                arrayHorario: []
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/horario?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayHorario= response.data;
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
                axios.post('horario/registrar',{
                    'horainicio':this.horainicio,
                    'horafin': this.horafin,
                    'id_disciplina': this.id_disciplina
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            modificar(){
                let me = this;
                axios.put('horario/modificar',{
                     'horainicio':this.horainicio,
                    'horafin': this.horafin,
                    'id_disciplina': this.id_disciplina,
                    'id': this.id_horario
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
             eliminar(){
                let me = this;
                axios.put('horario/eliminar',{
                    'id': this.id_horario
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
             },
            llenar(data=[]){
                this.id_horario=data['id'];
                this.horainicio=data['horainicio'];
                this.horafin=data['horafin'];
                this.id_disciplina=data['id_disciplina'];
            },
            nuevo(){
                this.horainicio = '';
                this.horafin='';
                this.id_disciplina=0;

            },
        },
        mounted() {
            this.listar(this.buscar);
            this.selectDisciplina();
        }
    }
</script>