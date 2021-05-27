@extends('layouts.app')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="text-center" style="width: 40%">
            <h1 class="display-3 text-black">Todos App</h1>
        <h2 class="mika">What needs to be done?</h2>
<form action="{{route('todo.store')}}" method="POST" >
@csrf
<div class="input-group nb-3 w-100">
<input type="text" class="form-control form-control-lg" name="title" placeholder="Type here.." aria-label="Recipient's username" aria-describedby="button-addon2">
<div class="input-group-append">
    <br>
<button class="btn btn-success" type="submit" id="button-addon2" style="background-color: #749c75;"> Add to the list </button>
</div>
</div>
</form>
<h2 class="text-white pt-4 text-center"> My Todo List : </h2>
<div class="bg-white w-100">

 @forelse  ($todos as $todo)
<div class="w-100 d-flex align-items-center justify-content-between"> 
<div class="p-4"> @if ($todo-> completed == 0) 
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="9 6 15 12 9 18" />
</svg>

@else
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b2bd7e" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M5 12l5 5l10 -10" />
</svg>
@endif 
{{$todo->title}} 
</div>
<div class="mr-4 d-flex align-items-center">
@if ($todo-> completed == 0)
<form action="{{route('todo.update' , $todo->id)}}" method="POST">
@method ('PUT')
@csrf
<input type="text" name="completed" value="1" hidden>
<button class="btn btn-success" style="background-color: #b2bd7e;"> Mark it as completed</button>
</form>

  @else
<form action="{{route('todo.update' , $todo->id)}}" method="POST">
@method ('PUT')
@csrf
<input type="text" name="completed" value="" hidden>
<button class="btn btn-warning ">completed task</button>

</form>
@endif
<a class="inlane-block" href="{{route('todo.edit' , $todo->id)}}"> 
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle ml-4" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b2bd7e" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
  <path d="M16 5l3 3" />
  <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999" />
</svg>
</a>

<form action="{{route('todo.destroy' ,$todo->id)}}" method="POST">
@csrf
@method('DELETE')
<button class="border-0 bg-transparent ml-2">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#dc244b" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="4" y1="7" x2="20" y2="7" />
  <line x1="10" y1="11" x2="10" y2="17" />
  <line x1="14" y1="11" x2="14" y2="17" />
  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
</svg>
</button>
</form>

</div>
</div>
@empty
<p class="text-center text-black ml-5 pt-3 pb-3 font-italic"> No needs to be done listed </p>
@endforelse


</div>


</div>
</div>
@endsection