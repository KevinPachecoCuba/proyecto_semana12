<template>

<div class="container container-task">

<div class="row">

<div class="col-md-6">

<h2>Lista de tareas</h2>

<table class="table text-center"><!--Creamos una tabla que mostrará todas las tareas-->

<thead>

<tr>

<th scope="col">ape_nom</th>
<th scope="col">usuario</th>
<th scope="col">contraseña</th>

<th scope="col">Acciones</th>

</tr>

</thead>

<tbody>

<tr v-for="task in arrayTasks" :key="task.id"> <!--Recorremos el array y cargamos nuestra tabla-->

<td v-text="task.ape_nom"></td>
<td v-text="task.usuario"></td>
<td v-text="task.password"></td>

<td>

<!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->

<button class="btn" @click="loadFieldsUpdate(task)">Modificar</button>

<!--Botón que borra la tarea que seleccionemos-->

<button class="btn" @click="deleteTask(task)">Borrar</button>

</td>

</tr>

</tbody>

</table>

</div>

<div class="col-md-6">

<div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->

<label>ape_nom</label>

<input v-model="ape_nom" type="text" class="form-control">

</div>
<div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->

<label>usuario</label>

<input v-model="usuario" type="text" class="form-control">

</div>
<div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->

<label>contraseña</label>

<input v-model="password" type="text" class="form-control">

</div>

<div class="container-buttons">

<!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->

<button v-if="update == 0" @click="saveTasks()" class="btn btn-success">Añadir</button>

<!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->

<button v-if="update != 0" @click="updateTasks()" class="btn btn-warning">Actualizar</button>

<!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->

<button v-if="update != 0" @click="clearFields()" class="btn">Atrás</button>

</div>

</div>

</div>

</div>

</template>

<script>

export default {

data(){

return{

ape_nom:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
usuario:"", 
password:"", 

update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado

ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/

arrayTasks:[], //Este array contendrá las tareas de nuestra bd

}

},

methods:{

getTasks(){

let me =this;

let url = '/tareas' //Ruta que hemos creado para que nos devuelva todas las tareas

axios.get(url).then(function (response) {

//creamos un array y guardamos el contenido que nos devuelve el response

me.arrayTasks = response.data;

})

.catch(function (error) {

// handle error

console.log(error);

});

},

saveTasks(){

let me =this;

let url = '/tareas/guardar' //Ruta que hemos creado para enviar una tarea y guardarla

axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea

'ape_nom':this.ape_nom,
'usuario':this.usuario,
'password':this.password,

}).then(function (response) {

me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos

me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0

})

.catch(function (error) {

console.log(error);

});

},

updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la

tarea que queremos modificar*/

let me = this;

axios.put('/tareas/actualizar',{

'idusuario':this.update,

'ape_nom':this.ape_nom,
'usuario':this.usuario,
'password':this.ape_nom,

}).then(function (response) {

me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos

me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0

})

.catch(function (error) {

console.log(error);

});

},

loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar

this.update = data.idusuario

let me =this;

let url = '/tareas/buscar?idusuario='+this.update;

axios.get(url).then(function (response) {

me.ape_nom= response.data.ape_nom;
me.usuario= response.data.usuario;
me.password= response.data.ape_nom;

})

.catch(function (error) {

// handle error

console.log(error);

});

},

deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegidusuarioo

let me =this;

let task_id = data.idusuario

if (confirm('¿Seguro que deseas borrar esta tarea?')) {

axios.delete('/tareas/borrar/'+task_id

).then(function (response) {

me.getTasks();

})

.catch(function (error) {

console.log(error);

});

}

},

clearFields(){/*Limpia los campos e inicializa la variable update a 0*/

this.ape_nom = "";
this.usuario = "";
this.password = "";

this.update = 0;

}

},

mounted() {

this.getTasks();

}

}

</script>