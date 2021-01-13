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
<<<<<<< refs/remotes/origin/main
                    <form role="form" method="POST" action="/projetos" enctype="multipart/form-data">>
=======
                    <form role="form" method="POST" action="/projetos" enctype="multipart/form-data">
>>>>>>> Aula9 Feito
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDesig">Designação</label>
<<<<<<< refs/remotes/origin/main
                                <input type="text" class="form-control" required name="inputDesig" id="inputDesig"
=======
                                <input type="text" class="form-control" required value="{{old('inputDesig') }}" name="inputDesig" id="inputDesig"
>>>>>>> Aula9 Feito
                                    placeholder="Insira a designação do projeto">
                                @error('inputDesig')
                                <p class="text-danger">
                                    {{ $errors->first('inputDesig') }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="selectCat">Categoria</label>
                                <select class="form-control select2" name="selectCat" id="selectCat"
                                    style="width: 100%;">
                                    <option value="DO" disabled selected="selected">Selecione uma Categoria </option>


                                    @foreach ($categorias as $categoria)
<<<<<<< refs/remotes/origin/main
                                    <option value="{{ $categoria->id }}">{{ $categoria->designacao}}</option>
=======

                                    @if (old('selectCat') == $categoria->id )
                                    <option value="{{ $categoria->id }}" selected>{{ $categoria->designacao}}</option>
                                    @else
                                    <option value="{{ $categoria->id }}">{{ $categoria->designacao}}</option>
                                    @endif
>>>>>>> Aula9 Feito
                                    @endforeach

                                </select>
                                @error('selectCat')
                                <p class="text-danger">
                                    {{ $errors->first('selectCat') }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputResp">Aluno(s) Responsável(eis)</label>
<<<<<<< refs/remotes/origin/main
                                <input type="text" class="form-control" required id="inputResp" name="inputResp"
=======
                                <input type="text" class="form-control" required value="{{old('inputResp')}}" id="inputResp" name="inputResp"
>>>>>>> Aula9 Feito
                                    placeholder="Insira o(s) nome(s) do(s) aluno(s) responsável(eis) pelo projeto">
                                @error('inputResp')
                                <p class="text-danger">
                                    {{ $errors->first('inputResp') }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAluno">Data de Início do Projeto</label>
<<<<<<< refs/remotes/origin/main
                                <input type="date" class="form-control" required id="inputData" name="inputData">
=======
                                <input type="date" class="form-control" required value="{{ old('inputData')}}" id="inputData" name="inputData">
>>>>>>> Aula9 Feito
                                @error('inputData')
                                <p class="text-danger">
                                    {{ $errors->first('inputData') }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAluno">GitHub</label>
<<<<<<< refs/remotes/origin/main
                                <input type="text" class="form-control" required id="inputGit" name="inputGit"
=======
                                <input type="text" class="form-control" required value="{{ old('inputGit') }}" id="inputGit" name="inputGit"
>>>>>>> Aula9 Feito
                                    placeholder="Insira o link do GitHub do projeto">
                                @error('inputGit')
                                <p class="text-danger">
                                    {{ $errors->first('inputGit') }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="textDesc">Descrição</label>
                                <textarea class="form-control" rows="5" required id="textDesc" name="textDesc"
<<<<<<< refs/remotes/origin/main
                                    placeholder="Descreva aqui o projeto"></textarea>
=======
                                    placeholder="Descreva aqui o projeto">{{ old('inputDesc')  }}</textarea>
>>>>>>> Aula9 Feito
                                @error('inptextDescutGit')
                                <p class="text-danger">
                                    {{ $errors->first('textDesc') }}
                                </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Fotos</label>
                                <div class="user-image mb-3 text-center">
                                    <div class="imgPreview"> </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="images" name="imageFile[]"
                                            multiple="multiple">
                                        <label class="custom-file-label" for="images">Insira as Fotos</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload Fotos</span>
                                    </div>
<<<<<<< refs/remotes/origin/main
                                    @error('imageFile')
=======
                                </div>
                                @error('imageFile')
>>>>>>> Aula9 Feito
                                    <p class="text-danger">
                                        {{ $errors->first('imageFile') }}
                                    </p>
                                    @enderror
                                    @error('imageFile.*')
                                    @foreach ($errors->all() as $error)
                                    <p class="text-danger">

                                        {{$errors}}
                                    </p>
                                    @endforeach
                                    @enderror
<<<<<<< refs/remotes/origin/main
                                </div>
=======
>>>>>>> Aula9 Feito
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
<<<<<<< refs/remotes/origin/main
                            <button type="submit" class="btn btn-warning" id="btnLimpar"
=======
                            <button type="button" class="btn btn-warning" id="btnLimpar"
>>>>>>> Aula9 Feito
                                name="btnLimpar">Limpar</button>
                            <button type="submit" class="btn btn-success" id="btnEnviar"
                                name="btnEnviar">Enviar</button>

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