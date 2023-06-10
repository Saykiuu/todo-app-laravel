@extends('layouts.main')
@extends('layouts.modal')
 
 

@section('content')
    <section>
        @if ($user)
            <form action="/limparToken" method="get">
                <button class="btn btn-danger">
                   limpar token
                </button>
            </form>
       
              
        @else  
            <form action="/createToken" method="get">
                <button class="btn btn-success" >
                    Gerar token
                </button>
            </form>
        @endif

       

        <div class="d-flex justify-content-between  py-4">    
            <form action="/" method="get">
                <div class="d-flex">
                    <input type="text" class="form-control  col-4" name="search" placeholder="Pesquisar.." value="{{$search }}">
                    <button type="submit" class="btn btn-primary ">
                        <span class="material-icons">
                            search
                        </span>
                    </button>
                </div>
            </form>
       
                    
           <div>
             <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modal-adicionar">
                Adicionar
            </button>
            
           </div>

        </div>
        
        <div class="content-table card p-2">
            <table class="table ">
                <thead>
                    <tr>
                        <th>
                          <form action="/" method="get" class="th-form">
                            <input type="text" name="ordem" style="display:none" value="{{$order}}">
                            <input type="text" name="coluna" style="display:none" value="title">
                            <button type="submit" class=" btn btn-icon-material"  >
                                    <span class="material-icons ">
                                        @if ($col_order != 'title')
                                            import_export
                                        @elseif($order == 'DESC')
                                            expand_more
                                        @else
                                            expand_less
                                        @endif
                                    </span>
                                </button>
                                Título
                            </form>
                        </th>
                        <th class="col-5">Descrição</th>
                        <th>
                            <form action="/" method="get" class="th-form">
                            <input type="text" name="ordem" style="display:none" value="{{$order}}">
                            <input type="text" name="coluna" style="display:none" value="created_at">
                            <button type="submit" class=" btn btn-icon-material"  >
                                    <span class="material-icons ">
                                        @if ($col_order != 'created_at')
                                            import_export
                                        @elseif($order == 'DESC')
                                            expand_more
                                        @else
                                            expand_less
                                        @endif
                                    </span>
                                </button>
                               Dt Criação
                            </form>
                        </th>
                        <th ></th>
                        <th ></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ( $listaTarefas as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{ date('d/m/Y', strtotime($item->created_at))}}</td>
                            <td>
                                <span class="material-icons btn-icon bg-warning  text-dark" onclick="openModalEdit({{$item->id}}, '{{$item->title}}', '{{$item->description}}')" data-bs-toggle="modal" data-bs-target="#modal-editar" >
                                    edit
                                </span>
                            </td>
                            <td>
                                <span class="material-icons btn-icon  bg-dark text-light" onclick="openModalDelete({{$item->id}})" data-bs-toggle="modal" data-bs-target="#modal-excluir">
                                    delete
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($listaTarefas)  == 0)
                        <tr>
                             <td colspan="5" id="empt-list">Sem dados</td>
                        </tr>                        
                    @endif
                </tbody>
            </table>
            
        </div>    
        
    </section>
    <div class="container-link">
        {{$listaTarefas->links("pagination::bootstrap-4") }}   
    </div>
            
@endsection