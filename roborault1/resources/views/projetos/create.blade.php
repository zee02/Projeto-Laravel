@extends('layouts.admin')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Projetos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Novo Projeto</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Novo Projeto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/projetos" enctype="multipart/form-data">>
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="inputDesig">Designação</label>
                  <input type="text" class="form-control" name="inputDesig" id="inputDesig" placeholder="Insira a designação do projeto">
                </div>
                <div class="form-group">
                    <label for="selectCat">Categoria</label>
                    <select class="form-control select2" name="selectCat" id="selectCat" style="width: 100%;">
                      <option value ="DO" selected="selected">Selecione uma Categoria </option>
                    
                    
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->designacao}}</option>
                    @endforeach

                    </select>
                  </div>
                <div class="form-group">
                  <label for="inputResp">Aluno(s) Responsável(eis)</label>
                  <input type="text" class="form-control" id="inputResp" name="inputResp" placeholder="Insira o(s) nome(s) do(s) aluno(s) responsável(eis) pelo projeto">
                </div>
                <div class="form-group">
                    <label for="inputAluno">Data de Início do Projeto</label>
                    <input type="date" class="form-control" id="inputData" name="inputData">
                  </div>
                  <div class="form-group">
                    <label for="inputAluno">GitHub</label>
                    <input type="text" class="form-control" id="inputGit" name="inputGit" placeholder="Insira o link do GitHub do projeto">
                  </div>
                  <div class="form-group">
                    <label for="textDesc">Descrição</label>
                    <textarea class="form-control" rows="5" id="textDesc" name="textDesc" placeholder="Descreva aqui o projeto"></textarea>
                  </div>

                <div class="form-group">
                  <label>Fotos</label>
                  <div class="user-image mb-3 text-center">
                    <div class="imgPreview"> </div>
                </div>   
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="images" name="imageFile[]" multiple="multiple">
                      <label class="custom-file-label" for="images">Insira as Fotos</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload Fotos</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-warning" id="btnLimpar" name="btnLimpar">Limpar</button>
                <button type="submit" class="btn btn-success" id="btnEnviar" name="btnEnviar">Enviar</button>

            </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
