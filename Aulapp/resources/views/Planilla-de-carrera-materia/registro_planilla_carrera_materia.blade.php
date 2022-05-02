@extends('plantilla_planillas')
@section('Titulo','Registro de planillas carrera-materia')
@section("registrar","grupos")
@section("reporte","reporte_grupo")
@section("eliminar","eliminar-grupo")
@section("action")
action={{route('materia_carrera')}}
@endsection
@section('Titulo form')
<h3>Asignacion de materia a carreras</h3>
@endsection
@section('Contenido formulario')
    
    <label class="form-label">Carrera</label>
    <select name="carrera" id="carrera" class="form-select">
        <option>Seleccione una carrera</option>
        @foreach($carreras as $carrera)          
        <option value="{{$carrera->id}}">{{$carrera->Nombre}}</option>
        @endforeach
    </select>
    <label class="form-label">Materia</label>
    <select name="materia" id="materia" class="form-select">
        <option selected>Seleccione una materia</option>
       
    </select>
   
    <script>
        

        var carrera=document.getElementById("carrera");
        carrera.addEventListener('change', (event) => {
            var materias=document.getElementById("materia");
            materia.innerHTML="";
            console.log(":D");
           @foreach($materias as $materia)
              @foreach($carrera_materias as $carrera_materia)
                var bandera=0;
                if('{{$materia->id}}'=='{{$carrera_materia->materia_id}}' && '{{$carrera_materia->carrera_id}}'==carrera.options[carrera.selectedIndex].value){
                    bandera=1;
                }
              @endforeach
              if(bandera==0){
                materias.innerHTML+="<option value='{{$materia->id}}'>{{$materia->nombre}}</option>"
              }
           @endforeach
        })
    </script>

@endsection
